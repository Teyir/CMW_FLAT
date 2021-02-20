
<?php
$footerbdd2 = $bddConnection->query('SELECT id, pseudo FROM `cmw_votes` ORDER BY `cmw_votes`.`id` DESC');

$footer2count = 0;
$footer2countmax = 5;

while (($donnees = $footerbdd2->fetch()) and ($footer2count < $footer2countmax)) {?>

    <ul class="list-unstyled footer_votes">
        <li class="footer_txt">Pseudo: <strong class="footer_strong"><?php echo $donnees['pseudo']?></strong></li>
        <li class="footer_txt">Vote n°  <strong class="footer_strong"><?php echo $donnees['id']?></strong></li>
    </ul>

    <?php $footer2count++; }
$footerbdd2->closeCursor();?>
