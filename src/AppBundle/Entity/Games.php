<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Games
 *
 * @ORM\Table(name="games")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GamesRepository")
 */
class Games
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="platform", type="string", length=255, nullable=false)
     */
    protected $platform;

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_play_solo", type="boolean", nullable=false)
     */
    protected $toPlaySolo = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_play_multi", type="boolean", nullable=false)
     */
    protected $toPlayMulti = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="copy", type="boolean", nullable=false)
     */
    protected $copy = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="many", type="boolean", nullable=false)
     */
    protected $many;

    /**
     * @var boolean
     *
     * @ORM\Column(name="top_game", type="boolean", nullable=false)
     */
    protected $topGame = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", length=65535, nullable=true)
     */
    protected $comments;

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_do", type="boolean", nullable=false)
     */
    protected $toDo = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="material", type="boolean", nullable=false)
     */
    protected $material = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="all_of_fame", type="boolean", nullable=true, options={"default" : 0})
     */
    protected $allOfFame = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="all_of_fame_year", type="integer", nullable=true, options={"default" : 0})
     */
    protected $allOfFameYear = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="all_of_fame_position", type="integer", nullable=true, options={"default" : 0})
     */
    protected $allOfFamePosition = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="played_it_often", type="boolean", nullable=true, options={"default" : 0})
     */
    protected $usedToPlayItOften = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="todo_recurring", type="boolean", nullable=true, options={"default" : 0})
     */
    protected $todoRecurring = '0';

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
     * @return bool
     */
    public function isToPlaySolo()
    {
        return $this->toPlaySolo;
    }

    /**
     * @param bool $toPlaySolo
     */
    public function setToPlaySolo($toPlaySolo)
    {
        $this->toPlaySolo = $toPlaySolo;
    }

    /**
     * @return bool
     */
    public function isToPlayMulti()
    {
        return $this->toPlayMulti;
    }

    /**
     * @param bool $toPlayMulti
     */
    public function setToPlayMulti($toPlayMulti)
    {
        $this->toPlayMulti = $toPlayMulti;
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
     * @return bool
     */
    public function isTopGame()
    {
        return $this->topGame;
    }

    /**
     * @param bool $topGame
     */
    public function setTopGame($topGame)
    {
        $this->topGame = $topGame;
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
    public function isToDo()
    {
        return $this->toDo;
    }

    /**
     * @param bool $toDo
     */
    public function setToDo($toDo)
    {
        $this->toDo = $toDo;
    }

    /**
     * @return bool
     */
    public function isMaterial()
    {
        return $this->material;
    }

    /**
     * @param bool $material
     */
    public function setMaterial(bool $material)
    {
        $this->material = $material;
    }

    /**
     * @return bool
     */
    public function isAllOfFame()
    {
        return $this->allOfFame;
    }

    /**
     * @param bool $allOfFame
     */
    public function setAllOfFame($allOfFame)
    {
        $this->allOfFame = $allOfFame;
    }

    /**
     * @return int
     */
    public function getAllOfFameYear()
    {
        return $this->allOfFameYear;
    }

    /**
     * @param int $allOfFameYear
     */
    public function setAllOfFameYear($allOfFameYear)
    {
        $this->allOfFameYear = $allOfFameYear;
    }

    /**
     * @return int
     */
    public function getAllOfFamePosition()
    {
        return $this->allOfFamePosition;
    }

    /**
     * @param int $allOfFamePosition
     */
    public function setAllOfFamePosition($allOfFamePosition)
    {
        $this->allOfFamePosition = $allOfFamePosition;
    }

    /**
     * @return bool
     */
    public function isUsedToPlayItOften()
    {
        return $this->usedToPlayItOften;
    }

    /**
     * @param bool $usedToPlayItOften
     */
    public function setUsedToPlayItOften($usedToPlayItOften)
    {
        $this->usedToPlayItOften = $usedToPlayItOften;
    }

    /**
     * @return bool
     */
    public function isTodoRecurring()
    {
        return $this->todoRecurring;
    }

    /**
     * @param bool $todoRecurring
     */
    public function setTodoRecurring($todoRecurring)
    {
        $this->todoRecurring = $todoRecurring;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}
