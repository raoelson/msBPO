<?php

namespace AppBundle\Repository\Referentiel;

use Doctrine\ORM\EntityRepository;

/**
 * GarageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GarageRepository extends EntityRepository
{
    
    public function getAll()
    {
        $qB = $this->createQueryBuilder('g')
                ->orderBy('g.libelle');
        
        $qry = $qB->getQuery();
        
        $garages = array();
        foreach ($qry->getResult() as $g) {
            $garages[] = $g->getLibelle();
        }
        
        return $garages;
    }
    
}
