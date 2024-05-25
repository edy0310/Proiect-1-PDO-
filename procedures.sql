DROP PROCEDURE IF EXISTS GetFlori;
CREATE PROCEDURE GetFlori()
BEGIN
    SELECT * FROM flori;
END;

DROP PROCEDURE IF EXISTS insertFlori;
CREATE PROCEDURE insertFlori(
    IN strNume VARCHAR(30),
    IN strCuloare VARCHAR(30),
    IN strMarime VARCHAR(30),
    IN intPret INT
)
BEGIN
    INSERT INTO flori (nume, culoare, marime, pret)
    VALUES (strNume, strCuloare, strMarime, intPret);
END;

DROP PROCEDURE IF EXISTS updateFlori;
CREATE PROCEDURE updateFlori(
    IN strNume VARCHAR(30),
    IN strCuloare VARCHAR(30),
    IN strMarime VARCHAR(30),
    IN intPret INT
)
BEGIN
    UPDATE flori SET culoare = strCuloare, marime = strMarime, pret = intPret
    WHERE nume = strNume;
END;

DROP PROCEDURE IF EXISTS GetFlower;
CREATE PROCEDURE GetFlower(
    IN intID INT,
    OUT strNume VARCHAR(30),
    OUT strMarime VARCHAR(30),
    OUT intPret INT
)
BEGIN
    SELECT nume, marime, pret
    INTO strNume, strMarime, intPret
    FROM flori
    WHERE id = intID;
END;

DROP TRIGGER IF EXISTS BInsertTrigger;
CREATE TRIGGER BInsertTrigger BEFORE INSERT ON flori
FOR EACH ROW
BEGIN
    INSERT INTO flower_update (nume, status, edtime) VALUES (NEW.nume, 'INSERTED', NOW());
END;

DROP TRIGGER IF EXISTS BUpdateTrigger;
CREATE TRIGGER BUpdateTrigger BEFORE UPDATE ON flori
FOR EACH ROW
BEGIN
    INSERT INTO flower_update (nume, status, edtime) VALUES (NEW.nume, 'UPDATED', NOW());
END;

DROP TRIGGER IF EXISTS BDeleteTrigger;
CREATE TRIGGER BDeleteTrigger BEFORE DELETE ON flori
FOR EACH ROW
BEGIN
    INSERT INTO flower_update (nume, status, edtime) VALUES (OLD.nume, 'DELETED', NOW());
END;
