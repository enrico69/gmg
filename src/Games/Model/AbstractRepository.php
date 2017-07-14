<?php
/**
 * Abstract Repository class
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Model;

use Doctrine\DBAL\Connection;

/**
 * Class AbstractRepository
 *
 * @package Games\Model
 */
abstract class AbstractRepository
{
    /**
     * Db connector
     *
     * @var \Doctrine\DBAL\Connection
     */
    protected $doctrine;

    /**
     * AbstractRepository constructor.
     *
     * @param \Doctrine\DBAL\Connection $doctrine is the db connector
     */
    public function __construct(Connection $doctrine)
    {
        $this->doctrine = $doctrine;
    }
}
