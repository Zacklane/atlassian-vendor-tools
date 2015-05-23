<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DrillSchemaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DrillSchemaRepository extends EntityRepository
{
    /**
     * @return DrillSchema[]
     */
    public function findAllFormatted()
    {
        $schemas = $this->findAll();
        $formatted = [];
        foreach ($schemas as $schema) {
            $formatted[$schema->getAddonKey()] = $schema;
        }

        return $formatted;
    }
}
