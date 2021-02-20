<?php
    require_once "theme/Flat/header.php";
?>


<section id="support">
    <div class="container">
        <div class="jumbotron">
            <p class="lead" style="color: #222121">Bienvenue sur le support, vous retrouverez ici tous les tickets ouverts, vous pouvez vous-même en ouvrir un si vous avez souci, ou une question.</p>
            <hr class="my-4" style="max-width: 100%">
            <p style="color: #222121">Une fois que votre ticket a été ouvert, vous pouvez aussi le fermer, ou y répondre en y apportant de plus amples informations.</p>
            <?php if (!Permission::getInstance()->verifPerm("connect")) : ?>

                <a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt"></i> Se connecter pour ouvrir un ticket
                </a>
            <?php else : ?>

                <button data-toggle="collapse" href="#openticket" role="button" aria-expanded="false" aria-controls="openticket" class="btn btn-primary btn-block">
                    <i class="fas fa-pen-square"></i> Ouvrir un ticket
                </button>

                <div class="collapse" id="openticket">
                    <div class="card">
                        <form action="index.php?action=post_ticket" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="titre_ticket"><i class="fas fa-heading"></i> Sujet</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="titre_ticket" class="form-control custom-text-input" name="titre" placeholder="Sujet">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="vu_ticket"><i class="fas fa-eye"></i> Visibilité</label>
                                            <?php
                                            if (!isset($_Serveur_["support"]["visibilite"]) || $_Serveur_["support"]["visibilite"] == "both") : ?>
                                                <select class="form-control custom-text-input" id="vu_ticket" name="ticketDisplay">
                                                    <option value="0">Publique</option>
                                                    <option value="1">Privée</option>
                                                </select>
                                            <?php else : ?>
                                                <select class="form-control custom-text-input" id="vu_ticket" name="ticketDisplay">
                                                    <?php if ($_Serveur_["support"]["visibilite"] == "prive") : ?>
                                                        <option value="1">Privée</option>
                                                    <?php else : ?>
                                                        <option value="0">Publique</option>
                                                    <?php endif; ?>
                                                </select>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">

                                    <label for="message_ticket"><i class="fas fa-feather"></i> Description détaillée</label>
                                    <textarea data-UUID="0007" id="ckeditor" name="message" style="height: 275px; margin: 0px; width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-block rounded"><i class="fas fa-paper-plane"></i> Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endif; ?>
        </div>






        <!-- Afficher les tickets  -->
        <div style="display:inline-block;">
            <h4>Tickets créés </h4>
            <hr class="my-6"  style="max-width: 65px"/>
        </div>

        <table class="table table-hover table-responsive mb-0 mt-4">
            <thead>
            <tr>
                <?php if (Permission::getInstance()->verifPerm('PermsDefault', 'support', 'displayTicket')) : ?>
                    <th scope="row" class="support_txt"><i class="fas fa-eye"></i> Visibilité</th>
                <?php endif; ?>
                <th scope="col" class="support_txt"><i class="fas fa-user"></i> Pseudo</th>
                <th scope="col" class="support_txt"><i class="fas fa-heading"></i> Titre</th>
                <th scope="col" class="support_txt"><i class="fas fa-calendar"></i> Date</th>
                <th scope="col" class="support_txt"><i class="fas fa-tools"></i> Action</th>
                <th scope="col" class="support_txt"><i class="fas fa-lightbulb"></i> Statut</th>
                <?php if (Permission::getInstance()->verifPerm('PermsDefault', 'support', 'closeTicket')) : ?>
                    <th scope="col" class="support_txt"><i class="fas fa-edit"></i> Modification</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $j = 0;
            while ($tickets = $ticketReq->fetch(PDO::FETCH_ASSOC)) : ?>

            <!-- Listing des tickets -->
            <tr class="no-hover">
                <?php if ($tickets['ticketDisplay'] == 0 or $tickets['auteur'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm('PermsDefault', 'support', 'displayTicket')) :
                    if (Permission::getInstance()->verifPerm('PermsDefault', 'support', 'displayTicket')) : ?>
                        <th scope="row" class="text-center align-middle">
                            <?php if ($tickets['ticketDisplay'] == "0") : ?>

                                <i data-toggle="tooltip" data-html="true" title="Ce ticket est <u>public</u>" class="fas fa-eye"></i>
                            <?php else : ?>
                                <i data-toggle="tooltip" data-html="true" title="Ce ticket est <u>privé</u>" class="fas fa-eye-slashed"></i>
                            <?php endif; ?>
                        </th>
                    <?php endif; ?>

                    <td class="align-middle">
                        <a href="index.php?&page=profil&profil=<?= $tickets['auteur'] ?>">
                            <img class="icon-player-topbar" src="<?= $_ImgProfil_->getUrlHeadByPseudo($tickets['auteur'], 32) ?>" style="width: 18px; height: 18px" />
                            <?= $tickets['auteur'] ?>
                        </a>
                    </td>

                    <td class="align-middle">
                        <?= $tickets['titre'] ?>​
                    </td>

                    <td class="align-middle"><?php echo $_Forum_->conversionDate($tickets['date_post']); ?>
                    </td>

                    <td class="align-middle">
                        <a class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#slide-<?= $tickets['id']; ?>" data-dismiss="modal" style="color: white">
                            <i class="fa fa-eye"></i> Ouvrir
                        </a>
                    </td>

                    <td class="align-middle">
                        <?php
                        $ticketstatus = $tickets['etat'];
                        if ($ticketstatus == "1") : ?>
                            <span class="badge badge-pill badge-warning">
                            <i class="fas fa-check"></i> Résolu
                        </span>
                        <?php else : ?>
                            <span class="badge badge-pill badge-warning">
                            <i class="fas fa-close"></i> Non Résolu
                        </span>
                        <?php endif; ?>
                    </td>

                    <?php if (Permission::getInstance()->verifPerm('PermsDefault', 'support', 'closeTicket')) : ?>
                    <td class="text-center align-middle">
                        <form class="form-horizontal default-form" method="post" action="?&action=ticketEtat&id=<?= $tickets['id']; ?>">
                            <?php if ($tickets['etat'] == 0) : ?>
                                <button type="submit" name="etat" class="btn btn-primary btn-sm rounded" value="1">
                                    Fermer le ticket
                                </button>
                            <?php else : ?>
                                <button type="submit" name="etat" class="btn btn-primary btn-sm rounded" value="0">
                                    Ouvrir le ticket
                                </button>
                            <?php endif; ?>
                        </form>
                    </td>
                <?php endif;
                endif; ?>
            </tr>


            <!-- Système de ticket support -->

            <?php if ($tickets['ticketDisplay'] == "0" or $tickets['auteur'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm('PermsDefault', 'support', 'displayTicket')) :
            $ticketstatus = $tickets['etat'];

            unset($message);
            $message = $tickets['message'];

            $commentaires = 0; ?>

            <div class="modal fade" id="slide-<?= $tickets['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="slide-<?= $tickets['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close mr-3 ml-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: var(--base-color);">&times;</span>
                            </button>
                            <h5 class="modal-title text-white mr-auto">
                                Support : <?= $tickets['titre']; ?>

                                <?php if ($ticketstatus == 1) : ?>
                                    <div class="ribbon-wrapper ">
                                        <div class="ribbon bg-primary">Résolu !</div>
                                    </div>
                                <?php endif; ?>
                            </h5>

                        </div>


                        <!-- Message d'aide -->
                        <div class="modal-body">

                            <div class="media">
                                <p class="username">
                                    <img class="mr-3" src="<?= $_ImgProfil_->getUrlHeadByPseudo($tickets['auteur'], 32); ?>" style="width: 32px; height: 32px;" alt="Avatar de <?= $tickets['auteur'] ?>" />
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-2 font-weight-bold">
                                            <?= $tickets['auteur']; ?> | le <?= $_Forum_->conversionDate($tickets['date_post']); ?>
                                        </h6>
                                        <?= $message; ?>


                                        <hr class="bg-primary w-100">

                                        <!-- Commentaires -->
                                        <?php if (isset($ticketCommentaires[$tickets['id']])) :

                                        for ($i = 0; $i < count($ticketCommentaires[$tickets['id']]); $i++) :

                                        unset($message);
                                        $message = $ticketCommentaires[$tickets['id']][$i]['message'];
                                        ?>


                                        <div class="media mt-4">
                                <p class="username">
                                    <img class="mr-3" src="<?= $_ImgProfil_->getUrlHeadByPseudo($ticketCommentaires[$tickets['id']][$i]['auteur'], 32); ?>" style="width:32px; height:32px;" alt="Avatar de <?= $ticketCommentaires[$tickets['id']][$i]['auteur'] ?>" />
                                <div class="media-body">
                                    <h6 class="mt-0 mb-2 font-weight-bold">
                                        <?= $ticketCommentaires[$tickets['id']][$i]['auteur']; ?> | le <?= $_Forum_->conversionDate($ticketCommentaires[$tickets['id']][$i]['date_post']); ?>
                                    </h6>
                                    <div id="contenueCom<?= $tickets['id'] ?>-<?= $ticketCommentaires[$tickets['id']][$i]['id'] ?>" style="margin-bottom:10px;"><?= $message; ?></div>

                                    <!-- Actions possible sur les commentaires -->
                                    <?php if ((isset($_Joueur_))  &&  (($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] || Permission::getInstance()->verifPerm('PermsDefault', 'support', 'deleteMemberComm')) || ($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] || Permission::getInstance()->verifPerm('PermsDefault', 'support', 'editMemberComm')))) : ?>

                                        <div class="dropdown">
                                            <a class="btn btn-primary no-hover float-right" data-toggle="dropdown">Action <b class="caret"></b></a>
                                            <ul class="dropdown-menu">

                                                <?php if ($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm('PermsDefault', 'support', 'deleteMemberComm')) : ?>

                                                    <li>
                                                        <a href="?&action=delete_support_commentaire&id_comm=<?= $ticketCommentaires[$tickets['id']][$i]['id'] ?>&id_ticket=<?= $tickets['id'] ?>&auteur=<?= $ticketCommentaires[$tickets['id']][$i]['auteur'] ?>" class="dropdown-item">
                                                            Supprimer
                                                        </a>
                                                    </li>

                                                <?php endif; ?>

                                                <?php if ($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm('PermsDefault', 'support', 'editMemberComm')) : ?>
                                                    <li>
                                                        <a href="#editComm-<?= $ticketCommentaires[$tickets['id']][$i]['id'] ?>" data-toggle="modal" data-target="#editComm-<?= $ticketCommentaires[$tickets['id']][$i]['id'] ?>" class="dropdown-item" data-dismiss="modal">Editer</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                    <?php endif; if($tickets['etat'] == "0") { ?>
                                        <button type="button" onclick="addBlockQuote('ckeditorCom<?= $tickets['id'] ?>','contenueCom<?= $tickets['id'] ?>-<?= $ticketCommentaires[$tickets['id']][$i]['id'] ?>', '<?= $ticketCommentaires[$tickets['id']][$i]['auteur']; ?>');" class="btn btn-dark float-right mb-5" style="margin-right:15px;">Citer !</button>
                                    <?php } ?>
                                </div>
                                </p>
                            </div>




                            <?php endfor; ?>
                            <?php endif; ?>


                        </div>
                        </p>
                    </div>


                </div>

                <div class="modal-footer">

                    <!-- Envoi d'un commentaire -->
                    <?php if ($tickets['etat'] == "0") : ?>

                        <form action="?&action=post_ticket_commentaire" method="post">
                            <input type="hidden" name="id" value="<?= $tickets['id'] ?>" />
                            <div style="width:100%;" class="cksupportshow">

                                <textarea name="message" class="supportcomment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 w-100">Commenter</button>
                        </form>

                    <?php else : ?>

                        <div class="alert alert-info">
                            <div class="text-center">Ticket résolu ! Merci de contacter un administrateur pour réouvrir votre ticket.</div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
    </div>
    </div>

    <?php endif; ?>

    <!-- Edition d'un commentaire -->

    <?php if (isset($ticketCommentaires[$tickets['id']][$i]['auteur']) && $ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm('PermsDefault', 'support', 'editMemberComm')) :
        if (!empty($ticketCommentaires[$tickets['id']])) :
            for ($i = 0; $i < count($ticketCommentaires[$tickets['id']]); $i++) : ?>

                <div class="modal fade" id="editComm-<?= $ticketCommentaires[$tickets['id']][$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editComm">
                    <form method="POST" action="?&action=edit_support_commentaire&id_comm=<?= $ticketCommentaires[$tickets['id']][$i]['id']; ?>&id_ticket=<?= $tickets['id']; ?>&auteur=<?= $ticketCommentaires[$tickets['id']][$i]['auteur']; ?>">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content border-0">

                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-white">Édition du commentaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" style="color: var(--base-color);">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="col-lg-12 text-center">


                                        <div class="row mt-4">
                                            <div style="width:100%;">
                                                <textarea data-UUID="0015" name="editMessage" class="form-control custom-text-input" style="height: 275px; ">
                                                                        <?= $ticketCommentaires[$tickets['id']][$i]['message']; ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="col-lg-12 text-center">
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary w-100">Valider !</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            <?php endfor; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php $j++;
    endwhile; ?>
    </tbody>
    </table>
    </div>
</section>
