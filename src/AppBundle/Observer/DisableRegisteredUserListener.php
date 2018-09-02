<?php
/**
 * @author     Eric COURTIAL <ecourtial@absolunet.com>
 * @copyright  Copyright (c) 2018 Absolunet (http://www.absolunet.com)
 * @link       http://www.absolunet.com
 */
namespace AppBundle\Observer;

use FOS\UserBundle\Event\GetResponseUserEvent;

/**
 * Class DisableRegisteredUserListener
 * @package AppBundle\Observer
 */
class DisableRegisteredUserListener
{
    /**
     * @param \FOS\UserBundle\Event\GetResponseUserEvent $event
     */
    public function disableUser(GetResponseUserEvent $event)
    {
        $user = $event->getUser();
        /** @var \AppBundle\Entity\User $user */
        $user->setEnabled(false);
    }
}
