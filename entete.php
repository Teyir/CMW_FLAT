<header class="header_area">
    <div class="main_menu">
        <?php if(!isset($maintenanceOn) || Permission::getInstance()->verifPerm("PermsPanel", "maintenance", "actions", "connexionAdmin"))
        { ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Navigation BURGER -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <!-- NAVBAR -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">




                        <?php
                        for ($i = 0; $i < count($_Menu_['MenuTexte']); $i++) :
                        // Affichage des dropdowns
                        if (isset($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]])) :
                        ?>
                        <li class="nav-item submenu dropdown">
                            <a href="#" id="Listdefil<?php echo $i; ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_Menu_['MenuTexte'][$i]; ?></a>
                            <ul class="dropdown-menu" aria-labelledby="Listdefil<?php echo $i; ?>">
                                <?php

                                for ($k = 0; $k < count($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]); $k++) :

                                if ($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == '-divider-') : ?>

                                <div class="dropdown-divider"></div>

                                <?php else : ?>

                                <li class="nav-item"><a href="<?= $_Menu_['MenuListeDeroulanteLien'][$_Menu_['MenuTexteBB'][$i]][$k] ?>" class="nav-link"><?= $_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] ?></a></li>

                                <?php endif; ?>
                                <?php endfor; ?>
                            </ul>
                        </li>


                        <?php else :
                            // Gestion de l'active, pour la page actuelle
                            $quellePage = str_replace('index.php?&page=', '', $_Menu_['MenuLien'][$i]);
                            $quellePage1 = str_replace('?&page=', '', $_Menu_['MenuLien'][$i]);
                            $quellePage2 = str_replace('?page=', '', $_Menu_['MenuLien'][$i]);

                            if (isset($_GET['page']) and ($quellePage == $_GET['page'] or $quellePage1 == $_GET['page'] or $quellePage2 == $_GET['page'])) {
                                $active = ' active';
                            } elseif (!isset($_GET['page']) and $i == 0) {
                                $active = ' active';
                            } else {
                                $active = '';
                            } ?>

                            <li class="nav-item<?= $active ?>">
                                <a href="<?= $_Menu_['MenuLien'][$i] ?>" class="nav-link"><?= $_Menu_['MenuTexte'][$i] ?></a>
                            </li>
                        <?php endif;
                        endfor; ?>


                    </ul>
                </div>


                <div class="right-button">
                    <ul>
                    <!-- Navigation Right, s'affiche seulement si l'utilisateur n'est pas banni -->
                    <?php if ($banned == false) : ?>
                        <?php if (Permission::getInstance()->verifPerm("connect")) : //Si nous avons un joueur connecté
                            $Img = new ImgProfil($_Joueur_['id']); ?>
                            <li class="nav-item dropdown ml-auto">

                                <a id="profil-<?= $_Joueur_['pseudo']; ?>" class="nav-link dropdown-toggle btn btn-main" href="#" id="dropdown-tools" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= $_ImgProfil_->getUrlHeadByPseudo($_Joueur_['pseudo'], 24); ?>" style="margin-left: -10px; width: 24px; height: 24px"> <?= $_Joueur_['pseudo']; ?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="profil-<?= $_Joueur_['pseudo']; ?>">

                                    <?php if (Permission::getInstance()->verifPerm('PermsPanel', 'access')) : ?>
                                        <!-- Administration -->
                                        <a href="admin.php" class="dropdown-item text-success"><i class="fas fa-tachometer-alt"></i> Administration</a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>

                                    <a class="dropdown-item" style="color: var(--base-color)" href="?page=profil&profil=<?= $_Joueur_['pseudo']; ?>"><i class="fas fa-user"></i> Mon profil</a>
                                    <div class="dropdown-divider"></div>

                                    <?php if (Permission::getInstance()->verifPerm('PermsForum', 'moderation', 'seeSignalement')) :
                                        $req_report = $bddConnection->query('SELECT id FROM cmw_forum_report WHERE vu = 0');
                                        $signalement = $req_report->rowCount(); ?>
                                        <!-- Signalements -->
                                        <a href="?page=signalement" class="dropdown-item text-warning"><i class="fa fa-bell"></i> Signalement <span class="badge badge-pill badge-warning" id="signalement"><?= $signalement ?></span></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item txt-dropdown-profil" style="color: var(--base-color)" href="?page=alert" ><i class="fa fa-bell"></i> Alertes : <span class="badge badge-pill badge-primary" id="alerts"><?= $alerte; ?></span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?page=token" style="color: var(--base-color)"></i> Mon solde : <?php if (isset($_Joueur_['tokens'])) echo $_Joueur_['tokens']; ?> <i class="fas fa-gem"></i></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="?action=deco"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>

                                </div>
                            </li>

                        <?php else : //Si nous avons un invité
                            ?>
                            <li class="nav-item dropdown ml-auto">
                                <a class="nav-link dropdown-toggle btn btn-main" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i> Compte
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item hvr-forward" href="#" data-toggle="modal" data-target="#InscriptionSlide"><i class="fa fa-user-plus"></i> Inscription</a>
                                    <a class="dropdown-item hvr-forward" href="#" data-toggle="modal" data-target="#ConnectionSlide"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endif;
                    } ?>
                    </ul>
                </div>


            </div>
        </nav>
    </div>
</header>
