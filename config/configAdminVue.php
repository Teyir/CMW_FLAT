<?php include('theme/' . $_Serveur_['General']['theme'] . '/config/configTheme.php');
?>

<!-- ATTENTION AUX DEVELOPPEURS DE THEME :
        -> Le système est concue pour qu'il n'y est qu'un seul FORM, et c'est celui de cette action ! Donc merci de ne pas créer d'autres form et de tout garder dans ce form avec cette action et en POST !
        -> Le fichier de traitement est configAdminTraitement.php il ne peux ni être renommer ni déplacé !
        -> Tout se fait en AJAX donc vous devez conservé le onClick="sendPost('configThemeAdmin');" sur le bouton d'envoie + ne pas mettre de balise <form> + conserver le <script>...</script> + conserver une div id="configThemeAdmin" qui doit englober tout les input de votre formulaire (sinon ils ne seront pas recupérés). N'hésitez pas à demander de l'aide sur le discord !
-->
<style id="themeEdition">
    .theme .nav-item>.nav-link {
        color: black !important;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }
</style>

<div class="row theme">
    <div class="col-md-9 col-xl-9 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Configuration du thème </h4>
            </div>

            <div class="card-body">

                <section>
                    <!-- Gestion des réseaux sociaux -->
                    <div class="row">
                        <div class="col-12" id="configThemeAdmin">

                            <ul class="nav nav-tabs mb-3" id="defaultTheme" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="colorsEdition-tab" data-toggle="tab" href="#colorsEdition" role="tab" aria-controls="colorsEdition" aria-selected="true">Couleurs</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="styleEdition-tab" data-toggle="tab" href="#styleEdition" role="tab" aria-controls="styleEdition" aria-selected="false">Style</a>
                                </li>



                                <li class="nav-item">
                                    <a class="nav-link" id="footerEdition-tab" data-toggle="tab" href="#footerEdition" role="tab" aria-controls="footerEdition" aria-selected="false">Footer</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="widgetsEdition-tab" data-toggle="tab" href="#widgetsEdition" role="tab" aria-controls="widgetsEdition" aria-selected="false">Widgets</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="informationsEdition-tab" data-toggle="tab" href="#informationsEdition" role="tab" aria-controls="informationsEdition" aria-selected="false">Partie informations</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="defaultThemeContent">


                                <div class="tab-pane fade show active" id="colorsEdition" role="tabpanel" aria-labelledby="colorsEdition-tab">

                                    <div class="col-11 mx-auto my-2">

                                        <h4>Modifier les couleurs du thème</h4>

                                        <div class="col-10 mx-auto">

                                            <h4> Présentation du thème :</h4>

                                            <div class="col-9 mx-auto mt-5">
                                                <table class="table table-responsive table-striped table-hover">
                                                    <thead>
                                                    <th></th>
                                                    <th>Fond principal</th>
                                                    <th>Fond secondaire</th>
                                                    <th>Couleur du texte</th>
                                                    <th>Couleur foncée du texte</th>
                                                    <th>Couleur importante du texte</th>
                                                    <th>Fond clair</th>
                                                    <th>Fond foncé</th>
                                                    <th>Bonus 1</th>
                                                    <th>Bonus 2</th>
                                                    <th>Couleur texte navbar</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td> <b> Modifier les couleurs </b> </td>


                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="main-color-bg" value="<?php echo $_Theme_['Main']['theme']['couleurs']['main-color-bg']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="secondary-color-bg" value="<?php echo $_Theme_['Main']['theme']['couleurs']['secondary-color-bg']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="base-color" value="<?php echo $_Theme_['Main']['theme']['couleurs']['base-color']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="main-color" value="<?php echo $_Theme_['Main']['theme']['couleurs']['main-color']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="active-color" value="<?php echo $_Theme_['Main']['theme']['couleurs']['active-color']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="darkest" value="<?php echo $_Theme_['Main']['theme']['couleurs']['darkest']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="lightest" value="<?php echo $_Theme_['Main']['theme']['couleurs']['lightest']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="bonus1" value="<?php echo $_Theme_['Main']['theme']['couleurs']['bonus1']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="bonus2" value="<?php echo $_Theme_['Main']['theme']['couleurs']['bonus2']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="txtnav" value="<?php echo $_Theme_['Main']['theme']['couleurs']['txtnav']; ?>">
                                                        </td>





                                                    </tr>

                                                    <tr id="selColor">
                                                        <td> <b> Couleur présentée </b> </td>


                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['main-color-bg']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['secondary-color-bg']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['base-color']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['main-color']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['active-color']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['darkest']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>


                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['lightest']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['bonus1']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['bonus2']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['txtnav']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>




                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade mx-auto" id="styleEdition" role="tabpanel" aria-labelledby="styleEdition-tab">

                                    <?php
                                    $fontactubrute = $_Theme_['Main']['theme']['police'];
                                    $fontactu = str_replace(array("'", ";"), '', $fontactubrute);

                                    $logohbrute = $_Theme_['Main']['theme']['logo-h'];
                                    $logoh = str_replace(array("'", '"', "px"), '', $logohbrute);

                                    $logolbrute = $_Theme_['Main']['theme']['logo-l'];
                                    $logol = str_replace(array("'", '"', "px"), '', $logolbrute);
                                    ?>

                                    <div class="col-11 mx-auto my-2">

                                        <h4>Modification du style du thème :</h4>

                                        <label class="control-label" for="police">Séléction de la police </label>
                                        <select class="form-control text-center" name="police" style="font-family: <?= $fontactubrute?>">
                                            <option value="<?= $fontactubrute ?>" selected ><?= $fontactu ?></option>

                                            <option value="'Poppins', sans-serif;" style="font-family: 'Poppins', sans-serif;">Poppins</option>
                                            <option value="'Electrolize', sans-serif;" style="font-family: 'Electrolize', sans-serif;">Electrolize, sans-serif</option>
                                            <option value="'Brush Script MT', cursive;" style="font-family: 'Brush Script MT', cursive;">Brush Script MT, cursive</option>
                                            <option value="'Courier New', monospace;" style="font-family: 'Courier New', monospace;">Courier New, monospace</option>
                                            <option value="'Georgia', serif;" style="font-family: 'Georgia', serif;">Georgia, serif</option>
                                            <option value="'Trebuchet MS', sans-serif;" style=" font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS, sans-serif</option>
                                            <option value="'Tahoma', sans-serif;" style=" font-family: 'Tahoma', sans-serif;">Tahoma, sans-serif</option>
                                            <option value="'Cursive';" style="font-family: 'Cursive';">Cursive</option>
                                            <option value="'Arial';" style="font-family: 'Arial';">Arial</option>
                                            <option value="'Palatino';" style="font-family: 'Palatino';">Palatino</option>

                                        </select>

                                        <label class="control-label" for="logo">Logo du serveur </label>
                                        <input class="form-control" type="url" name="logo" id="logo" value="<?= $_Theme_['Main']['theme']['logo'] ?>" placeholder="Entrer le liens de votre logo">



                                        <div class="form-row">

                                            <div class="col">
                                                <label class="control-label" for="logo-h">Hauteur du logo </label>
                                                <input class="form-control" type="number" name="logo-h" id="logo-h" value="<?= $logoh?>" placeholder="Hauteur en pixels">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="logo-l">Largeur du logo </label>
                                                <input class="form-control" type="number" name="logo-l" id="logo-l" value="<?= $logol ?>" placeholder="Largeur en pixels">
                                            </div>
                                        </div>


                                    </div>

                                </div>






                                <div class="tab-pane fade mx-auto" id="footerEdition" role="tabpanel" aria-labelledby="footerEdition-tab">

                                    <div class="col-11 mx-auto my-2">


                                            <h4>À Propos</h4>
                                            <small class="my-1">Parlez de votre serveur, ou du but de ce site internet
                                                !</small>

                                            <div class="col-10 mx-auto">

                                                <textarea class="form-control" name="about" id="aboutTheme">
                                                    <?= $_Theme_['Pied']['about'] ?>
                                                </textarea>

                                            </div>

                                            <label class="control-label" for="couleurfooterbg">Couleur du footer </label>
                                            <input type="color" id="couleurfooterbg" name="couleurfooterbg" value="<?php echo $_Theme_['Pied']['couleurbg']; ?>">

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link1">Texte liens n° 1 </label>
                                                <input class="form-control" type="url" name="link1" id="link1" value="<?= $_Theme_['Pied']['link1']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt1">Liens n° 1 </label>
                                                <input class="form-control" type="text" name="linktxt1" id="linktxt1" value="<?= $_Theme_['Pied']['linktxt1'] ?>" placeholder="Google">
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link2">Texte liens n° 2 </label>
                                                <input class="form-control" type="url" name="link1" id="link2" value="<?= $_Theme_['Pied']['link2']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt2">Liens n° 2 </label>
                                                <input class="form-control" type="text" name="linktxt2" id="linktxt2" value="<?= $_Theme_['Pied']['linktxt2'] ?>" placeholder="Google">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link3">Texte liens n° 3 </label>
                                                <input class="form-control" type="url" name="link1" id="link3" value="<?= $_Theme_['Pied']['link3']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt3">Liens n° 3 </label>
                                                <input class="form-control" type="text" name="linktxt3" id="linktxt3" value="<?= $_Theme_['Pied']['linktxt3'] ?>" placeholder="Google">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link4">Texte liens n° 4 </label>
                                                <input class="form-control" type="url" name="link1" id="link4" value="<?= $_Theme_['Pied']['link4']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt4">Liens n° 4 </label>
                                                <input class="form-control" type="text" name="linktxt4" id="linktxt4" value="<?= $_Theme_['Pied']['linktxt4'] ?>" placeholder="Google">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link5">Texte liens n° 5 </label>
                                                <input class="form-control" type="url" name="link1" id="link5" value="<?= $_Theme_['Pied']['link5']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt5">Liens n° 5 </label>
                                                <input class="form-control" type="text" name="linktxt5" id="linktxt5" value="<?= $_Theme_['Pied']['linktxt5'] ?>" placeholder="Google">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link6">Texte liens n° 6 </label>
                                                <input class="form-control" type="url" name="link1" id="link6" value="<?= $_Theme_['Pied']['link6']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt6">Liens n° 6 </label>
                                                <input class="form-control" type="text" name="linktxt6" id="linktxt6" value="<?= $_Theme_['Pied']['linktxt6'] ?>" placeholder="Google">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="control-label" for="link7">Texte liens n° 7 </label>
                                                <input class="form-control" type="url" name="link1" id="link7" value="<?= $_Theme_['Pied']['link7']?>" placeholder="https://google.fr">
                                            </div>
                                            <div class="col">
                                                <label class="control-label" for="linktxt7">Liens n° 7 </label>
                                                <input class="form-control" type="text" name="linktxt7" id="linktxt7" value="<?= $_Theme_['Pied']['linktxt7'] ?>" placeholder="Google">
                                            </div>
                                        </div>









                                    </div>

                                </div>

                                <div class="tab-pane fade mx-auto" id="widgetsEdition" role="tabpanel" aria-labelledby="widgetsEdition-tab">

                                    <div class="col-11 mx-auto my-2">

                                        <h4>Ajouts / modification des widgets</h4>

                                        <div class="col-10 mx-auto input-group">


                                            <label for="discord">Discord</label>
                                            <div class="input-group input-group-sm mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">ID Discord</span>
                                                </div>
                                                <input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" class="form-control" placeholder="ID de votre serveur Discord" id="discord-id" name="discord-id" value="<?= $_Theme_['Main']['theme']['discord-id'] ?>">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Invitation Discord</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" class="form-control" placeholder="Liens d'invitation de votre serveur Discord" id="discord-invitation" name="discord-invitation" value="<?= $_Theme_['Main']['theme']['discord-invitation'] ?>">
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div class="tab-pane fade mx-auto" id="informationsEdition" role="tabpanel" aria-labelledby="informationsEdition-tab">


                                    <div class="col-11 mx-auto my-2">

                                        <h4>Modification de la partie "informations"</h4>


                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3>Information n°1</h3>
                                                    <label class="control-label" for="img1">Image </label>
                                                    <input class="form-control" type="url" name="img1" id="img1" value="<?= $_Theme_['Main']['theme']['informations']['img1'] ?>" placeholder="Entrer le liens de votre image">


                                                    <label class="control-label" for="img1">Titre </label>
                                                    <input class="form-control" type="text" name="titre1" id="titre1" value="<?= $_Theme_['Main']['theme']['informations']['titre1'] ?>" placeholder="Entrer le titre">

                                                    <label class="control-label" for="desc1">Description </label>
                                                    <textarea class="form-control" name="desc1" id="desc1" placeholder="Entrer la description"><?= $_Theme_['Main']['theme']['informations']['desc1'] ?></textarea>

                                                    <label class="control-label" for="couleurtitre1">Couleur titre </label>
                                                    <input type="color" id="couleurtitre1" name="couleurtitre1" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurtitre1']; ?>">

                                                    <label class="control-label" for="couleurdesc1">Couleur description </label>
                                                    <input type="color" id="couleurdesc1" name="couleurdesc1" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurdesc1']; ?>">

                                                    <label class="control-label" for="couleurback1">Couleur du fond </label>
                                                    <input type="color" id="couleurback1" name="couleurback1" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurback1']; ?>">


                                                </div>

                                                <div class="col-6">
                                                    <h3>Information n°2</h3>
                                                    <label class="control-label" for="img2">Image </label>
                                                    <input class="form-control" type="url" name="img2" id="img2" value="<?= $_Theme_['Main']['theme']['informations']['img2'] ?>" placeholder="Entrer le liens de votre image">


                                                    <label class="control-label" for="img2">Titre </label>
                                                    <input class="form-control" type="text" name="titre2" id="titre2" value="<?= $_Theme_['Main']['theme']['informations']['titre2'] ?>" placeholder="Entrer le titre">

                                                    <label class="control-label" for="desc2">Description </label>
                                                    <textarea class="form-control" name="desc2" id="desc2" placeholder="Entrer la description"><?= $_Theme_['Main']['theme']['informations']['desc2'] ?></textarea>

                                                    <label class="control-label" for="couleurtitre2">Couleur titre </label>
                                                    <input type="color" id="couleurtitre2" name="couleurtitre2" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurtitre2']; ?>">

                                                    <label class="control-label" for="couleurdesc2">Couleur description </label>
                                                    <input type="color" id="couleurdesc2" name="couleurdesc2" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurdesc2']; ?>">

                                                    <label class="control-label" for="couleurback2">Couleur du fond </label>
                                                    <input type="color" id="couleurback2" name="couleurback2" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurback2']; ?>">
                                                </div>

                                                <div class="col-6">
                                                    <h3>Information n°3</h3>
                                                    <label class="control-label" for="img3">Image </label>
                                                    <input class="form-control" type="url" name="img3" id="img3" value="<?= $_Theme_['Main']['theme']['informations']['img3'] ?>" placeholder="Entrer le liens de votre image">


                                                    <label class="control-label" for="img3">Titre </label>
                                                    <input class="form-control" type="text" name="titre3" id="titre3" value="<?= $_Theme_['Main']['theme']['informations']['titre3'] ?>" placeholder="Entrer le titre">

                                                    <label class="control-label" for="desc3">Description </label>
                                                    <textarea class="form-control" name="desc3" id="desc3" placeholder="Entrer la description"><?= $_Theme_['Main']['theme']['informations']['desc3'] ?></textarea>

                                                    <label class="control-label" for="couleurtitre3">Couleur titre </label>
                                                    <input type="color" id="couleurtitre3" name="couleurtitre3" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurtitre3']; ?>">

                                                    <label class="control-label" for="couleurdesc3">Couleur description </label>
                                                    <input type="color" id="couleurdesc3" name="couleurdesc3" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurdesc3']; ?>">

                                                    <label class="control-label" for="couleurback3">Couleur du fond </label>
                                                    <input type="color" id="couleurback3" name="couleurback3" value="<?php echo $_Theme_['Main']['theme']['informations']['couleurback3']; ?>">

                                                </div>

                                            </div>




                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </section>

            </div>

            <div class="card-footer">
                <div class="form-group text-center">
                    <input type="submit" onClick="sendPost('configThemeAdmin'); document.location.reload();" class="btn btn-success" value="Sauvegarder">
                </div>

                <script>
                    initPost("configThemeAdmin", "admin.php?action=configTheme");
                </script>
            </div>

        </div>
    </div>
</div>




<script>
    function createNewReseau() {
        var ico = get('new-s-icone');
        var link = get('new-s-link');
        var msg = get('new-s-message');

        if (isset(ico.value) && ico.value.replace(" ", "") != "" && isset(link.value) && link.value.replace(" ", "") !=
            "" && isset(msg.value) && msg.value.replace(" ", "") != "") {
            var ht =
                '<div class="form-row jumbotron py-1" data-reseau>' +
                '<h5 class="col-12 my-1">Réseau <small> <div class="badge badge-warning">Non sauvegardé si pas cliqué sur sauvegarder !</div></small></h5>' +
                '<div class="col-12">' +
                '<label class="control-label">Icone du réseau</label>' +
                '<input type="text" data-type="icon" class="form-control" id="" placeholder=\'<i class="fab fa-discord"></i>\' value="' +
                ico.value.replace(/"/g, '\'') + '">' +
                '<small>Disponible sur : <a href="https://fontawesome.com/icons/"> https://fontawesome.com/icons/</a></small>' +
                '</div>' +

                '<div class="col-12">' +
                '<label class="control-label">Lien vers le réseau</label>' +
                '<input type="text" id="" class="form-control" data-type="link" value="' + link.value.replace(/"/g, '\'') + '">' +
                '</div>' +

                '<div class="col-12">' +
                '<label class="control-label">Message à mettre à côté</label>' +
                '<input type="text" class="form-control" id="" data-type="message" placeholder="Rejoingnez-nous sur Discord !" value="' +
                msg.value.replace(/"/g, '\'') + '">' +
                '</div>' +

                '<div class="col-4 my-4">' +
                '<button class="btn btn-danger form-control" onclick="this.parentElement.parentElement.parentElement.removeChild(this.parentElement.parentElement); genJsonReseau(); sendPost(\'configThemeAdmin\');">Supprimer</button>' +
                '</div>' +

                '</div>'

            get('all-reseau').insertAdjacentHTML("beforeend", ht);
            ico.value = msg.value = link.value = null
            delete ico;
            delete msg;
            delete value;
        } else {
            notif("warning", "Erreur", "Formulaire incomplet");
        }

    }


    $("#aboutTheme").val((i, v) => v.replace(/\s{2,}/g, ''));
</script>
