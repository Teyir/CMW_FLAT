<?php

require_once "theme/Flat/header.php";

?>

<section id="vote">
    <div class="container">
        <!-- Alerts -->
        <div class="mb-3">
            <?php if (isset($_GET['success'])) :
                if ($_GET['success'] != 'recupTemp') : ?>
                    <div class="alert alert-success alert-dismissible fade show text-shadow-none" role="alert">
                        Votre récompense arrive, si vous n'avez pas vu de fenêtre s'ouvrir pour voter, la fenêtre à dû s'ouvrir derrière votre navigateur, validez le vote et <strong class="important--text">profitez de votre récompense In-Game</strong> !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php else : ?>
                    <div class="alert alert-success alert-dismissible fade show text-shadow-none" role="alert">
                        La récompense séléctionnée arrive, <strong class="important--text">Profitez de cette dernière In-Game ! </strong>
                        Votre(vos) récompense(s) arrive(nt), profitez de votre(vos) récompense(s) In-Game !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif;
            endif; ?>
        </div>
        <!-- Gestion des informations de vote -->
        <div>
            <?php
            if (Permission::getInstance()->verifPerm("connect") and isset($_GET['player']) and $_Joueur_['pseudo'] == $_GET['player']) {  ?>
                <!-- Gestion des Récompenses -->
                <div class="alert alert-main w-80 mx-auto" id="disprecompList" style="display:none;">

                    <h4 class="alert-heading h4">
                        Réception de récompense(s) !
                    </h4>
                    <hr>

                    <ul id="recompList" class="list-unstyled container">
                    </ul>

                </div>
            <?php } ?>
        </div>
        <div class="row">
            <?php if (!isset($_GET['player'])) { ?>

                <!-- Demande du Pseudonyme -->
                <div class="col-12 p-0">
                    <div class="card text-white bg-primary mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Entrez votre pseudonyme <strong><?= $_Serveur_['General']['name']; ?></strong></h4>
                        </div>
                        <div class="card-body">
                            <form id="forme-vote" role="form" method="GET" action="index.php">
                                <div class="input-group">
                                    <input type="text" style="display:none;" name="page" value="voter">
                                    <input type="text" id="vote-pseudo" class="form-control" name="player" placeholder="Pseudo" value="<?= (Permission::getInstance()->verifPerm("connect")) ? $_Joueur_['pseudo'] : '' ?>" required>
                                    <div class="input-group-append">
                                        <button class="form-control btn btn-secondary" style="font-size:0.9rem;" type="submit">Suivant <i class="fas fa-angle-double-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } else { ?>

                <!-- Affichage des serveurs de jeu -->
                <div class="col-md-12 col-lg-3 col-sm-12 mb-3">
                    <!-- Serveurs -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Serveurs</h4>
                        </div>
                        <div class="card-body">
                            <ul class="categorie-content nav flex-column">
                                <!-- Affichage noms Serveurs -->
                                <?php if(count($lectureJSON) == 0) { ?>

                                    <p>Veuillez relier votre serveur à votre site avec JsonAPI depuis le panel pour avoir les liens de vote !</p>

                                <?php } else { ?>

                                    <?php $first = true; foreach($lectureJSON as $serveur) { ?>

                                        <li class="nav-item categorie-item<?= ($i == 0) ? ' active' : '' ?>">
                                            <a href="#voter-<?= $serveur['id']; ?>" data-toggle="tab" class="categorie-link nav-link<?= ($first) ? ' active' : '' ?>">
                                                <i class="fas fa-angle-double-right"></i> <?= $serveur['nom']; ?>
                                            </a>
                                        </li>
                                        <?php $first = false; } } ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php
            require_once("modele/vote.class.php");
            $pseudo = htmlspecialchars($_GET['player']); ?>
                <div class="col-md-12 col-lg-6 col-sm-12 mb-5">
                    <!-- Affichage des sites de vote -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Voter pour <?= $_Serveur_['General']['name']; ?></h4>
                        </div>
                        <div class="card-body">


                            <div class="tab-content">

                                <?php

                                if(Permission::getInstance()->verifPerm("connect") AND  isset($_GET['player']) AND $_Joueur_['pseudo'] == $_GET['player'] ) {
                                    echo '<script>isConnect = true;</script>';
                                }

                                $first=true; foreach($lectureJSON as $serveur) { ?>

                                    <div id="voter-<?= $serveur['id']; ?>" class="tab-pane fade <?= ($first) ? ' in active show' : ''; ?>" aria-expanded="<?= ($first) ? 'true' : 'false' ?>">
                                        <p><i class="fas fa-info-circle"></i> Vous votez pour : <b><?= $serveur['nom']; ?></b></p>
                                        <hr class="my-4" style="background-color: whitesmoke">
                                        <h5 class="title-vote-listing">
                                            Liste des sites de vote <div class="vote-line"></div>
                                        </h5>
                                        <?php
                                        $req_vote->execute(array('serveur' => $serveur['id']));
                                        while($allvote = $req_vote->fetch(PDO::FETCH_ASSOC)) {
                                            $vote = new vote($bddConnection, $pseudo, $allvote['id']);

                                            ?>

                                            <button type="button" id="votebtn-<?php echo $allvote['id']; ?>" style="margin-bottom: 10px"></button>
                                            <script>
                                                initVoteBouton(document.getElementById('votebtn-<?php echo $allvote['id']; ?>'), '<?php echo $pseudo; ?>', <?php echo $allvote['id']; ?>, <?php echo $vote->getLastVoteTimeMili(); ?>, <?php echo $vote->getTimeVoteTimeMili(); ?>, '<?php echo $vote->getUrl(); ?>', '<?php echo $vote->getTitre(); ?>');

                                            </script>
                                        <?php } ?>
                                    </div>

                                    <?php $first=false; } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    <?php
                    foreach($topRecompense as $key => $value) {
                        echo "topRec.set(".$key.",JSON.parse('".$value."'));";
                    }

                    ?>

                </script>

                <div class="col-md-12 col-lg-3 col-sm-12 mb-5">
                    <!-- Affichage des informations du joueur -->
                    <div class="card">
                        <div class="card-header bg-primary text-white mb-0">
                            <h4 class="card-title mb-0">Informations</h4>
                        </div>
                        <div class="card-body">
                            <h5>Bonjour, <?= $pseudo ?></h5>

                            <h6>Merci d'avance pour votre vote !</h6>

                            <?php  if(isset($dateRec) && $dateRec['valueType'] != 0 && $dateRec['etat'] != 0)
                            {

                                ?><h6> Les votes se rénitialiseront le <?= str_replace(array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'), date('l', $dateRec['etat'])).date(" j \à G\hi", $dateRec['etat']); ?>.</h6>
                            <?php } if(isset($_Serveur_['vote']['oldDisplay'])) {
                                $a = 1; ?>
                                <br />
                                <h6>Liste des précédents meilleurs voteurs:</h6>
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h6>#</h6>
                                        </th>
                                        <th>
                                            <h6>Pseudo</h6>
                                        </th>
                                        <th>
                                            <h6>Votes</h6>
                                        </th>
                                    </tr>
                                    </thead>

                                    <body>
                                    <?php while($oldVote = $oldvote_req->fetch(PDO::FETCH_ASSOC))
                                    { if($a < $_Serveur_['vote']['oldDisplay']) { ?>
                                        <tr>
                                            <td>
                                                <h6><?php echo $a; ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $oldVote['pseudo']; ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $oldVote['nbre_votes']; ?></h6>
                                            </td>
                                        </tr>

                                        <?php $a++; } else { break; } }
                                    ?>
                                    </body>
                                </table>
                            <?php } ?>


                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <!-- Top vote -->
        <!-- Disclaimer -->
        <div style="display:inline-block;">
            <h4 class="vote_title">TOP voteurs <i class="fas fa-award"></i></h4>
        </div>
        <table class="table table-hover " id="baltop">
            <!-- theme/default/assets/js/voteControleur.js::updateBaltop -->
        </table>
    </div>
</section>

