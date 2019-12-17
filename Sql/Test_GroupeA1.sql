/*
Fichier : Test_GroupeA1.sql
Auteur : Denis Beauget (21608519) Sylvain Courroye (20120447)
Groupe : Groupe A1
*/


/* Jeu de test pour vérifier le fonctionnement de la BDD et illustrer le fonctionnement des différents trigger/procédure*/

DELETE FROM A_LIEU;
DELETE FROM CONCERNE;
DELETE FROM INSCRIT;
DELETE FROM CREER_SUPPRIMER_CONTRIB;
DELETE FROM EVENEMENT;
DELETE FROM LIEU;
DELETE FROM THEME;
DELETE FROM CONTRIBUTEUR;
DELETE FROM ADMINISTRATEUR;
DELETE FROM VISITEUR;

INSERT INTO ADMINISTRATEUR VALUES('1','Cardano','Vincent','vincent.cardano@gmail.com','cardano34');

INSERT INTO VISITEUR VALUES('1','michel.dumas@laposte.net','Dumas','Michel','68','Michou','cuisinella');

INSERT INTO CONTRIBUTEUR VALUES('1','1','michel.dumas@laposte.net','Dumas','Michel','68','Michou','cuisinella');
INSERT INTO CREER_SUPPRIMER_CONTRIB VALUES('1','1',now());
INSERT INTO CONTRIBUTEUR VALUES('2','1','roger.delcours@wanadoo.fr','Delcours','Roger','43','Roro','delro21');
INSERT INTO CREER_SUPPRIMER_CONTRIB VALUES('2','1',now());


INSERT INTO LIEU VALUES('1','Montpellier','Gambetta','5',34000,3.876716,43.610769);
INSERT INTO LIEU VALUES('2','Paris','Place Montmartre','21',78000,2.333333,48.866667);
INSERT INTO LIEU VALUES('3','Grenoble',' Rue Millet','11',38000,5.724524,45.188529);
INSERT INTO LIEU VALUES('4','Toulouse','Rue Clément','19',31000,1.433333,43.600000);
INSERT INTO LIEU VALUES('5','Montpellier','Avenue Assas','32',34000,3.886716,43.620769);

INSERT INTO THEME VALUES('1','Exposition photo','Photo','1',now());
INSERT INTO THEME VALUES('2','Exposition peinture','Art','1',now());
INSERT INTO THEME VALUES('3','Maraude','Associatif','1',now());


/* Ces lignes déclenchent les triggers de suivi dans les tables A_LIEU et CONCERNE */

INSERT INTO EVENEMENT VALUES('1','PhotArt','2019-12-21',400,900,'1','1','2',"Exposition photo regroupant vos plus beaux clichés de l'année 2019",now());
INSERT INTO EVENEMENT VALUES('2','MarryMe','2019-12-21',10,100,'1','1','2',"Les plus belles photos de notre équipe de bénévole sur le thème du mariage",now());
INSERT INTO EVENEMENT VALUES('3','Galerie Artis','2019-12-28',2,40,'1','2','3',"Recueil de tableau de jeune étudiant en art de l'université de Grenoble",now());
INSERT INTO EVENEMENT VALUES('4','Alerte Maraude','2019-12-24',0,20,'1','3','4',"Nous allons nous déplacer dans le centre-ville pour donner aux personnes dans le besoin des paniers repas préparé par l'association",now());

INSERT INTO INSCRIT VALUES('1','1',now());

/* Exemple d'utilisation de la procédure NOMBRE_UTILISATION_THEME */
SET @nb=0;
CALL NOMBRE_UTILISATION_THEME(@nb,'1');
SELECT @nb as NombreTotal;

/* Exemple d'utilisation de la procédure MOYENNE_EFFECTIF_EVENT */
CALL MOYENNE_EFFECTIF_EVENT(@p0); 
SELECT @p0 AS `MoyenneEffectif`;

/* Exemple d'utilisation de la procédure MAX_APPARITION_VILLE */
CALL MAX_APPARITION_Ville(@p0, @p1);
SELECT @p0 AS `NomVille`, @p1 AS `MaxApparitionVille`;

/* La suppression du theme avec l'id 1 par exemple déclenche le trigger lié au suppression d'un theme et empêche la suppression de celui-ci */
/* Décommentez la ligne suivante pour avoir le message du trigger */

/* DELETE FROM THEME WHERE idtheme = 1; */


