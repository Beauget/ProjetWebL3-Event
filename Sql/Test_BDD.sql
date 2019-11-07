/* Jeu de test pour vérifier le fonctionnement de la BDD*/

DELETE FROM LIEU;
DELETE FROM EVENEMENT;
DELETE FROM CONTRIBUTEUR;
DELETE FROM ADMINISTRATEUR;
DELETE FROM THEME;

INSERT INTO LIEU VALUES ('0001','France','Montpellier','Gambetta',5,'34000',458,124);
INSERT INTO LIEU VALUES ('0002','France','Lyon','Parc Lyon','34000',26,458,124);
INSERT INTO LIEU VALUES ('0003','France','Paris','République','34000',13,458,124);

INSERT INTO CONTRIBUTEUR VALUES ('001','azentiaytbpro@gmail.com','Denis','Beauget','21','Azentia');

/* On ne peux pas créer d'événement avec un IdContrib non existant (FOREIGNKEY) */
INSERT INTO ADMINISTRATEUR VALUES ('1','Denis','Beauget','azentiaytbpro@gmail.com');


INSERT INTO THEME VALUES ('00001','Shooting Photo','Photo','1',06/11/2019);

INSERT INTO EVENEMENT VALUES ('0001',02/12/2019,10,100,'001','00001',06/11/2019);

INSERT INTO ADMINISTRATEUR VALUES ('2','ROGER','Beauget','azentiaytbpro@gmail.com');


