<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UtilisateurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UtilisateurRepository extends EntityRepository
{
    
    public function getAllAgents()
    {
        $qB = $this->createQueryBuilder('u');
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    }
    
}
