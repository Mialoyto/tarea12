USE superhero;

/* CREATE VIEW spu_superhero_all
AS
SELECT 
	SH.id,
    SH.superhero_name,
    SH.full_name,
    GD.gender,
    C1.colour 'eye_colour',
    C2.colour 'hair_color',
    C3.colour 'skin_color',
    RC.race,
    PB.publisher_name
	FROM superhero SH
     LEFT JOIN gender GD ON GD.id = SH.gender_id
     LEFT JOIN colour C1 ON C1.id = SH.eye_colour_id
	 LEFT JOIN colour C2 ON C2.id = SH.hair_colour_id
     LEFT JOIN colour C3 ON C3.id = SH.skin_colour_id
     LEFT JOIN race RC ON RC.id = SH.race_id
     LEFT JOIN publisher PB ON PB.id = SH.publisher_id
     */
     
     
-- buscar por nombre
DELIMITER $$
CREATE PROCEDURE spu_superhero_by_publisher_name
(
	IN _publisher_name	 VARCHAR(50)
)
BEGIN
	SELECT * FROM spu_superhero_all
    WHERE
    publisher_name = _publisher_name;
END $$
	
-- -----------------------------------------------------------------
     
DELIMITER $$
CREATE PROCEDURE spu_publisher_all
()
BEGIN
SELECT
	PB.id,
    PB.publisher_name
    FROM publisher PB;
    
END $$

-- select * from spu_superhero_all;
DELIMITER $$
CREATE PROCEDURE spu_gender_all
()
BEGIN
SELECT
	GEN.id,
    GEN.gender
		FROM gender GEN;
END; $$
-- call spu_gender_all()
-- -------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_listar_idpublisher
(
 	IN _idpublisher	INT
)
BEGIN
	SELECT 
    PB.id as 'publisher_id',
	SH.id as 'idsuperhero',
    SH.superhero_name,
    SH.full_name,
    GD.gender,
    C1.colour 'eye_colour',
    C2.colour 'hair_colour',
    C3.colour 'skin_colour',
    RC.race,
    PB.publisher_name
	FROM superhero SH
     LEFT JOIN gender GD ON GD.id = SH.gender_id
     LEFT JOIN colour C1 ON C1.id = SH.eye_colour_id
	 LEFT JOIN colour C2 ON C2.id = SH.hair_colour_id
     LEFT JOIN colour C3 ON C3.id = SH.skin_colour_id
     LEFT JOIN race RC ON RC.id = SH.race_id
     LEFT JOIN publisher PB ON PB.id = SH.publisher_id
     WHERE SH.publisher_id = _idpublisher;
END; $$
    
-- VERSION 2(LISTA´+ NUMERO DE REGISTRO)
/*
SELECT 
	SH.publisher_id,
    PB.publisher_name,
    COUNT(SH.publisher_id) 'Total'
	FROM superhero SH
    INNER JOIN publisher PB ON PB.id = SH.publisher_id
    GROUP BY SH.publisher_id;
  */  
-- VERSION 3(LISTA + NUMERO DE REGISTRO, CORREGIR LOS ESPACIOS VACIOS)
DELIMITER $$
CREATE VIEW vs_publisher_count
AS
SELECT 
	SH.publisher_id,
    CASE
		WHEN PB.publisher_name = '' THEN 'No Especificado'
        WHEN PB.publisher_name != '' THEN PB.publisher_name
	END 'publisher_name',
    COUNT(SH.publisher_id) 'Total'
    FROM superhero SH
    INNER JOIN publisher PB ON PB.id = SH.publisher_id
    GROUP BY SH.publisher_id;
    $$
-- SELECT * FROM vs_publisher_count;
 -- --------------------------modificado ------------------
 DELIMITER $$
CREATE VIEW spu_superhero_all
AS
SELECT 
	SH.id,
    SH.superhero_name,
    SH.full_name,
    SH.publisher_id,
    GD.gender,
    C1.colour 'eye_colour',
    C2.colour 'hair_color',
    C3.colour 'skin_color',
    RC.race,
    PB.publisher_name
	FROM superhero SH
     LEFT JOIN gender GD ON GD.id = SH.gender_id
     LEFT JOIN colour C1 ON C1.id = SH.eye_colour_id
	 LEFT JOIN colour C2 ON C2.id = SH.hair_colour_id
     LEFT JOIN colour C3 ON C3.id = SH.skin_colour_id
     LEFT JOIN race RC ON RC.id = SH.race_id
     LEFT JOIN publisher PB ON PB.id = SH.publisher_id;
$$

-- buscar por nombre
DELIMITER $$
CREATE PROCEDURE spu_superhero_by_publisher
(
	IN _publisher_id	 INT
)
BEGIN
	SELECT * FROM spu_superhero_all
    WHERE
    publisher_id = _publisher_id;
END $$
-- select * from superhero;
-- -----------------------------------
 -- select * from superhero where publisher_id = 13 and gender_id = 1 LIMIT 10;

-- reporte  => id | superhero_name | full_name | race_id | aligment_id | height_cm | weight_kg
-- titulo : marvel comics | male | total registros (n)

DELIMITER $$
CREATE PROCEDURE spu_filter_pgl

(
	IN	_publisherd_id	INT,
	IN 	_gender_id		INT,
	IN	_limite			INT
	
)
BEGIN
	SELECT 
		SH.id,
		SH.superhero_name,
		SH.full_name,
		RC.race,
		AL.alignment,
		SH.height_cm,
		SH.weight_kg
        FROM superhero SH
			INNER JOIN race RC ON RC.id = SH.gender_id
            INNER JOIN alignment AL ON AL.id = SH.alignment_id
		WHERE publisher_id = _publisherd_id
        AND gender_id = _gender_id
        LIMIT _limite;
END;$$



-- buscador
DELIMITER $$
CREATE VIEW vs_superhero_id
AS
SELECT 
	SH.id,
	SH.superhero_name
    FROM superhero SH;
 $$

-- select * from vs_superhero_id




DELIMITER $$
CREATE PROCEDURE spu_searchname(
in _superhero_name VARCHAR(255)
)
begin
SELECT 
	SP.id,
	SP.superhero_name,
    SP.full_name,
	SP.height_cm,
	SP.weight_kg
    FROM superhero SP
		WHERE SP.superhero_name LIKE CONCAT('%', _superhero_name, '%') ;
end ; $$

-- call spu_searchname('superman');







