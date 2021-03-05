<?php
//  require_once "/theme/Sublime/stats/players.php"
// Afficher le nombre de membres Discord connectés

$discordID = $_Theme_['Main']['theme']['discord-id'] ;

$discordjson = file_get_contents('https://discordapp.com/api/guilds/' . $discordID . '/embed.json');

$obj = json_decode($discordjson);

$DiscordOnline = $obj->presence_count;


?>
<!-- PARTIE HEADER -->
<div class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay" style="background: url('theme/upload/bg.png');
            no-repeat scroll center center; background-size: cover;"></div>
        <div class="container" >
            <div class="row align-items-center" >

                <div class="col text-center" >
                    <img class="animate__animated animate__pulse animate__slower animate__infinite infinite "
                         src="<?= $_Theme_['Main']['theme']['logo'] ?>" style="height: var(--logoh); width: var(--logol);">

                    <p class="joueurs_header"><strong class="counter" data-to="<?= $playeronline ?>" data-speed="7000"><?= $playeronline ?>
                        </strong> / <?= $maxPlayers; ?> <br>Joueurs en ligne !</p>

                </div>


                <div class="col" >
                    <div class="banner_content" >
                        <h3 class="title_header" style="<?php if ($_Theme_['Main']['theme']['shadowheader'] == null){} else{echo "text-shadow: var(--couleurshadowheader) 3px 0 10px";} ?>"><?= $_Serveur_['General']['name']; ?></h3>
                        <hr/>
                        <h5 class="description_header" style="<?php if ($_Theme_['Main']['theme']['shadowheader'] == null){} else{echo "text-shadow: var(--couleurshadowheader) 3px 0 10px";} ?>"><?= $_Serveur_['General']['description']; ?></h5>

                        <?php if ($_Theme_['Main']['theme']['launcher-mode'] == null){ ?>
                        <div class="svg-wrapper1">
                            <svg height="40" width="220" >
                                <rect id="shape1" height="40" width="220" />
                                <div id="text">
                                    <button onclick="copierIP(); "type="button" ><span class="spot"></span><?= $_Serveur_['General']['ipTexte'] ?></button>
                                    <input type="text" style="position:absolute;top:0;left:0;z-index:-9999;" id="iptexte" value="<?= $_Serveur_['General']['ipTexte']; ?>">
                                </div>
                            </svg>
                        </div>
                        <?php }else{?>
                            <div class="svg-wrapper1">
                                <svg height="40" width="220" >
                                    <rect id="shape1" height="40" width="220" />
                                    <div id="text">
                                        <a href="#launcher" style="color: var(--base-color)"><span class="spot"></span>Télécharger notre launcher</a>
                                    </div>
                                </svg>
                            </div>
                        <?php }?>


                        <div class="svg-wrapper">
                            <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
                                <rect id="shape" height="40" width="150" />
                                <div id="text">
                                    <button onclick="copierDiscord();" type="button"><span class="spot con-tooltip " style="margin-top: 6px" >Discord <span class="tooltip" style="color: whitesmoke">Nous sommes actuellement <strong style="color: white"><?= $DiscordOnline?></strong> membres connectés sur notre Discord !</span></span></button>
                                    <input type="text" style="position:absolute;top:0;left:0;z-index:-9999;" id="CopieDiscord" value="<?= $_Theme_['Main']['theme']['discord-invitation']; ?>">
                                </div>
                            </svg>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- PARTIE INFORMATIONS -->
<section class="service-area area-padding">
    <div class="container">
        <div class="row">
            <!-- INFO 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="single-service  text-center testbg123" data-aos="fade-up" data-aos-delay="150" style="<?php if ($_Theme_['Main']['theme']['informations']['opacitybg'] == null){echo "background-color: var(--couleurback1); border: none;";} else{echo "background-color: transparent; border: none";} ?>">
                    <div class="service-icon" style=" background: url('<?= $_Theme_['Main']['theme']['informations']['img1'] ?>'); background-position: center center; background-repeat: no-repeat">

                    </div>
                    <div class="service-content">
                        <h5 class="info_title" style="color: var(--couleurtitre1);"><?= $_Theme_['Main']['theme']['informations']['titre1'] ?></h5>
                        <p class="info_desc" style="color: var(--couleurdesc1);"><?= $_Theme_['Main']['theme']['informations']['desc1'] ?></p>
                    </div>
                </div>
            </div>

            <!-- INFO 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="single-service text-center" data-aos="fade-up" style="<?php if ($_Theme_['Main']['theme']['informations']['opacitybg'] == null){echo "background-color: var(--couleurback2); border: none;";} else{echo "background-color: transparent; border: none";} ?>">
                    <div class="service-icon" style=" background: url('<?= $_Theme_['Main']['theme']['informations']['img2'] ?>'); background-position: center center; background-repeat: no-repeat">

                    </div>
                    <div class="service-content">
                        <h5 class="info_title" style="color: var(--couleurtitre2);"><?= $_Theme_['Main']['theme']['informations']['titre2'] ?></h5>
                        <p class="info_desc" style="color: var(--couleurdesc2);"><?= $_Theme_['Main']['theme']['informations']['desc2'] ?></p>
                    </div>
                </div>
            </div>


            <!-- INFO 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="single-service text-center" data-aos="fade-up" data-aos-delay="250" style="<?php if ($_Theme_['Main']['theme']['informations']['opacitybg'] == null){echo "background-color: var(--couleurback3); border: none;";} else{echo "background-color: transparent; border: none";} ?>">
                    <div class="service-icon" style=" background: url('<?= $_Theme_['Main']['theme']['informations']['img3'] ?>'); background-position: center center; background-repeat: no-repeat">

                    </div>
                    <div class="service-content">
                        <h5 class="info_title" style="color: var(--couleurtitre3);"><?= $_Theme_['Main']['theme']['informations']['titre3'] ?></h5>
                        <p class="info_desc" style="color: var(--couleurdesc3);"><?= $_Theme_['Main']['theme']['informations']['desc3'] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php if ($_Theme_['Main']['theme']['launcher-mode'] == null){}else{ ?>

<!-- SECTION LAUNCHER -->
<section class="launcher-area area-padding" id="launcher">
    <div class="container" data-aos="zoom-in-up">

        <h1 class="text-center">Notre Launcher</h1>

            <div class="jumbotron" style="background-color: transparent">

                <img class="mx-auto d-block" src="<?= $_Theme_['Main']['theme']['launcher-image'] ?>" style="" alt="Launcher de <?= $_Serveur_['General']['name']; ?>">

                <p class="lead text-center"  style="margin-top: 30px"><?= $_Theme_['Main']['theme']['launcher-description'] ?></p>
                <p class="text-center" style="margin-top: 45px"><a class="btn btn-lg btn-primary" href="<?= $_Theme_['Main']['theme']['launcher-liens']?>" role="button">Télécharger notre launcher !</a></p>

            </div>

    </div>
</section>
<?php }?>

<section id="News">
    <div class="container-fluid col-md-12 col-lg-9 col-sm-10">
        <div class="row">
            <div class="row news-articles col-md-12 col-lg-8 col-sm-12 mx-auto">
                <!-- News Articles -->
                <?php
                if (isset($news) && count($news) > 0) :
                    for ($i = 0; $i < 10; $i++) :
                        if ($i < count($news)) :
                            $getCountCommentaires = $accueilNews->countCommentaires($news[$i]['id']);
                            $countCommentaires = $getCountCommentaires->rowCount();

                            $getcountLikesPlayers = $accueilNews->countLikesPlayers($news[$i]['id']);
                            $countLikesPlayers = $getcountLikesPlayers->rowCount();
                            $namesOfPlayers = $getcountLikesPlayers->fetchAll(PDO::FETCH_ASSOC);

                            $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
                            ?>

                            <article class="col-md-12 col-lg-12 col-sm-12 news-content" data-aos="fade-up">
                                <div class="card">
                                    <div class="card-header d-flex flex-nowrap"<?php if ($_Theme_['Main']['theme']['style-news'] == 2) {echo "style='background-color: var(--secondary-color-bg)'";} elseif ($_Theme_['Main']['theme']['style-news'] == 3){echo "style='background-color: var(--secondary-color-bg)'";} else {}?>>
                                        <h4 style="color: var(--main-color);"><small>#<?= $news[$i]['id'] ?> </small><?= $news[$i]['titre']; ?></h4>
                                        <h6 class="ml-auto"><?= date('d/m/Y', $news[$i]['date']) . " &agrave; " . date('H:i:s', $news[$i]['date']) ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <?= $news[$i]['message']; ?>
                                    </div>
                                    <div class="card-footer d-flex" <?php if ($_Theme_['Main']['theme']['style-news'] == 1) {echo "style='background-color: var(--secondary-color-bg)'";} elseif ($_Theme_['Main']['theme']['style-news'] == 3){echo "style='background-color: var(--secondary-color-bg)'";} else {}?>>
                                        <h3 style="color: var(--base-color);font-size: 17px">Par <a href="?page=profil&profil=<?= $news[$i]['auteur']; ?>"><?= $news[$i]['auteur']; ?></a></h3>
                                        <div class="ml-auto">
                                            <?php
                                            if (Permission::getInstance()->verifPerm("connect")) :
                                                $reqCheckLike = $accueilNews->checkLike($_Joueur_['pseudo'], $news[$i]['id']);
                                                $getCheckLike = $reqCheckLike->fetch(PDO::FETCH_ASSOC);
                                                $checkLike = $getCheckLike['pseudo'];
                                                if ($_Joueur_['pseudo'] == $checkLike) : ?>
                                                    <a href="#" class="h5 mr-3" style="font-size: 15px" data-toggle="modal" data-target="#news<?= $news[$i]['id'] ?>">Commenter (<?= $countCommentaires ?>)</a> <i class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                                <?php else : ?>
                                                    <a href="#" class="h5 mr-3" style="font-size: 15px" data-toggle="modal" data-target="#news<?= $news[$i]['id'] ?>">Commenter (<?= $countCommentaires ?>)</a>
                                                    <a href="?&action=likeNews&id_news=<?= $news[$i]['id'] ?>" style="font-size: 14px" class="h5 mx-3">J'aime</a>
                                                    <i class="fa fa-thumbs-up" style="font-size: 15px"></i> <?= $countLikesPlayers ?>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <a href="#" class="h5 mr-3" data-toggle="modal" style="font-size: 15px" data-target="#news<?= $news[$i]['id'] ?>">Commenter (<?= $countCommentaires ?>)</a> <i class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Commentaires -->

                            </article>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php else : ?>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="alert alert-warning">
                            <p class="text-center">Aucune news n'a été créée à ce jour...</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- MINIATURES + WIDGETS -->
            <div class="row info-articles col-md-12 col-lg-4 col-sm-12 mx-auto">

            <?php if ($_Theme_['Main']['theme']['discord-widget'] == null){} else{ ?>

                        <iframe class="mx-auto" data-aos="fade-left" src="https://discord.com/widget?id=<?=$_Theme_['Main']['theme']['discord-id']?>&theme=dark" width="<?=$_Theme_['Main']['theme']['discord-widget-l']?>" height="<?=$_Theme_['Main']['theme']['discord-widget-h']?>" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

                        <?php } ?>

        <?php for ($i = 1; $i < count($lectureAccueil['Infos']) + 1; $i++) : ?>

                    <article class="col-12 info-content" data-aos="fade-left">

                        <div class="miniature-card-4 text-center">
                            <img src="theme/upload/navRap/<?= $lectureAccueil['Infos'][$i]['image'] ?>" alt="Image <?= $i ?>" class="img img-responsive">

                            <div class="miniature-content">
                                <div class="miniature-description"><?= $lectureAccueil['Infos'][$i]['message']; ?></div>

                                <div class="card-footer">
                                    <button type="button" onclick="window.location.href='<?= $lectureAccueil['Infos'][$i]['lien']; ?>'"  class="btn btn-min btn-primary">S'y rendre !</button>
                                </div>

                            </div>

                        </div>
                    </article>

                <?php endfor; ?>
            </div>



        </div>
    </div>
</section>

<?php if ($_Theme_['Main']['Staff']['staff-mode'] == null){}else{ ?>

    <!-- SECTION STAFF -->
    <section class="area-padding" id="staff">
        <div class="container" data-aos="zoom-in-up">
            <h1 class="text-center">Notre Staff</h1>

                <div class="row">

                <?php
                    $staff = 1;
                    while ($staff <= $_Theme_['Main']['Staff']['staff-nombre']) : ?>
                        <div class="mx-auto" data-aos="fade-up" data-aos-delay="<?= $staff ?>00">
                            <img class="mx-auto d-block"  src="https://minotar.net/<?=$_Theme_['Main']['Staff']['staff-style']?>/<?= $_Theme_['Main']['Staff']['pseudo' . $staff . ''] ?>/200.png" alt="Skin de <?= $_Theme_['Main']['Staff']['pseudo' . $staff . '']; ?>">
                            <p class="text-center" style="margin-top: 15px"><i class="fas fa-user"></i> <strong> <?= $_Theme_['Main']['Staff']['pseudo' . $staff . ''] ?></strong></p>
                            <p class="text-center" style="margin-top: 15px"><i class="fas fa-shield-alt"></i> <strong> <?= $_Theme_['Main']['Staff']['grade' . $staff . ''] ?></strong></p>
                        </div>

                <?php
                    $staff++;
                    endwhile;
                ?>
            </div>
        </div>

    </section>
<?php }?>







