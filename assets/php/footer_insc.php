
<?php
$footerbdd1 = $bddConnection->query('SELECT id, pseudo, anciennete FROM `cmw_users` ORDER BY `cmw_users`.`id` DESC');

$footercount = 0;
$footercountmax = 3;

while (($donnees = $footerbdd1->fetch()) and ($footercount < $footercountmax)) {?>

    <ul class="list-unstyled footer_membres">
        <li class="footer_txt">Pseudo: <strong class="footer_strong"><?php echo $donnees['pseudo']?></strong></li>
        <li class="footer_txt">Membre n°  <strong class="footer_strong"><?php echo $donnees['id']?></strong></li>
        <li class="footer_txt">Inscrit le:  <strong class="footer_strong" ><?php echo date('d-m-Y', $donnees['anciennete']) ?></strong></li>
    </ul>

    <?php $footercount++; }
$footerbdd1->closeCursor();?>
