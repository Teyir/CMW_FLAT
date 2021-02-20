<?php
$_Theme_ = new Lire('theme/' . $_Serveur_['General']['theme'] . "/config/config.yml");
$_Theme_ = $_Theme_->GetTableau();
?>
<footer id="Footer" class="footer-area" style="background-color: var(--footer-bg)">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <?php if(isset($_Theme_['Pied']['about']) && !empty(trim($_Theme_['Pied']['about']))) : ?>
                    <h4 style="color: var(--footer-txt)">À propos</h4>
                    <p style="color: var(--footer-txt)"><?= $_Theme_['Pied']['about'] ?></p>
                <?php endif; ?>
                <div class="footer-logo">
                    <img class="footer_logo" src="<?= $_Theme_['Main']['theme']['logo'] ?>" alt="Logo <?= $_Serveur_['General']['name']; ?>">
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4 style="color: var(--footer-txt)">5 Derniers votes</h4>
                <div class="footer-address">


                    <!-- GESTION DES DERNIERS VOTES-->
                    <?php require_once "theme/Flat/assets/php/footer_votes.php" ?>

                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4 style="color: var(--footer-txt)">Liens utiles</h4>
                <ul>
                    <?php

                        if ($_Theme_['Pied']['link1'] == null){

                        } else{
                            ?><li><a href="<?= $_Theme_['Pied']['link1'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                             <?php
                                if ($_Theme_['Pied']['linktxt1'] == null){
                                    echo "Liens 1";
                                }else{
                                    echo $_Theme_['Pied']['linktxt1'];
                                }
                             ?>
                            </a></li><?php
                        }

                    if ($_Theme_['Pied']['link2'] == null){

                    } else{
                        ?><li><a href="<?= $_Theme_['Pied']['link2'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                            <?php
                            if ($_Theme_['Pied']['linktxt2'] == null){
                                echo "Liens 2";
                            }else{
                                echo $_Theme_['Pied']['linktxt2'];
                            }
                            ?>
                        </a></li><?php
                    }


                    if ($_Theme_['Pied']['link3'] == null){

                    } else{
                        ?><li><a href="<?= $_Theme_['Pied']['link3'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                            <?php
                            if ($_Theme_['Pied']['linktxt3'] == null){
                                echo "Liens 3";
                            }else{
                                echo $_Theme_['Pied']['linktxt3'];
                            }
                            ?>
                        </a></li><?php
                    }

                    if ($_Theme_['Pied']['link4'] == null){

                    } else{
                        ?><li><a href="<?= $_Theme_['Pied']['link4'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                            <?php
                            if ($_Theme_['Pied']['linktxt4'] == null){
                                echo "Liens 4";
                            }else{
                                echo $_Theme_['Pied']['linktxt4'];
                            }
                            ?>
                        </a></li><?php
                    }


                    if ($_Theme_['Pied']['link5'] == null){

                    } else{
                        ?><li><a href="<?= $_Theme_['Pied']['link5'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                            <?php
                            if ($_Theme_['Pied']['linktxt5'] == null){
                                echo "Liens 5";
                            }else{
                                echo $_Theme_['Pied']['linktxt5'];
                            }
                            ?>
                        </a></li><?php
                    }

                    if ($_Theme_['Pied']['link6'] == null){

                    } else{
                        ?><li><a href="<?= $_Theme_['Pied']['link6'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                            <?php
                            if ($_Theme_['Pied']['linktxt6'] == null){
                                echo "Liens 6";
                            }else{
                                echo $_Theme_['Pied']['linktxt6'];
                            }
                            ?>
                        </a></li><?php
                    }


                    if ($_Theme_['Pied']['link7'] == null){

                    } else{
                        ?><li><a href="<?= $_Theme_['Pied']['link7'] ?>" style="color: var(--footer-txt)" onmouseover="this.style.color='var(--active-color)';" onmouseout="this.style.color='var(--footer-txt)';">
                            <?php
                            if ($_Theme_['Pied']['linktxt7'] == null){
                                echo "Liens 7";
                            }else{
                                echo $_Theme_['Pied']['linktxt7'];
                            }
                            ?>
                        </a></li><?php
                    }





                    ?>



                </ul>
            </div>

            <div class="col-lg-3 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                <h4 style="color: var(--footer-txt)">3 derniers inscrits site</h4>

                <!-- GESTION DES DERNIERS INSCRITS-->
                <?php require_once "theme/Flat/assets/php/footer_insc.php" ?>

            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">


            <p class="footer-text m-0 col-lg-8 col-md-12">
                © Tous droits réservés <strong class="copyright-srvname"><?= $_Serveur_['General']['name']; ?></strong> </p>
            <p>
                Thème créé with <i class="fa fa-heart" aria-hidden="true" style="color: #d61d4c"></i> par <a href="https://teyir.fr" class="Blazing fire" target="_blank" style="color: whitesmoke">Teyir </a> pour <small><a href="https://craftmywebsite.fr" target="_blank">CraftMyWebsite.fr</a>#<?= $versioncms; ?></small>
            </p>

        </div>
    </div>
</footer>