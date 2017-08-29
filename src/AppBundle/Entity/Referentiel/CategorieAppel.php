<?php

namespace AppBundle\Entity\Referentiel;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Referentiel\TypeAction;

/**
 * CategorieAppel
 *
 * @ORM\Table(name="categorie_appel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\CategorieAppelRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CategorieAppel
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="datetime")
     */
    private $dateModification;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSuppression", type="datetime", nullable=true)
     */
    private $dateSuppression;
    
    /**
     * @var ArrayCollection TypeAction $typeActions
     * @ORM\ManyToMany(targetEntity="TypeAction", mappedBy="categories", cascade={"persist", "merge"})
     */
    private $typeActions;
    
    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="categorieAppel", cascade={"persist", "merge"})
     */
    private $operations;
    
    public function __construct() {
        $this->dateCreation = new \DateTime();
        $this->dateModification = new \DateTime();
        $this->typeActions = new ArrayCollection();
        $this->operations = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return CategorieAppel
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return CategorieAppel
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return CategorieAppel
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set dateSuppression
     *
     * @param \DateTime $dateSuppression
     * @return CategorieAppel
     */
    public function setDateSuppression($dateSuppression)
    {
        $this->dateSuppression = $dateSuppression;

        return $this;
    }

    /**
     * Get dateSuppression
     *
     * @return \DateTime 
     */
    public function getDateSuppression()
    {
        return $this->dateSuppression;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function edited()
    {
        $this->dateCreation = new \DateTime();
    }
    
    /**
     * Add typeActions
     *
     * @param \AppBundle\Entity\Referentiel\TypeAction $typeActions
     * @return Statut
     */
    public function addTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeActions)
    {
        if (!$this->typeActions->contains($typeActions)) {
            if (!$typeActions->getCategories()->contains($this)) {
                $typeActions->addCategorie($this);
            }
            $this->typeActions->add($typeActions);
        }

        return $this;
    }
    
    public function setTypeActions($typeActions)
    {
        if ($typeActions instanceof ArrayCollection || is_array($typeActions)) {
            foreach ($typeActions as $typeAction) {
                $this->addTypeAction($typeAction);
            }
        }
        else if ($typeActions instanceof TypeAction) {
            $this->addTypeAction($typeActions);
        }
        else {
            throw new Exception("$typeActions doit être une instance de TypeAction ou ArrayCollection");
        }
    }

    /**
     * Remove typeActions
     *
     * @param \AppBundle\Entity\Referentiel\TypeAction $typeActions
     */
    public function removeTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeActions)
    {
        $this->typeActions->removeElement($typeActions);
    }

    /**
     * Get typeActions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeActions()
    {
        return $this->typeActions;
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return CategorieAppel
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $operations->setCategorieAppel($this);
        $this->operations[] = $operations;

        return $this;
    }

    /**
     * Remove operations
     *
     * @param \AppBundle\Entity\Operation $operations
     */
    public function removeOperation(\AppBundle\Entity\Operation $operations)
    {
        $this->operations->removeElement($operations);
    }

    /**
     * Get operations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperations()
    {
        return $this->operations;
    }
}
