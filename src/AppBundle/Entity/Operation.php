<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table(name="operation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime")
     */
    private $dateOperation;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_dossier", type="string", length=32, nullable=true)
     */
    private $numeroDossier;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_nt", type="string", length=255, nullable=true)
     */
    private $referenceNT;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reception", type="date")
     */
    private $dateReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_reception", type="time", nullable=true)
     */
    private $heureReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_traitement", type="time", nullable=true)
     */
    private $heureTraitement;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_operation", type="text", nullable=true)
     */
    private $commentaireOperation;
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date_heure_traitement", type="datetime")
     */
    private $dateHeureTraitement;
    
    /**
     * @var Journee $journee
     * @ORM\ManyToOne(targetEntity="Journee", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $journee;
    
    /**
     * @var Referentiel\Cabinet $cabinet
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Cabinet", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $cabinet;
    
    /**
     * @var Referentiel\Statut $statut
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Statut", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $statut;
    
    /**
     * @var Referentiel\Interlocuteur $interlocuteur
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Interlocuteur", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $interlocuteur;
    
    /**
     * @var Referentiel\Document $document
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Document", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $document;
    
    /**
     * @var Utilisateur $operateur
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Utilisateur", inversedBy="saisies", cascade={"persist", "merge"})
     */
    private $operateur;
    
    /**
     * @var Utilisateur $controleur
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Utilisateur", inversedBy="controles", cascade={"persist", "merge"})
     */
    private $controleur;
    
    /**
     * @var Referentiel\TypeAction $typeAction
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\TypeAction", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $typeAction;
    
    /**
     * @var Referentiel\CategorieAppel $categorieAppel
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\CategorieAppel", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $categorieAppel;
    
    /**
     * @var Referentiel\Garage $garage
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Garage", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $garage;
    
    /**
     * @var Referentiel\Transmission $transmission
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Transmission", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $transmission;
    
    /**
     * @var Referentiel\Controle $controle
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Referentiel\Controle", inversedBy="operations", cascade={"persist", "merge"})
     */
    private $controle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="process", type="text", nullable=true)
     */
    private $process;
    
    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_controle", type="text", nullable=true)
     */
    private $commentaireControle;
    
    public function __construct() {
        $this->dateOperation = new \DateTime();
        $this->dateHeureTraitement = new \DateTime();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateOperation
     *
     * @param \DateTime $dateOperation
     * @return Operation
     */
    public function setDateOperation($dateOperation)
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get dateOperation
     *
     * @return \DateTime 
     */
    public function getDateOperation()
    {
        return $this->dateOperation;
    }

    /**
     * Set numeroDossier
     *
     * @param string $numeroDossier
     * @return Operation
     */
    public function setNumeroDossier($numeroDossier)
    {
        $this->numeroDossier = $numeroDossier;

        return $this;
    }

    /**
     * Get numeroDossier
     *
     * @return string 
     */
    public function getNumeroDossier()
    {
        return $this->numeroDossier;
    }

    /**
     * Set referenceNT
     *
     * @param string $referenceNT
     * @return Operation
     */
    public function setReferenceNT($referenceNT)
    {
        $this->referenceNT = $referenceNT;

        return $this;
    }

    /**
     * Get referenceNT
     *
     * @return string 
     */
    public function getReferenceNT()
    {
        return $this->referenceNT;
    }

    /**
     * Set dateReception
     *
     * @param \DateTime $dateReception
     * @return Operation
     */
    public function setDateReception($dateReception)
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    /**
     * Get dateReception
     *
     * @return \DateTime 
     */
    public function getDateReception()
    {
        return $this->dateReception;
    }

    /**
     * Set heureReception
     *
     * @param \DateTime $heureReception
     * @return Operation
     */
    public function setHeureReception($heureReception)
    {
        $this->heureReception = $heureReception;

        return $this;
    }

    /**
     * Get heureReception
     *
     * @return \DateTime 
     */
    public function getHeureReception()
    {
        return $this->heureReception;
    }

    /**
     * Set heureTraitement
     *
     * @param \DateTime $heureTraitement
     * @return Operation
     */
    public function setHeureTraitement($heureTraitement)
    {
        $this->heureTraitement = $heureTraitement;

        return $this;
    }

    /**
     * Get heureTraitement
     *
     * @return \DateTime 
     */
    public function getHeureTraitement()
    {
        return $this->heureTraitement;
    }

    /**
     * Set commentaireOperation
     *
     * @param string $commentaireOperation
     * @return Operation
     */
    public function setCommentaireOperation($commentaireOperation)
    {
        $this->commentaireOperation = $commentaireOperation;

        return $this;
    }

    /**
     * Get commentaireOperation
     *
     * @return string 
     */
    public function getCommentaireOperation()
    {
        return $this->commentaireOperation;
    }

    /**
     * Set journee
     *
     * @param \AppBundle\Entity\Journee $journee
     * @return Operation
     */
    public function setJournee(\AppBundle\Entity\Journee $journee = null)
    {
        $this->journee = $journee;

        return $this;
    }

    /**
     * Get journee
     *
     * @return \AppBundle\Entity\Journee 
     */
    public function getJournee()
    {
        return $this->journee;
    }

    /**
     * Set cabinet
     *
     * @param \AppBundle\Entity\Referentiel\Cabinet $cabinet
     * @return Operation
     */
    public function setCabinet(\AppBundle\Entity\Referentiel\Cabinet $cabinet = null)
    {
        $this->cabinet = $cabinet;

        return $this;
    }

    /**
     * Get cabinet
     *
     * @return \AppBundle\Entity\Referentiel\Cabinet 
     */
    public function getCabinet()
    {
        return $this->cabinet;
    }

    /**
     * Set statut
     *
     * @param \AppBundle\Entity\Referentiel\Statut $statut
     * @return Operation
     */
    public function setStatut(\AppBundle\Entity\Referentiel\Statut $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \AppBundle\Entity\Referentiel\Statut 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set interlocuteur
     *
     * @param \AppBundle\Entity\Referentiel\Interlocuteur $interlocuteur
     * @return Operation
     */
    public function setInterlocuteur(\AppBundle\Entity\Referentiel\Interlocuteur $interlocuteur = null)
    {
        $this->interlocuteur = $interlocuteur;

        return $this;
    }

    /**
     * Get interlocuteur
     *
     * @return \AppBundle\Entity\Referentiel\Interlocuteur 
     */
    public function getInterlocuteur()
    {
        return $this->interlocuteur;
    }

    /**
     * Set document
     *
     * @param \AppBundle\Entity\Referentiel\Document $document
     * @return Operation
     */
    public function setDocument(\AppBundle\Entity\Referentiel\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AppBundle\Entity\Referentiel\Document 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set operateur
     *
     * @param \AppBundle\Entity\Utilisateur $operateur
     * @return Operation
     */
    public function setOperateur(\AppBundle\Entity\Utilisateur $operateur = null)
    {
        $this->operateur = $operateur;

        return $this;
    }

    /**
     * Get operateur
     *
     * @return \AppBundle\Entity\Utilisateur 
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * Set controleur
     *
     * @param \AppBundle\Entity\Utilisateur $controleur
     * @return Operation
     */
    public function setControleur(\AppBundle\Entity\Utilisateur $controleur = null)
    {
        $this->controleur = $controleur;

        return $this;
    }

    /**
     * Get controleur
     *
     * @return \AppBundle\Entity\Utilisateur 
     */
    public function getControleur()
    {
        return $this->controleur;
    }

    /**
     * Set typeAction
     *
     * @param \AppBundle\Entity\Referentiel\TypeAction $typeAction
     * @return Operation
     */
    public function setTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeAction = null)
    {
        $this->typeAction = $typeAction;

        return $this;
    }

    /**
     * Get typeAction
     *
     * @return \AppBundle\Entity\Referentiel\TypeAction 
     */
    public function getTypeAction()
    {
        return $this->typeAction;
    }
    
    /**
     * Set garage
     *
     * @param \AppBundle\Entity\Referentiel\Garage $garage
     * @return Operation
     */
    public function setGarage(\AppBundle\Entity\Referentiel\Garage $garage = null)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return \AppBundle\Entity\Referentiel\Garage 
     */
    public function getGarage()
    {
        return $this->garage;
    }
    
    /**
     * Set transmission
     *
     * @param \AppBundle\Entity\Referentiel\Transmission $transmission
     * @return Operation
     */
    public function setTransmission(\AppBundle\Entity\Referentiel\Transmission $transmission = null)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return \AppBundle\Entity\Referentiel\Transmission 
     */
    public function getTransmission()
    {
        return $this->transmission;
    }
    
    /**
     * Set categorieAppel
     *
     * @param \AppBundle\Entity\Referentiel\CategorieAppel $categorieAppel
     * @return Operation
     */
    public function setCategorieAppel(\AppBundle\Entity\Referentiel\CategorieAppel $categorieAppel = null)
    {
        $this->categorieAppel = $categorieAppel;

        return $this;
    }

    /**
     * Get categorieAppel
     *
     * @return \AppBundle\Entity\Referentiel\CategorieAppel 
     */
    public function getCategorieAppel()
    {
        return $this->categorieAppel;
    }
    
    /**
     * Set controle
     *
     * @param \AppBundle\Entity\Referentiel\Controle $controle
     * @return Operation
     */
    public function setControle(\AppBundle\Entity\Referentiel\Controle $controle = null)
    {
        $this->controle = $controle;
        return $this;
    }

    /**
     * Get controle
     *
     * @return \AppBundle\Entity\Referentiel\Controle 
     */
    public function getControle()
    {
        return $this->controle;
    }

    /**
     * Set dateHeureTraitement
     *
     * @param \DateTime $dateHeureTraitement
     * @return Operation
     */
    public function setDateHeureTraitement($dateHeureTraitement)
    {
        $this->dateHeureTraitement = $dateHeureTraitement;

        return $this;
    }

    /**
     * Get dateHeureTraitement
     *
     * @return \DateTime 
     */
    public function getDateHeureTraitement()
    {
        return $this->dateHeureTraitement;
    }
    
    /**
     * Set process
     *
     * @param string $process
     * @return Operation
     */
    public function setProcess($process)
    {
        $this->process = $process;

        return $this;
    }

    /**
     * Get process
     *
     * @return string 
     */
    public function getProcess()
    {
        return $this->process;
    }
    
    /**
     * Set commentaireControle
     *
     * @param string $commentaireControle
     * @return Operation
     */
    public function setCommentaireControle($commentaireControle)
    {
        $this->commentaireControle = $commentaireControle;

        return $this;
    }

    /**
     * Get commentaireControle
     *
     * @return string 
     */
    public function getCommentaireControle()
    {
        return $this->commentaireControle;
    }
}
