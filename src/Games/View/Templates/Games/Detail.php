<?php
/**
 * Template to display a game details
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
$game = $content;
/** @var \Games\Model\Game $game */
?>
<div class="container">
    <h1 class="title text-center"><?php echo htmlentities($game->getName()); ?></h1>
    <p><strong>Support:</strong> <?php echo htmlentities($game->getSupport()); ?></p>
    <p><strong>A jouer en solo:</strong>
        <?php echo $game->isToPlaySolo() ? 'Oui' : 'Non'; ?></p>
    <p><strong>A jouer en multi:</strong>
        <?php echo $game->isToPlayMulti() ? 'Oui' : 'Non'; ?></p>
    <p><strong>Est une copie:</strong>
        <?php echo $game->isCopy() ? 'Oui' : 'Non'; ?></p>
    <p><strong>En plusieurs exemplaires:</strong>
        <?php echo $game->isMany() ? 'Oui' : 'Non'; ?></p>
    <p><strong>Top jeu:</strong>
        <?php echo $game->isTopGame() ? 'Oui' : 'Non'; ?></p>
    <p><strong>Commentaires:</strong></p>
    <p><?php echo htmlentities($game->getComments()); ?></p>
</div>
