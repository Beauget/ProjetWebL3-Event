/* Jeu de test pour vérifier le fonctionnement de la BDD*/

DELETE FROM A_LIEU;
DELETE FROM LIEU;
DELETE FROM EVENEMENT;
DELETE FROM THEME;
DELETE FROM CONTRIBUTEUR;
DELETE FROM ADMINISTRATEUR;
DELETE FROM VISITEUR;

INSERT INTO LIEU VALUES ('1','France','Montpellier','Gambetta',5,'34000',458,124);
INSERT INTO LIEU VALUES ('2','France','Lyon','Parc Lyon','34000',26,458,124);
INSERT INTO LIEU VALUES ('3','France','Paris','République','34000',13,458,124);

INSERT INTO CONTRIBUTEUR VALUES ('1','azentiaytbpro@gmail.com','Denis','Beauget','21','Azentia','test');
INSERT INTO CONTRIBUTEUR VALUES ('2','denis.beauget@laposte.net','Cepas','LEGM','56','CEPas','test123');

INSERT INTO ADMINISTRATEUR VALUES ('1','Denis','Beauget','azentiaytbpro@gmail.com','test1');
INSERT INTO ADMINISTRATEUR VALUES ('2','Cepas','Sapec','cepasLEGM@gmail.com','test2');

INSERT INTO VISITEUR VALUES ('1','azentiaytbpro@gmail.com2','Beauget','Denis','21','Gada','test123');
INSERT INTO VISITEUR VALUES ('2','azentiaytbpro@gmail.com3','Beauget','PetitOursBrun','21','Gada','test1234');



INSERT INTO THEME VALUES ('1','Shooting Photo','Photo','1',06-11-2019);
INSERT INTO THEME VALUES ('2','Pétanque','Sport','2',06-11-2019);
INSERT INTO THEME VALUES ('3','Petit CS','Esport','1',06-11-2019);

INSERT INTO EVENEMENT VALUES ('1',02-12-2019,10,100,'1','1',27-11-2019);
INSERT INTO EVENEMENT VALUES ('2',13-12-2019,10,1000,'2','2',27-11-2019);
INSERT INTO EVENEMENT VALUES ('3',16-12-2019,5,100,'2','3',27-11-2019);


/*IdLieu et IdEvent (dans cet ordre)*/
INSERT INTO A_LIEU VALUES('1','1');
INSERT INTO A_LIEU VALUES('2','2');
INSERT INTO A_LIEU VALUES('3','3');

