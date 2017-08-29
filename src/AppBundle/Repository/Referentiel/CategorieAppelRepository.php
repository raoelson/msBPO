<?php

namespace AppBundle\Repository\Referentiel;

use Doctrine\ORM\EntityRepository;

/**
 * CategorieAppelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieAppelRepository extends EntityRepository
{
    public function getAll()
    {
        $qB = $this->createQueryBuilder('c')
                ->select('c.libelle');
        $qB->expr()->isNull('c.dateSuppression');
        
        $qry = $qB->getQuery();
        
        $libellesCategorie = array();
        foreach ($qry->getScalarResult() as $categorie) {
            $libellesCategorie[] = $categorie['libelle'];
        }
        
        return $libellesCategorie;
    }
    
    public function getCategorieIdLibelle()
    {
        $qB = $this->createQueryBuilder('c')
                ->select(array('c.id','c.libelle'))
                ->orderBy('c.libelle', 'ASC');
        $qB->expr()->isNull('c.dateSuppression');
        
        return $qry = $qB->getQuery()->getResult();
    }
}
