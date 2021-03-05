<?php
require_once "theme/Flat/header.php";
?>

<section id="Errors">
    <div class="container-fluid col-md-9 col-lg-9 col-sm-10" style="margin-top: 50px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-9 col-lg-7 col-sm-12 mx-auto my-3">
                <!-- Affichage de l'erreur -->
                <div class="card">

                    <div class="card-header text-center">
                        <h4>
                            <i class="fas fa-exclamation-triangle"></i> <?= $titre; ?>
                        </h4>
                        <h6 class="card-subtitle">
                            <?= $type; ?>
                        </h6>
                    </div>

                    <div class="card-body text-center">
                        <p class="card-text">
                            <?= $contenue; ?>
                            <img src="theme/Flat/assets/img/error.gif" style="margin-top: 25px">
                        </p>
                    </div>

                    <div class="card-footer">
                        <a href="index.php" class="card-link btn btn-main w-100"><i class="fas fa-home"></i> Retourner à l'accueil</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>