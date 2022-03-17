DELIMITER |
CREATE or REPLACE TRIGGER note_motif BEFORE INSERT ON note FOR EACH ROW
BEGIN
DECLARE libeperiode varchar(50);
DECLARE max int;

SELECT lib_periode into libeperiode FROM periode WHERE est_active =1 ;
SELECT max(id_note) INTO max FROM note  ;
set max = max + '1' ;
SET NEW.nr_ordre = CONCAT(max,' ', libeperiode);
END |
DELIMITER ;

//modifier la table note et mettre nr_ordre en varchar(50) 