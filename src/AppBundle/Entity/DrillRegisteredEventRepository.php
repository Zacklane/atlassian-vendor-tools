<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DrillRegisteredEventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DrillRegisteredEventRepository extends EntityRepository
{
    /**
     * @return DrillRegisteredEvent[]
     */
    public function findEventsToSendToday()
    {
        $events = $this->createQueryBuilder('e')
            ->where('DATE_DIFF(e.sendDate, CURRENT_DATE()) = 0')
            ->andWhere('e.status = :status')
            ->setParameter('status', 'new')
            ->getQuery()
            ->getResult();

        return $events;
    }
}
