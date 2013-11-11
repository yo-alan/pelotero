DROP PROCEDURE IF EXISTS cargar;

DELIMITER //
CREATE PROCEDURE cargar ()
BEGIN
	
	LOOP
		INSERT INTO reserva(cliente_id, fecha, hora, vigente, senia) VALUES(
			(SELECT ROUND((RAND() * ((SELECT id FROM cliente ORDER BY id DESC LIMIT 1)-0))+0)),
			(SELECT (SELECT concat(cast(extract(year from now()) as char), "-", cast(extract(month from now()) as char), "-", cast(extract(day from now()) as char)))
			+ interval rand()*5 month + interval rand()*30 day),
			'17:00',
			false,
			200
		);
	END LOOP;
END//
