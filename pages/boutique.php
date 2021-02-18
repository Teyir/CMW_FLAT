<?php
require_once "theme/Flat/header.php";
?>

<section id="Shop">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <!-- Catégories -->
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white mb-0">Catégories :</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <?php if (isset($categories)) : ?>
                                <!-- Affichage noms catégories -->
                                <?php for ($j = 0; $j < count($categories); $j++) : ?>
                                    <li class="nav-item<?= ($j == 0) ? ' active' : '' ?>">
                                        <a href="#categorie-<?= $j ?>" class="nav-link<?= ($j == 0) ? ' active' : '' ?>" data-toggle="tab">
                                            <i class="fas fa-angle-double-right"></i> <?= $categories[$j]['titre']; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            <?php else : ?>
                                <li class="nav-item active">
                                    <a href="javascript:void(0)" class="nav-link">
                                        <i class="fas fa-exclamation-triangle"></i> Aucune catégorie
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Offres -->
            <div class="col-md-12 col-lg-6 col-sm-12 mb-5">
                <?php if (isset($categories)) : ?>
                    <div class="offres tab-content">
                        <!-- Affichage de la catégorie -->
                        <?php for ($j = 0; $j < count($categories); $j++) : ?>
                            <div id="categorie-<?= $j ?>" class="tab-pane fade <?= ($j == 0) ? ' in active show' : ''; ?>" aria-expanded="<?= ($j == 0) ? 'true' : 'false' ?>">
                                <?php if (!empty($categories[$j]['message'])) : ?>
                                    <div class="card rounded mb-3">
                                        <div class="card-body pb-0 text-center">
                                            <?= $categories[$j]['message']; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <!-- Affichage des offres -->
                                    <?php foreach ($categories as $key => $value) {
                                        $categories[$key]['offres'] = 0;
                                    }
                                    if(isset($offresTableau) && !empty($offresTableau)) : for ($i = 1; $i <= count($offresTableau); $i++) :
                                        if ($offresTableau[$i]['categorie'] == $categories[$j]['id']) :
                                            $categories[$j]['showNumber'] = ($categories[$j]['showNumber'] == 0) ? 1 : $categories[$j]['showNumber']; ?>
                                            <div class="col-md-4" style="margin-top: 15px">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center">
                                                        <h4 style="color: var(--main-color)"><?= (($offresTableau[$i]['nbre_vente'] == 0) ? "<s>" . $offresTableau[$i]['nom'] . "</s>" : $offresTableau[$i]['nom']); ?></h4>
                                                        <br /><small>
                                                            <?php
                                                            if ($offresTableau[$i]['nbre_vente'] == 0) {
                                                                echo "vide";
                                                            } else {
                                                                echo ($offresTableau[$i]['nbre_vente'] == -1) ? '<h6 style="color: red">Stock Non limité</h6>' : '<h6 style="color: red">Stock : </h6>' . $offresTableau[$i]['nbre_vente'];
                                                            }
                                                            ?>
                                                        </small>
                                                    </div>
                                                    <div class="card-body">
                                                        <?= htmlspecialchars_decode($offresTableau[$i]['description']) ?>
                                                    </div>
                                                    <div class="card-footer text-center card_footer_shop">
                                                        <?php if (Permission::getInstance()->verifPerm("connect")) : ?>
                                                            <?php if (isset($offresTableau[$i]['buy'])) { ?>
                                                                <a href="#" class="btn btn-primary disabled" disabled>Vous devez d'abord acheter: <?php foreach($offresTableau[$i]['buy'] as $value) { echo $offresByGet[$value]; } ?></a>
                                                            <?php } else if (isset($offresTableau[$i]['maxbuy'])) { ?>
                                                                <a href="#" class="btn btn-primary disabled" disabled>Vous avez dépassé le nombre d'achat maximum de cette offre</a>
                                                            <?php } else if ($offresTableau[$i]['nbre_vente'] == 0) { ?>
                                                                <a href="#" class="btn btn-primary disabled" disabled>Rupture de stock</a>
                                                            <?php } else { ?>
                                                                <a href="?action=addOffrePanier&offre=<?= $offresTableau[$i]['id'] ?>&quantite=1" class="btn btn-primary btn-block btn-sm mb-2 btn_shop">
                                                                    <i class="fa fa-cart-arrow-down"></i> <br>Ajouter au panier
                                                                </a>
                                                            <?php } ?>
                                                        <?php else : ?>
                                                            <a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-primary mb-2 btn-sm rounded">
                                                                <span class="fas fa-sign-in-alt"></span> Se connecter
                                                            </a>
                                                        <?php endif; ?>
                                                        <button class="btn btn-primary btn-block btn-sm">Prix : <?= ($offresTableau[$i]['prix'] == '0' ? 'gratuit' : $offresTableau[$i]['prix']) ?> <i class="fas fa-gem"></i></button>
                                                    </div>
                                                    <?php $categories[$j]['offres']++; ?>
                                                </div>
                                            </div>

                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <?php endif; ?>
                                </div>

                                <?php if ($categories[$j]['offres'] == 0) : ?>
                                    <!-- Aucune offre disponible -->
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle"></i> Aucune offre disponible dans : <?= $categories[$j]['titre'] ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endfor; ?>
                    </div>
                <?php else : ?>
                    <!-- Aucune Catégorie disponible -->
                    <div class="alert alert-info text-center"><i class="fas fa-info-circle"></i> Aucune catégorie n'a été créée</div>
                <?php endif; ?>
            </div>

            <!-- Compte -->
            <div class="col-md-12 col-lg-3 col-sm-12 mb-3">
                <!-- Affichage du compte -->
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white mb-0">Mes infos</h4>
                    </div>
                    <div class="card-body player-shop">
                        <?php if (Permission::getInstance()->verifPerm("connect")) : ?>
                            <!-- Affichage nom, panier, crédits -->
                            <div class="player-shop-person h5 mb-2">
                                Bonjour <?= $_Joueur_['pseudo']; ?>,
                            </div>
                            <p>Crédits : <?= $_Joueur_['tokens']; ?> <i class="fas fa-coins"></i></p>
                            <a href="<?= $_Panier_->compterArticle() > 0 ? '?page=panier' : '#' ?>" class="btn btn-primary btn-block btn-sm rounded">
                                Panier : <?= $_Panier_->compterArticle() . ($_Panier_->compterArticle() > 1 ? ' articles' : ' article') ?>
                            </a>
                        <?php else : ?>
                        <div class="player-shop-person h5 mb-2">
                            Bonjour Visiteur,
                        </div>
                        <div class="categorie-content">
                            <div class="categorie-item text-justify">
                                <small>Connectez-vous pour accéder à la boutique</small>
                                <div class="categorie-item">
                                    <a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Connexion</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
</section>

