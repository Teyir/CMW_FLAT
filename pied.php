<?php
$_Theme_ = new Lire('theme/' . $_Serveur_['General']['theme'] . "/config/config.yml");
$_Theme_ = $_Theme_->GetTableau();
?>
<footer id="Footer" class="footer-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <?php if(isset($_Theme_['Pied']['about']) && !empty(trim($_Theme_['Pied']['about']))) : ?>
                <h4>À propos</h4>
                    <p><?= $_Theme_['Pied']['about']; ?></p>
                <?php endif; ?>
                <div class="footer-logo">
                    <img src="<?= $_Theme_['Main']['theme']['logo'] ?>" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4>Contact Info</h4>
                <div class="footer-address">
                    <p>Address :Your address goes
                        here, your demo address.</p>
                    <span>Phone : +8880 44338899</span>
                    <span>Email : info@colorlib.com</span>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4>Liens utiles</h4>
                <ul>
                    <!-- Faire une boucle pour choisir le nombre de liens-->
                    <li><a href="#">Liens 1</a></li>
                    <li><a href="#">Liens 2</a></li>
                    <li><a href="#">Liens 4</a></li>

                </ul>
            </div>

            <div class="col-lg-3 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                <h4>5 derniers inscrits site</h4>



            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
            <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter-alt"></i></a>
                <a href="#"><i class="ti-dribbble"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>