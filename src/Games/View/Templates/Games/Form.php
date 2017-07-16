<?php
/**
 * Book Edit / Add Form
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
$game = $content['game'];
$platforms = $content['platforms'];
$title = $content['title'];
$yesNoArray = [
    0 => 'Non',
    1 => 'Oui'
];
/** @var \Games\Model\Game $game */
?>
<div class="container">
    <h1 class="title text-center"><?php echo $title; ?></h1>

    <form method="POST" action="<?php echo $urlSite ;?>edit">
        <p><input type="hidden" name="id" value="<?php echo $game->getId();?>"/></p>
        <p><strong>Nom: </strong>
            <input type="text" title="name"
               name="name" value="<?php echo $game->getName();?>"/></p>
        <p><strong>Support: </strong>
            <select name="platform" title="platform">
            <?php
            foreach ($platforms as $platform) {
                $selected = ($platform['platform'] == $game->getPlatform()) ? " selected" : '';
                echo '<option value="' . $platform['platform'] . '"' . $selected .
                    '>' . $platform['platform'] . '</option>';
            }
            ?>
            </select>
        </p>
        <p><strong>A jouer en solo?: </strong>
            <?php $selected = $game->isToPlaySolo() ? " selected" : ''; ?>
            <select name="to_play_solo" title="to_play_solo">
                <<?php
                foreach ($yesNoArray as $value => $label) {
                    $selected = ($value == $game->isToPlaySolo()) ? " selected" : '';
                    echo '<option value="' . $value . '"' . $selected .
                        '>' . $label . '</option>';
                }
                ?>
            </select>
        </p>
        <p><strong>A jouer en multi?: </strong>
            <?php $selected = $game->isToPlayMulti() ? " selected" : ''; ?>
            <select name="to_play_multi" title="to_play_multi">
                <<?php
                foreach ($yesNoArray as $value => $label) {
                    $selected = ($value == $game->isToPlayMulti()) ? " selected" : '';
                    echo '<option value="' . $value . '"' . $selected .
                        '>' . $label . '</option>';
                }
                ?>
            </select>
        </p>
        <p><strong>Plusieurs exemplaires?: </strong>
            <?php $selected = $game->isMany() ? " selected" : ''; ?>
            <select name="many" title="many">
                <<?php
                foreach ($yesNoArray as $value => $label) {
                    $selected = ($value == $game->isMany()) ? " selected" : '';
                    echo '<option value="' . $value . '"' . $selected .
                        '>' . $label . '</option>';
                }
                ?>
            </select>
        </p>
        <p><strong>Au moins un exemplaire est une copie?: </strong>
            <?php $selected = $game->isCopy() ? " selected" : ''; ?>
            <select name="copy" title="copy">
                <<?php
                foreach ($yesNoArray as $value => $label) {
                    $selected = ($value == $game->isCopy()) ? " selected" : '';
                    echo '<option value="' . $value . '"' . $selected .
                        '>' . $label . '</option>';
                }
                ?>
            </select>
        </p>
        <p><strong>Top jeu?: </strong>
            <?php $selected = $game->isTopGame() ? " selected" : ''; ?>
            <select name="top_game" title="top_game">
                <<?php
                foreach ($yesNoArray as $value => $label) {
                    $selected = ($value == $game->isTopGame()) ? " selected" : '';
                    echo '<option value="' . $value . '"' . $selected .
                        '>' . $label . '</option>';
                }
                ?>
            </select>
        </p>
        <p><strong>Commentaires: </strong><br/>
            <textarea name="comments" title="comments">
                <?php echo trim($game->getComments()); ?>
            </textarea>
        </p>
        <p><strong>Mot de passe: </strong>
            <input type="password" title="password" name="password"/>
        </p>
        <p>
            <input type="submit" title="Enregister" value="Enregistrer"/>
        </p>
    </form>
</div>
