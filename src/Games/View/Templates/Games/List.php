<?php
/**
 * Template to list games
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
$title = $content['title'];
$games = $content['games'];
?>
<div class="container">
    <h1 class="title text-center"><?php echo $title; ?></h1>
    <?php
    foreach ($games as $game) {
        /** @var \Games\Model\Game $game */
        echo '<p>' . htmlentities(utf8_encode($game->getName())) .
            ' -  <a href="' . $siteURL . 'detail?id=' .
            $game->getId() . '">Detail</a></p>';
    }
    ?>
</div>
