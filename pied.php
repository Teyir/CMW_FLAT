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
                    <p><?= $_Theme_['Pied']['about'] ?></p>
                <?php endif; ?>
                <div class="footer-logo">
                    <img src="<?= $_Theme_['Main']['theme']['logo'] ?>" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4 style="color: var(--footer-txt)">Si tu as une idée hésite pas</h4>
                <div class="footer-address">

                    <span>1</span>
                    <span>2</span>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4 style="color: var(--footer-txt)">Liens utiles</h4>
                <ul>
                    <?php

                        if ($_Theme_['Pied']['link1'] == null){

                        } else{
                            ?><li><a href="<?= $_Theme_['Pied']['link1'] ?>">
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
                        ?><li><a href="<?= $_Theme_['Pied']['link2'] ?>">
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
                        ?><li><a href="<?= $_Theme_['Pied']['link3'] ?>">
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
                        ?><li><a href="<?= $_Theme_['Pied']['link4'] ?>">
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
                        ?><li><a href="<?= $_Theme_['Pied']['link5'] ?>">
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
                        ?><li><a href="<?= $_Theme_['Pied']['link6'] ?>">
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
                        ?><li><a href="<?= $_Theme_['Pied']['link7'] ?>">
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
                <h4 style="color: var(--footer-txt)">5 derniers inscrits site</h4>

                <!-- SOON -->


            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                © Tous droits réservés <strong><?= $_Serveur_['General']['name']; ?></strong> </p>
            <p>
                Thème créé with <i class="fa fa-heart" aria-hidden="true" style="color: #d61d4c"></i> par <a href="https://teyir.fr" target="_blank">Teyir </a> pour <small><a href="https://craftmywebsite.fr" target="_blank">CraftMyWebsite.fr</a>#<?= $versioncms; ?></small>
            </p>

        </div>
    </div>
</footer>