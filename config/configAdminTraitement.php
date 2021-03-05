<?php
if(Permission::getInstance()->verifPerm('PermsPanel', 'theme', 'actions', 'editTheme'))
{
	$configTheme = new Lire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml');
	$ecritureTheme = $configTheme->GetTableau();



// FOOTER


	$ecritureTheme['Pied']['about'] = nl2br(htmlspecialchars($_POST['about']));


	$ecritureTheme['Pied']['couleurbg'] = $_POST['couleurfooterbg'];

	$ecritureTheme['Pied']['couleurtxt'] = $_POST['couleurfootertxt'];

	$ecritureTheme['Pied']['link1'] = $_POST['link1'];
	$ecritureTheme['Pied']['linktxt1'] = $_POST['linktxt1'];
	$ecritureTheme['Pied']['link2'] = $_POST['link2'];
	$ecritureTheme['Pied']['linktxt2'] = $_POST['linktxt2'];
	$ecritureTheme['Pied']['link3'] = $_POST['link3'];
	$ecritureTheme['Pied']['linktxt3'] = $_POST['linktxt3'];
	$ecritureTheme['Pied']['link4'] = $_POST['link4'];
	$ecritureTheme['Pied']['linktxt4'] = $_POST['linktxt4'];
	$ecritureTheme['Pied']['link5'] = $_POST['link5'];
	$ecritureTheme['Pied']['linktxt5'] = $_POST['linktxt5'];
	$ecritureTheme['Pied']['link6'] = $_POST['link6'];
	$ecritureTheme['Pied']['linktxt6'] = $_POST['linktxt6'];
	$ecritureTheme['Pied']['link7'] = $_POST['link7'];
	$ecritureTheme['Pied']['linktxt7'] = $_POST['linktxt7'];


	$ecriture = new Ecrire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml', $ecritureTheme);


// Modification couleurs du thème


	$ecritureTheme['Main']['theme']['couleurs']['fade-bg1'] = $_POST['fade-bg1'];
	$ecritureTheme['Main']['theme']['couleurs']['fade-bg2'] = $_POST['fade-bg2'];
	$ecritureTheme['Main']['theme']['couleurs']['secondary-color-bg'] = $_POST['secondary-color-bg'];
	$ecritureTheme['Main']['theme']['couleurs']['base-color'] = $_POST['base-color'];
	$ecritureTheme['Main']['theme']['couleurs']['main-color'] = $_POST['main-color'];
	$ecritureTheme['Main']['theme']['couleurs']['active-color'] = $_POST['active-color'];
	$ecritureTheme['Main']['theme']['couleurs']['darkest'] = $_POST['darkest'];
	$ecritureTheme['Main']['theme']['couleurs']['lightest'] = $_POST['lightest'];
	$ecritureTheme['Main']['theme']['couleurs']['bonus1'] = $_POST['bonus1'];
	$ecritureTheme['Main']['theme']['couleurs']['bonus2'] = $_POST['bonus2'];
	$ecritureTheme['Main']['theme']['couleurs']['txtnav'] = $_POST['txtnav'];
	$ecritureTheme['Main']['theme']['couleurs']['boutiquestockclr'] = $_POST['boutiquestockclr'];




	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


// Modification police du thème

	$ecritureTheme['Main']['theme']['police'] = $_POST['police'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


// ShadowHeader

	$ecritureTheme['Main']['theme']['shadowheader'] = $_POST['shadowheader'];
	$ecritureTheme['Main']['theme']['couleurshadowheader'] = $_POST['couleurshadowheader'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


// Modification du logo
	$ecritureTheme['Main']['theme']['logo'] = $_POST['logo'];
	$ecritureTheme['Main']['theme']['logo-h'] = $_POST['logo-h'] . 'px';
	$ecritureTheme['Main']['theme']['logo-l'] = $_POST['logo-l'] . 'px';


	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Style des news
	$ecritureTheme['Main']['theme']['style-news'] = $_POST['style-news'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Style des tables
	$ecritureTheme['Main']['theme']['table-mode'] = $_POST['table-mode'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Ajouts du nombre de connectés au serveur Discord

	$ecritureTheme['Main']['theme']['discord-id'] = $_POST['discord-id'];
	$ecritureTheme['Main']['theme']['discord-invitation'] = $_POST['discord-invitation'];
	$ecritureTheme['Main']['theme']['discord-widget'] = $_POST['discord-widget'];

	$ecritureTheme['Main']['theme']['discord-widget-l'] = $_POST['discord-widget-l'];
	$ecritureTheme['Main']['theme']['discord-widget-h'] = $_POST['discord-widget-h'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

// Partie informations:


// UPLOAD DES IMAGES INFORMATION

	$ecritureTheme['Main']['theme']['informations']['opacitybg'] = $_POST['opacityinfobg'];

	$ecritureTheme['Main']['theme']['informations']['img1'] = $_POST['img1'];
	$ecritureTheme['Main']['theme']['informations']['titre1'] = $_POST['titre1'];
	$ecritureTheme['Main']['theme']['informations']['desc1'] = $_POST['desc1'];
	$ecritureTheme['Main']['theme']['informations']['couleurtitre1'] = $_POST['couleurtitre1'];
	$ecritureTheme['Main']['theme']['informations']['couleurdesc1'] = $_POST['couleurdesc1'];
	$ecritureTheme['Main']['theme']['informations']['couleurback1'] = $_POST['couleurback1'];

	$ecritureTheme['Main']['theme']['informations']['img2'] = $_POST['img2'];
	$ecritureTheme['Main']['theme']['informations']['titre2'] = $_POST['titre2'];
	$ecritureTheme['Main']['theme']['informations']['desc2'] = $_POST['desc2'];
	$ecritureTheme['Main']['theme']['informations']['couleurtitre2'] = $_POST['couleurtitre2'];
	$ecritureTheme['Main']['theme']['informations']['couleurdesc2'] = $_POST['couleurdesc2'];
	$ecritureTheme['Main']['theme']['informations']['couleurback2'] = $_POST['couleurback2'];

	$ecritureTheme['Main']['theme']['informations']['img3'] = $_POST['img3'];
	$ecritureTheme['Main']['theme']['informations']['titre3'] = $_POST['titre3'];
	$ecritureTheme['Main']['theme']['informations']['desc3'] = $_POST['desc3'];
	$ecritureTheme['Main']['theme']['informations']['couleurtitre3'] = $_POST['couleurtitre3'];
	$ecritureTheme['Main']['theme']['informations']['couleurdesc3'] = $_POST['couleurdesc3'];
	$ecritureTheme['Main']['theme']['informations']['couleurback3'] = $_POST['couleurback3'];


	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


	// Partie LAUNCHER

	$ecritureTheme['Main']['theme']['launcher-mode'] = $_POST['launcher-mode'];
	$ecritureTheme['Main']['theme']['launcher-image'] = $_POST['launcher-image'];
	$ecritureTheme['Main']['theme']['launcher-liens'] = $_POST['launcher-liens'];
	$ecritureTheme['Main']['theme']['launcher-description'] = $_POST['launcher-description'];

	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);


	// Partie STAFF

	$ecritureTheme['Main']['Staff']['staff-mode'] = $_POST['staff-mode'];
	$ecritureTheme['Main']['Staff']['staff-style'] = $_POST['staff-style'];
	$ecritureTheme['Main']['Staff']['staff-nombre'] = $_POST['staff-nombre'];


	for ($numberStaff=1 ; $numberStaff < $ecritureTheme['Main']['Staff']['staff-nombre']+1 ; $numberStaff++ ) {
		$ecritureTheme['Main']['Staff']['pseudo'.$numberStaff] = $_POST['staff-pseudo'.$numberStaff];
		$ecritureTheme['Main']['Staff']['grade'.$numberStaff] = $_POST['staff-grade'.$numberStaff];
	}



	$ecriture = new Ecrire('theme/Flat/config/config.yml', $ecritureTheme);

}


?>
