<?php

namespace AppBundle\Repository\Referentiel;

use Doctrine\ORM\EntityRepository;

/**
 * TypeActionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TypeActionRepository extends EntityRepository
{
    
    public function getTypeActions()
    {
        $qB = $this->createQueryBuilder('t');
        $qB->leftJoin('t.statuts', 's')
                ->addSelect('s')
                ->leftJoin('t.categories', 'c')
                ->where($qB->expr()->isNull('t.dateSuppression'));
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    }
    
    public function getTypeActionsStd()
    {
        $qB = $this->createQueryBuilder('t');
        $qB->where($qB->expr()->isNull('t.dateSuppression'))
                ->andWhere($qB->expr()->notLike('t.libelle', ':filtre'))
                ->setParameter('filtre', '%appel sortant%')
                ->orderBy('t.libelle');
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    
        
    }
    public function getTypeActionAppelSortants()
    {
        $qB = $this->createQueryBuilder('t')
                ->leftJoin('t.statuts', 's')
                ->addSelect('s')
                ->leftJoin('t.categories', 'c')
                ->addSelect('c')
                ->where('t.libelle LIKE :title')
                ->setParameter('title', '%Appel Sortant%')
                ->andWhere('t.dateSuppression IS NULL')
                ->orderBy('t.libelle', 'ASC');
        
        return $qry = $qB->getQuery()->getResult();
    }
    
}
