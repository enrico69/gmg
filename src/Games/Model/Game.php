<?php
/**
 * Represents the game entity
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Model;

use Games\Model\AbstractEntity;
use Games\Helper\Validator;

/**
 * Class Game
 * @package Games\Model
 */
class Game extends AbstractEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $platform = "";

    /**
     * @var boolean
     */
    protected $to_play_solo;

    /**
     * @var boolean
     */
    protected $to_play_multi;

    /**
     * @var boolean
     */
    protected $copy;

    /**
     * @var boolean
     */
    protected $many;

    /**
     * @var boolean
     */
    protected $top_game;

    /**
     * @var string
     */
    protected $comments;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isToPlaySolo()
    {
        return $this->to_play_solo;
    }

    /**
     * @param bool $to_play_solo
     */
    public function setToPlaySolo($to_play_solo)
    {
        $this->to_play_solo = $to_play_solo;
    }

    /**
     * @return bool
     */
    public function isToPlayMulti()
    {
        return $this->to_play_multi;
    }

    /**
     * @param bool $to_play_multi
     */
    public function setToPlayMulti($to_play_multi)
    {
        $this->to_play_multi = $to_play_multi;
    }

    /**
     * @return bool
     */
    public function isCopy()
    {
        return $this->copy;
    }

    /**
     * @param bool $copy
     */
    public function setCopy($copy)
    {
        $this->copy = $copy;
    }

    /**
     * @return bool
     */
    public function isMany()
    {
        return $this->many;
    }

    /**
     * @param bool $many
     */
    public function setMany($many)
    {
        $this->many = $many;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return bool
     */
    public function isTopGame()
    {
        return $this->top_game;
    }

    /**
     * @param bool $top_game
     */
    public function setTopGame($top_game)
    {
        $this->top_game = $top_game;
    }

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    /**
     * Validate the object
     *
     * @param boolean $validateId validate the id field too
     *
     * @return mixed
     */
    public function validate($validateId = false)
    {
        $messages = [];

        if ($validateId && !filter_var($this->id, FILTER_VALIDATE_INT)) {
            $messages[] = "Id n'est pas un entier";
        }

        if (mb_strlen(trim($this->name)) == 0) {
            $messages[] = "Nom manquant";
        }

        if (mb_strlen(trim($this->platform)) == 0) {
            $messages[] = "Support manquant";
        }

        if (!Validator::isOneOrZero($this->isToPlaySolo())) {
            $messages[] = "Jouer en solo: mauvais format";
        }

        if (!Validator::isOneOrZero($this->isToPlayMulti())) {
            $messages[] = "Jouer en multi: mauvais format";
        }

        if (!Validator::isOneOrZero($this->isCopy())) {
            $messages[] = "Au moins une copie: mauvais format";
        }

        if (!Validator::isOneOrZero($this->isMany())) {
            $messages[] = "Plusieurs exemplaires: mauvais format";
        }

        if (!Validator::isOneOrZero($this->isTopGame())) {
            $messages[] = "Top jeu: mauvais format";
        }

        return $messages;
    }
}
