
DELIMITER |
CREATE OR REPLACE TRIGGER Ligne_de_frais_insert before INSERT
ON ligne FOR EACH ROW
BEGIN



SET new.mt_total = new.nb_km * new.mt_km + new.mt_peage + new.mt_repas + new.mt_hebergement;
update  note
SET mt_total = new.mt_total ,est_valide ='1' where id_note = new.id_note ;



END |