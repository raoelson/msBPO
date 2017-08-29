<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

include __DIR__ . DIRECTORY_SEPARATOR . "Referentiel" . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "PHPExcel.php";

/**
 * OperationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OperationRepository extends EntityRepository
{
    
    public function getSuivi(\AppBundle\Entity\Utilisateur $utilisateur, \DateTime $date)
    {
        $dateDebut = $date->format('Y-m-d') . " 00:00:00";
        $dateFin = $date->format('Y-m-d') . " 23:59:59";
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->innerJoin('o.typeAction', 't')
                ->addSelect('j')
                ->where('j.createur = :utilisateur')
                ->setParameter('utilisateur', $utilisateur)
                ->andWhere('t.libelle NOT LIKE :typeaction')
                ->setParameter('typeaction', '%appel sortant%');
        $qB->andWhere('j.dateOperation >= :dateDebut AND j.dateOperation <= :dateFin')
                ->setParameter('dateDebut', $dateDebut)
                ->setParameter('dateFin', $dateFin)
                ->orderBy('o.dateOperation');
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    }
    
    public function getSuiviFiltre($filtre = array())
    {
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->innerJoin('o.typeAction', 't')
                ->addSelect('j')
                ->where('1 = 1')
                ->andWhere('t.libelle NOT LIKE :typeaction')
                ->setParameter('typeaction', '%appel sortant%');
        if (count($filtre)) {
            if (isset($filtre['date'])) {
                $date = \DateTime::createFromFormat('d/m/Y', $filtre['date']);
                $dateDebut = $date->format('Y-m-d') . " 00:00:00";
                $dateFin = $date->format('Y-m-d') . " 23:59:59";
                $qB->andWhere('j.dateOperation >= :dateDebut AND j.dateOperation <= :dateFin')
                        ->setParameter('dateDebut', $dateDebut)
                        ->setParameter('dateFin', $dateFin)
                        ->orderBy('o.dateOperation');
            }
            if (isset($filtre['agent'])) {
                $qB->innerJoin('j.createur', 'c')
                        ->andWhere('c.id = :utilisateur')
                        ->setParameter('utilisateur', $filtre['agent']);
            }
            if (isset($filtre['cabinet'])) {
                $qB->innerJoin('o.cabinet', 'cb')
                        ->andWhere('cb.id = :cabinet')
                        ->setParameter('cabinet', $filtre['cabinet']);
            }
            if (isset($filtre['interlocuteur'])) {
                $qB->innerJoin('o.interlocuteur', 'i')
                        ->andWhere('i.id = :interlocuteur')
                        ->setParameter('interlocuteur', $filtre['interlocuteur']);
            }
            if (isset($filtre['document'])) {
                $qB->innerJoin('o.document', 'd')
                        ->andWhere('d.id = :document')
                        ->setParameter('document', $filtre['document']);
            }
        }
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    }
    
    public function getSuiviAppelSortant(\AppBundle\Entity\Utilisateur $utilisateur, \DateTime $date)
    {
        $dateDebut = $date->format('Y-m-d') . " 00:00:00";
        $dateFin = $date->format('Y-m-d') . " 23:59:59";
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->innerJoin('o.typeAction', 't')
                ->addSelect('j')
                ->where('j.createur = :utilisateur')
                ->setParameter('utilisateur', $utilisateur)
                ->andWhere('t.libelle LIKE :typeaction')
                ->setParameter('typeaction', '%appel sortant%');
        $qB->andWhere('j.dateOperation >= :dateDebut AND j.dateOperation <= :dateFin')
                ->setParameter('dateDebut', $dateDebut)
                ->setParameter('dateFin', $dateFin)
                ->orderBy('o.dateOperation');
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    }
    
    public function exporter($filtre = array(), $appelSortant = false)
    {
        $now = new \DateTime();
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->addSelect('j')
                ->where('1 = 1');
        if ($appelSortant) {
            $qB->innerJoin('o.typeAction', 't')
                    ->andWhere('t.libelle LIKE :typeaction')
                    ->setParameter('typeaction', '%appel sortant%');
        }else{
            $qB->innerJoin('o.typeAction', 't')
                    ->andWhere('t.libelle NOT LIKE :typeaction')
                    ->setParameter('typeaction', '%appel sortant%');
        }
        if (count($filtre)) {
            if (isset($filtre['date'])) {
                $date = \DateTime::createFromFormat('d/m/Y', $filtre['date']);
                $dateDebut = $date->format('Y-m-d') . " 00:00:00";
                $dateFin = $date->format('Y-m-d') . " 23:59:59";
                $qB->andWhere('j.dateOperation >= :dateDebut AND j.dateOperation <= :dateFin')
                        ->setParameter('dateDebut', $dateDebut)
                        ->setParameter('dateFin', $dateFin)
                        ->orderBy('o.dateOperation');
            }
            if (isset($filtre['agent'])) {
                $qB->innerJoin('j.createur', 'c')
                        ->andWhere('c.id = :utilisateur')
                        ->setParameter('utilisateur', $filtre['agent']);
            }
            if (isset($filtre['cabinet'])) {
                $qB->innerJoin('o.cabinet', 'cb')
                        ->andWhere('cb.id = :cabinet')
                        ->setParameter('cabinet', $filtre['cabinet']);
            }
            if (!$appelSortant) {
                if (isset($filtre['interlocuteur'])) {
                    $qB->innerJoin('o.interlocuteur', 'i')
                            ->andWhere('i.id = :interlocuteur')
                            ->setParameter('interlocuteur', $filtre['interlocuteur']);
                }
                if (isset($filtre['document'])) {
                    $qB->innerJoin('o.document', 'd')
                            ->andWhere('d.id = :document')
                            ->setParameter('document', $filtre['document']);
                }
            }
            else {
                if (isset($filtre['garage'])) {
                    $qB->innerJoin('o.garage', 'i')
                            ->andWhere('i.id = :garage')
                            ->setParameter('garage', $filtre['garage']);
                }
            }
        }
        
        $qry = $qB->getQuery();
        
        $objExcel = new \PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        
        $feuille = $objExcel->getActiveSheet();
        $feuille->setTitle("Export");
        $entete = array("Numéro cabinet", "Cabinet", "Action", "Statut", "Référence NT", "Interlocuteur", "Document", "Jour de réception", "Heure de réception", "Heure de traitement", "Commentaire de l'agent");
        if ($appelSortant) {
            //$entete = array("Agent", "Numéro cabinet", "Cabinet", "Action", "Garage", "Catégorie", "Statut", "Jour de réception", "Date et heure de traitement", "Transmission","Commentaire de l'agent", "Contrôle", "Process", "Commentaire Contrôle");
            $entete = array("Action", "Date de réception", "Numéro cabinet", "Cabinet", "Catégorie", "Statut", "Garage", "Date Heure", "Transmission", "Commentaire de l'agent");
        }
        $lig = 1;
        $col = 0;
        foreach ($entete as $colonne) {
            $feuille->setCellValueByColumnAndRow($col, $lig, $colonne);
            $col++;
        }
        $feuille->getStyle("A1:M1")->applyFromArray(array('font' => array('bold' => true)));
        foreach ($qry->getResult() as $ligne) {
            $lig++;
            if (!$appelSortant) {
                if ($ligne->getCabinet()) {
                    $feuille
                            ->setCellValueExplicitByColumnAndRow(0, $lig, $ligne->getNumeroDossier(), \PHPExcel_Cell_DataType::TYPE_STRING)
                            ->setCellValueByColumnAndRow(1, $lig, $ligne->getCabinet()->getNom());
                } else {
                    $feuille
                            ->setCellValueByColumnAndRow(0, $lig, '-')
                            ->setCellValueByColumnAndRow(1, $lig, '-');
                }
                $feuille->setCellValueByColumnAndRow(2, $lig, $ligne->getTypeAction()->getLibelle());
                if ($ligne->getStatut()) {
                    $feuille->setCellValueByColumnAndRow(3, $lig, $ligne->getStatut()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(3, $lig, "-");
                }
                $feuille->setCellValueExplicitByColumnAndRow(4, $lig, $ligne->getReferenceNT(), \PHPExcel_Cell_DataType::TYPE_STRING);
                
                if ($ligne->getInterlocuteur()) {
                    $feuille->setCellValueByColumnAndRow(5, $lig, $ligne->getInterlocuteur()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(5, $lig, "");
                }
                if ($ligne->getDocument()) {
                    $feuille->setCellValueByColumnAndRow(6, $lig, $ligne->getDocument()->getDocumentType());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(6, $lig, "");
                }
                if ($ligne->getDateReception()) {
                    $feuille->setCellValueByColumnAndRow(7, $lig, $ligne->getDateReception()->format('d/m/Y'));
                }
                else {
                    $feuille->setCellValueByColumnAndRow(7, $lig, "");
                }
                if ($ligne->getHeureReception()) {
                    $feuille->setCellValueByColumnAndRow(8, $lig, $ligne->getHeureReception()->format('H:i'));
                    $feuille->getStyleByColumnAndRow(8, $lig)
                            ->getAlignment()
                            ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                } 
                else {
                    $feuille->setCellValueByColumnAndRow(8, $lig, "");
                }
                if ($ligne->getHeureTraitement()) {
                    $feuille->setCellValueByColumnAndRow(9, $lig, $ligne->getHeureTraitement()->format('H:i'));
                    $feuille->getStyleByColumnAndRow(9, $lig)
                            ->getAlignment()
                            ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                }
                else {
                    $feuille->setCellValueByColumnAndRow(9, $lig, "");
                }
                
                $feuille->setCellValueByColumnAndRow(10, $lig, $ligne->getCommentaireOperation());
            }
            else {
                $feuille->setCellValueByColumnAndRow(0, $lig, $ligne->getTypeAction()->getLibelle());
                $feuille->setCellValueByColumnAndRow(1, $lig, $ligne->getDateReception()->format('d/m/Y'));
                if ($ligne->getCabinet()) {
                    $feuille
                            ->setCellValueExplicitByColumnAndRow(2, $lig, $ligne->getNumeroDossier(), \PHPExcel_Cell_DataType::TYPE_STRING)
                            ->setCellValueByColumnAndRow(3, $lig, $ligne->getCabinet()->getNom());
                } else {
                    $feuille
                            ->setCellValueByColumnAndRow(2, $lig, '-')
                            ->setCellValueByColumnAndRow(3, $lig, '-');
                }
                if ($ligne->getCategorieAppel()) {
                    $feuille->setCellValueByColumnAndRow(4, $lig, $ligne->getCategorieAppel()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(4, $lig, "-");
                }
                if ($ligne->getStatut()) {
                    $feuille->setCellValueByColumnAndRow(5, $lig, $ligne->getStatut()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(5, $lig, "-");
                }
                if ($ligne->getGarage()) {
                    $feuille->setCellValueByColumnAndRow(6, $lig, $ligne->getGarage()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(6, $lig, "-");
                }
                $feuille->setCellValueByColumnAndRow(7, $lig, $ligne->getDateHeureTraitement()->format('d/m/Y H:i'));
                $feuille->getStyleByColumnAndRow(7, $lig)
                        ->getAlignment()
                        ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                if ($ligne->getTransmission()) {
                    $feuille->setCellValueByColumnAndRow(8, $lig, $ligne->getTransmission()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(8, $lig, "-");
                }
                $feuille->setCellValueByColumnAndRow(9, $lig, $ligne->getCommentaireOperation());
                
                /*if ($ligne->getControle()) {
                    $feuille->setCellValueByColumnAndRow(11, $lig, $ligne->getControle()->getLibelle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(11, $lig, "-");
                }
                if ($ligne->getProcess()) {
                    $feuille->setCellValueByColumnAndRow(12, $lig, $ligne->getProcess());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(12, $lig, "-");
                }
                if ($ligne->getCommentaireControle()) {
                    $feuille->setCellValueByColumnAndRow(13, $lig, $ligne->getCommentaireControle());
                }
                else {
                    $feuille->setCellValueByColumnAndRow(13, $lig, "-");
                }*/

            }
        }    
        
        $fichier = "export_" . $now->format('YmdHis') . '.xls';
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fichier . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        
        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
        $objWriter->save('php://output');
    }
    
    public function getSuiviNonValide($currentUserId)
    {
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->innerJoin('o.typeAction', 't')
                ->where('j.validee IS NULL')
                ->andWhere('j.validationDemandee = 1')
                ->andWhere('o.operateur != :utilisateur')
                ->setParameter('utilisateur', $currentUserId)
                ->andWhere('t.libelle NOT LIKE :typeaction')
                ->setParameter('typeaction', '%appel sortant%');
        $qry = $qB->getQuery();
        return $qry->getResult();
    }
    
    public function getSuiviAppelSortantNonValide($currentUserId)
    {
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->innerJoin('o.typeAction', 't')
                ->where('j.validee IS NULL')
                ->andWhere('j.validationDemandee = 1')
                ->andWhere('o.operateur != :utilisateur')
                ->setParameter('utilisateur', $currentUserId)
                ->andWhere('t.libelle LIKE :typeaction')
                ->setParameter('typeaction', '%appel sortant%');
        $qry = $qB->getQuery();
        return $qry->getResult();
    }
    
    public function getSuiviAppelSortantFiltre($filtre = array())
    {
        $qB = $this->createQueryBuilder("o")
                ->innerJoin('o.journee', 'j')
                ->innerJoin('o.typeAction', 't')
                ->addSelect('j')
                ->andWhere('t.libelle LIKE :typeaction')
                ->setParameter('typeaction', '%appel sortant%');
        
        if (count($filtre)) {
            if (isset($filtre['date'])) {
                $date = \DateTime::createFromFormat('d/m/Y', $filtre['date']);
                $dateDebut = $date->format('Y-m-d') . " 00:00:00";
                $dateFin = $date->format('Y-m-d') . " 23:59:59";
                $qB->andWhere('j.dateOperation >= :dateDebut AND j.dateOperation <= :dateFin')
                        ->setParameter('dateDebut', $dateDebut)
                        ->setParameter('dateFin', $dateFin)
                        ->orderBy('o.dateOperation');
            }
            if (isset($filtre['agent'])) {
                $qB->innerJoin('j.createur', 'c')
                        ->andWhere('c.id = :utilisateur')
                        ->setParameter('utilisateur', $filtre['agent']);
            }
            if (isset($filtre['cabinet'])) {
                $qB->innerJoin('o.cabinet', 'cb')
                        ->andWhere('cb.id = :cabinet')
                        ->setParameter('cabinet', $filtre['cabinet']);
            }
            if (isset($filtre['garage'])) {
                $qB->innerJoin('o.garage', 'i')
                        ->andWhere('i.id = :garage')
                        ->setParameter('garage', $filtre['garage']);
            }
        }
        
        $qry = $qB->getQuery();
        
        return $qry->getResult();
    }
}