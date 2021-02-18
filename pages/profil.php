<?php
require_once "theme/Flat/header.php";
$getprofil = $_GET['profil'];
$isMyAccount = false;
$nbrAccount = 0;

// GESTION D'ERREURS
if (isset($_GET['erreur'])) {
    $errorContent = '';
    switch ($_GET['erreur']) {
        case 1:
            $errorContent = 'Erreur, l\'email entré est vide...';
            break;

        case 2:
            $errorContent = 'Erreur, un des champs est trop court (minimum 4 caractères)';
            break;

        case 3:
            $errorContent = 'Erreur, le mot de passe entré ne correspond pas à celui associé à votre compte';
            break;

        case 4:
            $errorContent = 'Erreur, Vous n\'avez pas assez de tokens.';
            break;

        case 5:
            $errorContent = 'Erreur, Pseudonyme inconnu...';
            break;

        case 6:
            $errorContent = 'Erreur, Extension non autorisée !';
            break;

        case 7:
            $errorContent = 'Erreur, Fichier trop volumineux ! <small>Maximum 2Mo</small>';
            break;

        case 8:
            $errorContent = 'Erreur, Des champs sont manquants !';
            break;

        case 9:
            $errorContent = 'Erreur, Impossible de vous abonner / désabonner à votre Newsletter...';

        case 10:
            $errorContent = 'Erreur, Impossible d\'afficher / cacher votre email...';

        default:
            $errorContent = 'Une erreur est survenue lors de l\'enregistrement de vos informations !';
            break;
    }
    //GESTION DE SUCCÈS
} elseif (isset($_GET['success'])) {
    $successContent = '';
    switch ($_GET['success']) {
        case 'true':
            $successContent = 'Vos informations ont bien été changé !';
            break;

        case 'jetons':
            if (!isset($_GET['montant']) || !is_numeric($_GET['montant'])) {
                $_GET['montant'] = 'NaN';
            }
            if (!isset($_GET['pseudo'])) {
                $_GET['pseudo'] = 'NOT_FOUND';
            }
            $successContent = 'Vous venez d\'envoyer ' . htmlspecialchars($_GET['montant']) . ' '.$_Serveur_['General']['moneyName'].' à ' . htmlspecialchars($_GET['pseudo']) . ' !';
            break;

        case 'image':
            $successContent = 'Votre photo de profil a été modifiée !';
            break;

        case 'imageRemoved':
            $successContent = 'Votre photo de profil a bien été supprimée de nos serveurs !';
            break;

        default:
            $successContent = '<div class="text-danger">Message de succès introuvable...</div>';
    }
}
?>



<!-- Gestion skin du joueur -->
<?php

//Conversion du pseudo → UUID
$UUID = file_get_contents('http://api.serveurs-minecraft.com/api_uuid?Pseudo_Vers_UUID&ID='.htmlspecialchars($joueurDonnees['pseudo']));

//CONVERSION UUID
$UUID = substr_replace($UUID, "-", 11, 0);
$UUID = substr_replace($UUID, "-", 16, 0);
$UUID = substr_replace($UUID, "-", 21, 0);
$UUID = substr_replace($UUID, "-", 26, 0);

//Création du skin
$skinwaitclean = "https://crafatar.com/renders/body/".$UUID;

//Nettoyage du liens
$skin = preg_replace(

    "/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/",

    "", $skinwaitclean

);

?>





<section id="Profil">
    <div class="container-fluid col-md-9 col-lg-9 col-sm-10">

        <?php if (isset($_Joueur_["pseudo"]) && $_Joueur_['pseudo'] != $_GET['profil']) :
            $isMyAccount = false; ?>
        <?php endif; ?>

        <?php if (isset($_Joueur_) and $_GET['profil'] === $_Joueur_['pseudo']) :
            $isMyAccount = true ?>
        <?php endif; ?>
        <div class="row">


            <?php if ($isMyAccount) : ?>
                <div class="col-md-12 col-lg-3 col-sm-12 mb-3">
                    <!-- Informations du profile -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Informations</h4>
                        </div>
                        <div class="card-body categories">

                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?php echo $skin?>" class="card-img" alt="Skin de <?= $joueurDonnees['pseudo'] ?>" style="margin-left: 7px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-title"><?= $gradeSite ?> <?= htmlspecialchars($joueurDonnees['pseudo']); ?></p><br>
                                        <h5 class="card-title">Inscrit le :</h5>
                                        <p class="card-text"><?= date('d/m/Y', $joueurDonnees['anciennete']); ?></p>
                                        <h5 class="card-title">Votes :</h5>
                                        <p class="card-text">
                                            <?php require_once("modele/topVotes.class.php");
                                            $topVotes = new TopVotes($bddConnection);
                                            $nbreVotes = $topVotes->getNbreVotes($getprofil); ?>
                                            <?= $nbreVotes . ' ' . ($nbreVotes > 1 ? "votes" : "vote"); ?>
                                        </p>

                                        <h5 class="card-title"><?php echo $_Serveur_['General']['moneyName']; ?></h5>
                                        <p class="card-text">
                                            <?php if (isset($_Joueur_['tokens'])) echo $_Joueur_['tokens']; ?> <i class="fas fa-coins"></i>
                                        </p>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            <?php else : ?>

            <?php endif; ?>
            <?php if ($isMyAccount) : ?>
                <div class="col-md-12 col-lg-6 col-sm-12 mb-5">
                    <!-- Modification du compte -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Modifier mon compte</h4>
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="row">

                                        <div class="col-md-12 col-lg-3 col-sm-12 mb-3 ml-lg-3">
                                            <!-- Navigation -->
                                            <div class="categories">
                                                <ul class="categorie-content nav nav-tabs">
                                                    <li class="categorie-item nav-item">
                                                        <a href="#editPersonal" class="nav-link categorie-link active"
                                                           data-toggle="tab" aria-controls="editPersonal" aria-selected="true">
                                                            Informations personnelles
                                                        </a>
                                                    </li>

                                                    <li class="categorie-item nav-item">
                                                        <a href="#editOptionnal" class="nav-link categorie-link" data-toggle="tab"
                                                           aria-controls="editOptionnal" aria-selected="false">
                                                            Informations optionnelles
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-lg-8 col-sm-12 mb-3 ml-lg-3">
                                            <!-- Contenu -->
                                            <div class="tab-content">

                                                <div id="editPersonal" class="tab-pane fade show active" role="tabpanel"
                                                     aria-labelledby="editPersonal">

                                                    <form class="form-horizontal" method="post" action="?&action=changeProfil"
                                                          role="form">

                                                        <div class="form-row py-1">

                                                            <div class="col-md-12 py-2">
                                                                <label for="namePseudo"> Pseudo </label>
                                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <div class="input-group-text bg-main border-0">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </span>
                                                                    <input type="text" name="pseudo"
                                                                           class="form-control custom-text-input" id="namePseudo"
                                                                           value="<?= $joueurDonnees['pseudo']; ?>" disabled
                                                                           style="cursor: not-allowed">
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <h5 class="mt-4 mb-0">Modifier votre mot de passe : <small>(Laisser vide
                                                                pour ne pas modifier)</small></h5>
                                                        <hr class="bg-main w-80 float-left my-1">
                                                        <div class="clearfix"></div>

                                                        <div class="form-row py-2">

                                                            <div class="col-md-12 mb-2">
                                                                <label for="mdpAncien"> Mot de passe Actuel </label>
                                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <div class="input-group-text bg-main border-0">
                                                                <i class="fas fa-key"></i>
                                                            </div>
                                                        </span>

                                                        <input type="password" name="mdp" class="form-control custom-text-input" id="MdpConnectionForm" placeholder="Entrez votre mot de passe">
                                                              <div class="input-group-append">
                                                                   <span toggle="#MdpConnectionForm" class="fa fa-fw fa-eye field-icon toggle-password "></span>
                                                              </div>

                                                                </div>
                                                            </div>



                                                            <div class="col-md-12 mb-2">
                                                                <label for="mdpNouveau"> Nouveau mot de passe </label>
                                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <div class="input-group-text bg-main border-0">
                                                                <i class="fas fa-key"></i>
                                                            </div>
                                                        </span>
                                                                    <input type="password" name="mdpNouveau" class="form-control custom-text-input" id="MdpNouveau" placeholder="Entrez votre nouveau mot de passe">
                                                                    <div class="input-group-append">
                                                                        <span toggle="#MdpNouveau" class="fa fa-fw fa-eye field-icon toggle-password "></span>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-12 mb-2">
                                                                <label for="mdpConfirme"> Confirmation Mot de passe </label>
                                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <div class="input-group-text bg-main border-0">
                                                                <i class="fas fa-key"></i>
                                                            </div>
                                                        </span>
                                                                    <input type="password" name="mdpConfirme" class="form-control custom-text-input" id="MdpConfirme" placeholder="Confirmez votre nouveau mot de passe">
                                                                    <div class="input-group-append">
                                                                        <span toggle="#MdpConfirme" class="fa fa-fw fa-eye field-icon toggle-password "></span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <h5 class="mt-4 mb-0">Modifier votre mail : <small>(Laisser vide pour ne
                                                                pas modifier)</small></h5>
                                                        <hr class="bg-main w-80 float-left my-1">
                                                        <div class="clearfix"></div>

                                                        <div class="form-row py-2">

                                                            <div class="col-md-8">
                                                                <label for="inputMail"> Email </label>
                                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <div class="input-group-text bg-main border-0">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </span>
                                                                    <input type="email" name="email"
                                                                           class="form-control custom-text-input" id="inputMail"
                                                                           placeholder="Entrez votre mail"
                                                                           value="<?= $joueurDonnees['email']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-row py-2">
                                                            <div class="col-md-8">
                                                                <label for="inputNewsletter"> Abonnement à la Newsletter </label>
                                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <div class="input-group-text bg-main border-0">
                                                                <i class="fas fa-plus-square"></i>
                                                            </div>
                                                        </span>

                                                                    <?php if ($joueurDonnees['newsletter']) : ?>
                                                                        <input type="text"
                                                                               class="form-control custom-text-input text-success"
                                                                               id="inputNewsletter" name="inputNewsletter"
                                                                               value="Déjà abonné !" disabled />
                                                                    <?php else : ?>
                                                                        <input type="text"
                                                                               class="form-control custom-text-input text-danger"
                                                                               id="inputNewsletter" name="inputNewsletter"
                                                                               value="Non abonné !" disabled />
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <?php if ($joueurDonnees['newsletter']) : ?>
                                                                    <button type='submit'
                                                                            class="btn btn-reverse form-control text-danger"
                                                                            name="changeNewsletter" value="unsubscribeNewsletter"
                                                                            style="margin-top: 1.9rem">Se désinscrire
                                                                    </button>

                                                                <?php else : ?>

                                                                    <button type='submit' class="btn btn-reverse form-control"
                                                                            name="changeNewsletter" value="subscribeNewsletter"
                                                                            style="margin-top: 1.9rem">S'inscrire
                                                                    </button>

                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="row w-100">
                                                                <div class="col-12 mt-4">
                                                                    <button type="submit"
                                                                            class="btn btn-main validerChange bg-lightest w-100 form-control">
                                                                        Valider mes changements
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>

                                                <div id="editOptionnal" class="tab-pane fade" role="tabpanel"
                                                     aria-labelledby="editOptionnal">
                                                    <form class="form-horizontal" method="post" action="?&action=changeProfilAutres"
                                                          role="form">

                                                        <?php foreach ($listeReseaux as $value) : ?>

                                                            <div class="form-row py-1">
                                                                <label for="<?= $value['nom']; ?>">
                                                                    <?= ucfirst($value['nom']); ?>
                                                                </label>
                                                                <input type="text" class="form-control custom-text-input"
                                                                       name="<?= $value['nom']; ?>"
                                                                       placeholder="Votre nom d'utilisateur <?= $value['nom']; ?>"
                                                                       value="<?php if ($joueurDonnees[$value['nom']] !== 'inconnu') echo $joueurDonnees[$value['nom']]; ?>">
                                                            </div>

                                                        <?php endforeach; ?>

                                                        <div class="form-row">
                                                            <label for="age">
                                                                Âge <small>(0 =
                                                                    caché)</small>
                                                            </label>
                                                            <input type="number" name="age" class="form-control custom-text-input "
                                                                   min="0" max="99" placeholder="17"
                                                                   value="<?php if ($joueurDonnees['age'] !== 'inconnu') echo $joueurDonnees['age']; ?>">

                                                        </div>


                                                        <div class="form-row wys-content">
                                                            <h5 class="mt-4 mb-0">Signature</h5>
                                                            <hr class="bg-main w-80 float-left my-1">
                                                            <div class="clearfix"></div>

                                                            <div class="col-md-12 text-center wys-options">
                                                                <textarea  data-UUID="0005" id="ckeditor" name="signature" style="height: 275px; margin: 0px; width: 100%;"><?= $joueurDonnees['signature'] ?></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="row w-100">
                                                            <div class="col-12 mt-4">
                                                                <button type="submit"
                                                                        class="btn btn-main validerChange bg-lightest w-100 form-control">
                                                                    Valider mes changements
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <div class="col-md-12 col-lg-6 col-sm-12 mb-5 ">

                    <!-- Informations du profile vu par les autres joueurs-->
                    <div class="card">
                        <div class="card-header">
                            <h4>Informations</h4>
                        </div>
                        <div class="card-body categories">

                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?php echo $skin?>" class="card-img" alt="Skin de <?= $joueurDonnees['pseudo'] ?>" style="margin-left: 7px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-title"><?= $gradeSite ?> <?= htmlspecialchars($joueurDonnees['pseudo']); ?></p><br>
                                        <h5 class="card-title">Inscrit le :</h5>
                                        <p class="card-text"><?= date('d/m/Y', $joueurDonnees['anciennete']); ?></p>
                                        <h5 class="card-title">Votes :</h5>
                                        <p class="card-text">
                                            <?php require_once("modele/topVotes.class.php");
                                            $topVotes = new TopVotes($bddConnection);
                                            $nbreVotes = $topVotes->getNbreVotes($getprofil); ?>
                                            <?= $nbreVotes . ' ' . ($nbreVotes > 1 ? "votes" : "vote"); ?>
                                        </p>
                                        <?php if ($isMyAccount) : ?>
                                            <h5 class="card-title"><?php echo $_Serveur_['General']['moneyName']; ?></h5>
                                            <p class="card-text">
                                                <?php if (isset($_Joueur_['tokens'])) echo $_Joueur_['tokens']; ?> <i class="fas fa-coins"></i>
                                            </p>
                                        <?php else : ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            <?php endif; ?>



            <?php if ($isMyAccount) : ?>
            <div class="col-md-12 col-lg-3 col-sm-12 mb-5">

                <form method="post" action="?action=modifImgProfil" role="form" enctype="multipart/form-data">


                            <div class="card">
                                <div class="card-container text-center">
                                    <div class="card-header">
                                        <h4>Image de profil</h4>
                                    </div>

                                    <img class="profile-image"
                                         src="<?= $_ImgProfil_->getUrlHeadByPseudo($_Joueur_['pseudo'], 128); ?>"
                                         style="height:128px; width:128px;"
                                         alt="Image de profil de <?= htmlspecialchars($joueurDonnees['pseudo']) ?>" />

                                    <label for="img_profil">
                                        <input type="file" class="form-control-file d-none" name="img_profil" id="img_profil"
                                               onchange='getUploadFileName(this)' required />
                                        <span class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Choisir une image
                                        </span>
                                    </label>


                                <div class="card-footer">
                                        <div class="alert alert-main p-1 w-80"><span> Image Choisie : </span>
                                            <span id="file-name">Aucune image sélectionnée !</span></div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> Envoyer</button>
                                        <a class="btn btn-sm btn-danger" href="?action=removeImgProfil"><i class="fa fa-trash-alt"></i> Supprimer</a>
                                    </div>
                                </div>


                            </div>

                </form>
            </div>


                <?php else : ?>

                <?php endif; ?>
            </div>
        </div>






    </div>

    <div class="col-10 text-center mx-auto">
        <h4 class="my-5 text-left">Signature : </h4>
        <?php if (!empty($joueurDonnees['signature'])) : ?>

            <div class="blockquote-wrapper">
                <div class="blockquote">
                    <h1>
                        <?= $joueurDonnees['signature'] ?>
                    </h1>

                </div>
            </div>

        <?php else : ?>
            <div class="blockquote-wrapper">
                <div class="blockquote">
                    <h1>
                        Ce joueur ne possède pas de signature...
                    </h1>

                </div>
            </div>
        <?php endif; ?>
    </div>

    </div>
</section>
