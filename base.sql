BEGIN;

DROP TABLE IF EXISTS telefono;
DROP TABLE IF EXISTS reserva;
DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS usuario;

CREATE TABLE cliente(
	
	id int AUTO_INCREMENT,
	nombre varchar(20) NOT NULL,
	telefono varchar(20) NOT NULL,
	
	CONSTRAINT pk_cliente
		PRIMARY KEY (id)
);

CREATE UNIQUE INDEX nom_tel
	ON cliente (nombre, telefono);

CREATE TABLE reserva(
	
	id int AUTO_INCREMENT,
	cliente_id int NOT NULL,
	fecha date NOT NULL,
	hora enum("9:00", "13:00", "15:00", "17:00", "19:00", "21:00") NOT NULL,
	vigente boolean NOT NULL DEFAULT true,
	senia numeric(11, 2) DEFAULT 0,
	
	CONSTRAINT pk_reserva
		PRIMARY KEY (id),
	
	CONSTRAINT fk_cliente
		FOREIGN KEY (cliente_id)
		REFERENCES cliente (id)
);

CREATE UNIQUE INDEX horario
	ON reserva (fecha, hora);

CREATE TABLE telefono(
	
	id int AUTO_INCREMENT,
	reserva_id int NOT NULL,
	nom_padre varchar(20) NOT NULL,
	nom_hijo varchar(20) NOT NULL,
	
	CONSTRAINT pk_telefono
		PRIMARY KEY (id),
	
	CONSTRAINT fk_reserva
		FOREIGN KEY (reserva_id)
		REFERENCES reserva (id)
);

CREATE TABLE usuario(
	
	id int AUTO_INCREMENT,
	usuario varchar(20) UNIQUE NOT NULL,
	contrasena varchar(30) NOT NULL,
	
	CONSTRAINT pk_usuario
		PRIMARY KEY (id)
);

DROP VIEW IF EXISTS reservasDelDia;

CREATE VIEW reservasDelDia AS 
	SELECT c.nombre, c.telefono, r.fecha, r.hora, r.senia
	FROM reserva r, cliente c
	WHERE r.fecha = (SELECT concat(extract(year from now()), '-', extract(month from now()), '-', extract(day from now())))
		AND r.cliente_id = c.id;

DROP VIEW IF EXISTS reservasDeLaSemana;

CREATE VIEW reservasDeLaSemana AS 
	SELECT c.nombre, c.telefono, r.fecha, r.hora, r.senia
	FROM reserva r, cliente c
	WHERE r.fecha < ((SELECT concat(extract(year from now()), '-', extract(month from now()), '-', extract(day from now()))) + INTERVAL 7 DAY)
		AND r.fecha > (SELECT concat(extract(year from now()), '-', extract(month from now()), '-', extract(day from now())))
		AND r.cliente_id = c.id;

DROP VIEW IF EXISTS reservasDelMes;

CREATE VIEW reservasDelMes AS 
	SELECT c.nombre, c.telefono, r.fecha, r.hora, r.senia
	FROM reserva r, cliente c
	WHERE r.fecha < ((SELECT concat(extract(year from now()), '-', extract(month from now()), '-', extract(day from now()))) + INTERVAL 30 DAY)
		AND r.fecha > (SELECT concat(extract(year from now()), '-', extract(month from now()), '-', extract(day from now())))
		AND r.cliente_id = c.id;


COMMIT;
