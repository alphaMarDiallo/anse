<?php

namespace AnsehhpBundle\Repository;

use AnsehhpBundle\Entity\Members;

/**
 *MembersRepository
 *
 */

class MembersRepository extends \Doctrine\ORM\Entity\Reposiroty
{
    public function getAllMembers()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT firstName, lastName, country FROM AnsehhpBundle\Entity\Members");
        $members = $query->getResult();

        return $members;
    }
}