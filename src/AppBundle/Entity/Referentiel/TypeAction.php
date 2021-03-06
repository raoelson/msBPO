<?php

namespace AppBundle\Entity\Referentiel;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Referentiel\Statut;
use AppBundle\Entity\Referentiel\CategorieAppel;

/**
 * TypeAction
 *
 * @ORM\Table(name="type_action")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\TypeActionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class TypeAction
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
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime")
     */
    private $dateModification;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_suppression", type="datetime", nullable=true)
     */
    private $dateSuppression;
    
    /**
     * @var ArrayCollection Statut $statuts
     * @ORM\ManyToMany(targetEntity="Statut", inversedBy="typeActions", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="type_action_statut",
     *  joinColumns={@ORM\JoinColumn(name="type_action_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="statut_id", referencedColumnName="id")}
     * )
     */
    private $statuts;
    
    /**
     * @var ArrayCollection CategorieAppel $categories
     * @ORM\ManyToMany(targetEntity="CategorieAppel", inversedBy="typeActions", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="type_action_categorie_appel",
     *  joinColumns={@ORM\JoinColumn(name="type_action_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="categorie_appel_id", referencedColumnName="id")}
     * )
     */
    private $categories;
    
    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="typeAction", cascade={"persist", "merge"})
     */
    private $operations;
    
    /**
     * @var ArrayCollection Transmission $transmissions
     * @ORM\ManyToMany(targetEntity="Transmission", inversedBy="typeActions", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="type_action_transmission",
     *  joinColumns={@ORM\JoinColumn(name="type_action_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="transmission_id", referencedColumnName="id")}
     * )
     */
    private $transmissions;


    public function __construct() {
        $this->dateCreation = new \DateTime();
        $this->dateModification = new \DateTime();
        $this->statuts = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->operations = new ArrayCollection();
        $this->transmissions = new ArrayCollection();
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
     * @return TypeAction
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
     * @return TypeAction
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
     * @return TypeAction
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
     * @return TypeAction
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
     * Add statuts
     *
     * @param \AppBundle\Entity\Referentiel\Statut $statuts
     * @return TypeAction
     */
    public function addStatuts(\AppBundle\Entity\Referentiel\Statut $statuts)
    {
        if (!$this->statuts->contains($statuts)) {
            $this->statuts->add($statuts);
        }

        return $this;
    }
    
    public function setStatuts($statuts)
    {
        if ($statuts instanceof ArrayCollection || is_array($statuts)) {
            foreach ($statuts as $statut) {
                $this->addStatuts($statut);
            }
        }
        else if ($statuts instanceof Statut) {
            $this->addStatuts($statuts);
        }
        else {
            throw new Exception("$statuts doit être une instance de Statut ou ArrayCollection");
        }
    }

    /**
     * Remove statuts
     *
     * @param \AppBundle\Entity\Referentiel\Statut $statuts
     */
    public function removeStatuts(\AppBundle\Entity\Referentiel\Statut $statuts)
    {
        $this->statuts->removeElement($statuts);
    }

    /**
     * Get statuts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatuts()
    {
        return $this->statuts;
    }
    
    public function getStatutsLibelle()
    {
        $listeLibelles = "";
        $sep = "";
        foreach ($this->statuts as $statut) {
            $listeLibelles .= $sep . $statut->getLibelle();
            $sep = ",";
        }
        return $listeLibelles;
    }
    
    /**
     * Add categories
     *
     * @param \AppBundle\Entity\Referentiel\CategorieAppel $categories
     * @return TypeAction
     */
    public function addCategorie(\AppBundle\Entity\Referentiel\CategorieAppel $categories)
    {
        if (!$this->categories->contains($categories)) {
            $this->categories->add($categories);
        }

        return $this;
    }
    
    public function setCategorie($categories)
    {
        if ($categories instanceof ArrayCollection || is_array($categories)) {
            foreach ($categories as $categorie) {
                $this->addCategorie($categorie);
            }
        }
        else if ($categories instanceof CategorieAppel) {
            $this->addCategorie($categories);
        }
        else {
            throw new Exception("$categories doit être une instance de CategorieAppel ou ArrayCollection");
        }
    }

    /**
     * Remove categories
     *
     * @param \AppBundle\Entity\Referentiel\CategorieAppel $categories
     */
    public function removeCategories(\AppBundle\Entity\Referentiel\CategorieAppel $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    public function getCategoriesLibelle()
    {
        $listeLibelles = "";
        $sep = "";
        foreach ($this->categories as $categorie) {
            $listeLibelles .= $sep . $categorie->getLibelle();
            $sep = ",";
        }
        return $listeLibelles;
    }

    /**
     * Add statuts
     *
     * @param \AppBundle\Entity\Referentiel\Statut $statuts
     * @return TypeAction
     */
    public function addStatut(\AppBundle\Entity\Referentiel\Statut $statuts)
    {
        $this->statuts[] = $statuts;

        return $this;
    }

    /**
     * Remove statuts
     *
     * @param \AppBundle\Entity\Referentiel\Statut $statuts
     */
    public function removeStatut(\AppBundle\Entity\Referentiel\Statut $statuts)
    {
        $this->statuts->removeElement($statuts);
    }

    /**
     * Add categories
     *
     * @param \AppBundle\Entity\Referentiel\CategorieAppel $categories
     * @return TypeAction
     */
    public function addCategory(\AppBundle\Entity\Referentiel\CategorieAppel $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \AppBundle\Entity\Referentiel\CategorieAppel $categories
     */
    public function removeCategory(\AppBundle\Entity\Referentiel\CategorieAppel $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return TypeAction
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
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

    /**
     * Add transmissions
     *
     * @param \AppBundle\Entity\Referentiel\Transmission $transmissions
     * @return TypeAction
     */
    public function addTransmission(\AppBundle\Entity\Referentiel\Transmission $transmissions)
    {
         if (!$this->transmissions->contains($transmissions)) {
            $this->transmissions->add($transmissions);
        }

        return $this;
    }

    /**
     * Remove transmissions
     *
     * @param \AppBundle\Entity\Referentiel\Transmission $transmissions
     */
    public function removeTransmission(\AppBundle\Entity\Referentiel\Transmission $transmissions)
    {
        $this->transmissions->removeElement($transmissions);
    }

    /**
     * Get transmissions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransmissions()
    {
        return $this->transmissions;
    }
    
      public function getTransmissionsLibelle()
    {
        $listeLibelles = "";
        $sep = "";
        foreach ($this->transmissions as $trans) {
            $listeLibelles .= $sep . $trans->getLibelle();
            $sep = ",";
        }
        return $listeLibelles;
    }
    
     public function setTransmissions($transmissions)
    {
        if ($transmissions instanceof ArrayCollection || is_array($transmissions)) {
            foreach ($transmissions as $trans) {
                $this->addTransmission($trans);
            }
        }
        else if ($transmissions instanceof Transmission) {
            $this->addTransmission($transmissions);
        }
        else {
            throw new Exception("$transmissions doit être une instance de Statut ou ArrayCollection");
        }
    }
}
