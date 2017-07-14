<?php
/**
 * Represents the game entity
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Model;

/**
 * Class Game
 * @package Games\Model
 */
class Game
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
    protected $support;

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
     * @return string
     */
    public function getSupport()
    {
        return $this->support;
    }

    /**
     * @param string $support
     */
    public function setSupport($support)
    {
        $this->support = $support;
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
}
