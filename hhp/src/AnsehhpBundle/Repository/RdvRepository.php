<?php

namespace AnsehhpBundle\Repository;

/**
 *RdvRepository
 *
 */

class RdvRepository extends \Doctrine\ORM\EntityRepository
{

    public function getRdv()
    {
        $em = $this->getEntityManager();
        // Méthode QueryBuilder (PHP)
        $query = $em->createQueryBuilder();
        $query
            ->select('firstName', 'lastName')
            ->from(Rdv::class, 'r')
            ->orderBy('m.idMember', 'DESC');
        // on bâtit une requête via des function PHP de doctrine.
        return $query->getQuery()->getResult();
        // on exécute la requete et on fatch.
    }

    // public function getRdvByMember()
    // {
        // $this->createQueryBuilder("r")
        // ->where("r.memberid = m.idMember")
        //->orderBy("DESC");
    // }
}