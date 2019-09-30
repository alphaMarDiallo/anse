<?php

namespace AnsehhpBundle\Repository;

// use AnsehhpBundle\Entity\Members;

/**
 *MembersRepository
 *
 */

class MembersRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllMembers()
    {
        $em = $this->getEntityManager();
        // Méthode QueryBuilder (PHP)
        $query = $em->createQueryBuilder();
        $query
            ->select('firstName', 'lastName')
            ->from(Members::class, 'm')
            ->orderBy('m.idMember', 'DESC');
        // on bâtit une requête via des function PHP de doctrine.
        return $query->getQuery()->getResult();
        // on exécute la requete et on fatch.
    }
}