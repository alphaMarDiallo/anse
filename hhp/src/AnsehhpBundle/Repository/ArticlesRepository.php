<?php

namespace AnsehhpBundle\Repository;

/**
 *ArticlesRepository
 *
 */

class ArticlesRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllArticles()
    {

        $em = $this->getEntityManager();
        // Méthode QueryBuilder (PHP)
        $query = $em->createQueryBuilder();
        $query
            ->select('idArticle', 'titleArticle', 'article', 'link', 'dateArt')
            ->from(Articles::class, 'a')
            ->orderBy('a.idArticle', 'DESC');
        // on bâtit une requête via des function PHP de doctrine.
        return $query->getQuery()->getResult();
        // on exécute la requete et on fatch.
    }
}