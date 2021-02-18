<?php
if(Permission::getInstance()->verifPerm('PermsPanel', 'theme', 'actions', 'editTheme'))
{
	$configTheme = new Lire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml');
	$ecritureTheme = $configTheme->GetTableau();



//FOOTER PART (Choix des réseaux et du "A Propos")


	$ecritureTheme['Pied']['about'] = nl2br(htmlspecialchars($_POST['about']));
	$ecritureTheme['Pied']['social'] = json_decode($_POST['jsonReseau'], true);

	$ecriture = new Ecrire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml', $ecritureTheme);


// Modification couleurs du thème


	$ecritureTheme['Main']['theme']['couleurs']['main-color-bg'] = $_POST['main-color-bg'];
	$ecritureTheme['Main']['theme']['couleurs']['secondary-color-bg'] = $_POST['secondary-color-bg'];
	$ecritureTheme['Main']['theme']['couleurs']['base-color'] = $_POST['base-color'];
	$ecritureTheme['Main']['theme']['couleurs']['main-color'] = $_POST['main-color'];
	$ecritureTheme['Main']['theme']['couleurs']['active-color'] = $_POST['active-color'];
	$ecritureTheme['Main']['theme']['couleurs']['darkest'] = $_POST['darkest'];
	$ecritureTheme['Main']['theme']['couleurs']['lightest'] = $_POST['lightest'];
	$ecritureTheme['Main']['theme']['couleurs']['bonus1'] = $_POST['bonus1'];
	$ecritureTheme['Main']['theme']['couleurs']['bonus2'] = $_POST['bonus2'];
	$ecritureTheme['Main']['theme']['couleurs']['txtnav'] = $_POST['txtnav'];





	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


// Modification police du thème

	$ecritureTheme['Main']['theme']['police'] = $_POST['police'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Modification du bg
	$ecritureTheme['Main']['theme']['bg'] = $_POST['bg'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Modification du logo
	$ecritureTheme['Main']['theme']['logo'] = $_POST['logo'];
	$ecritureTheme['Main']['theme']['logo-h'] = $_POST['logo-h'] . 'px';
	$ecritureTheme['Main']['theme']['logo-l'] = $_POST['logo-l'] . 'px';


	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


// Ajouts du nombre de connectés au serveur Discord

	$ecritureTheme['Main']['theme']['discord-id'] = $_POST['discord-id'];
	$ecritureTheme['Main']['theme']['discord-invitation'] = $_POST['discord-invitation'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Partie informations:


// UPLOAD DES IMAGES INFORMATION

	$ecritureTheme['Main']['theme']['informations']['img1'] = $_POST['img1'];
	$ecritureTheme['Main']['theme']['informations']['titre1'] = $_POST['titre1'];
	$ecritureTheme['Main']['theme']['informations']['desc1'] = $_POST['desc1'];
	$ecritureTheme['Main']['theme']['informations']['couleurtitre1'] = $_POST['couleurtitre1'];
	$ecritureTheme['Main']['theme']['informations']['couleurdesc1'] = $_POST['couleurdesc1'];

	$ecritureTheme['Main']['theme']['informations']['img2'] = $_POST['img2'];
	$ecritureTheme['Main']['theme']['informations']['titre2'] = $_POST['titre2'];
	$ecritureTheme['Main']['theme']['informations']['desc2'] = $_POST['desc2'];
	$ecritureTheme['Main']['theme']['informations']['couleurtitre2'] = $_POST['couleurtitre2'];
	$ecritureTheme['Main']['theme']['informations']['couleurdesc2'] = $_POST['couleurdesc2'];

	$ecritureTheme['Main']['theme']['informations']['img3'] = $_POST['img3'];
	$ecritureTheme['Main']['theme']['informations']['titre3'] = $_POST['titre3'];
	$ecritureTheme['Main']['theme']['informations']['desc3'] = $_POST['desc3'];
	$ecritureTheme['Main']['theme']['informations']['couleurtitre3'] = $_POST['couleurtitre3'];
	$ecritureTheme['Main']['theme']['informations']['couleurdesc3'] = $_POST['couleurdesc3'];




	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);





}


?>
