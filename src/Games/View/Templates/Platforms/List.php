<?php
/**
 * List all the platforms
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
$platforms = $content;
?>
<div class="container">
    <h1 class="title text-center">Supports</h1>
    <?php
    foreach ($platforms as $platform) {
        echo '<p>' . $platform['platform'] .
            ' -  <a href="' . $siteURL . 'list?filter=' .
            $platform['platform'] . '">Liste de jeux</a></p>';
    }
    ?>
</div>