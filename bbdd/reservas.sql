DROP PROCEDURE IF EXISTS cargar;

DELIMITER //
CREATE PROCEDURE cargar ()
BEGIN
	
	LOOP
		INSERT INTO reserva(cliente_id, fecha, hora, vigente, senia) VALUES(
			(SELECT ROUND((RAND() * ((SELECT id FROM cliente ORDER BY id DESC LIMIT 1)-0))+0)),
			(CURRENT_DATE + interval rand()*1 month + interval rand()*30 day),
			'13:00',
			true,
			ROUND(RAND()*300)
			);
	END LOOP;
END//
