<?php

namespace AppBundle\Entity\Referentiel;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Controle
 *
 * @ORM\Table(name="controle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\ControleRepository")
 */
class Controle
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
     * @var int
     *
     * @ORM\Column(name="penalite", type="integer", nullable=true)
     */
    private $penalite;

    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="controle", cascade={"persist", "merge"})
     */
    private $operations;

    public function __construct() {
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
     * @return Controle
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
     * Set penalite
     *
     * @param integer $penalite
     * @return Controle
     */
    public function setPenalite($penalite)
    {
        $this->penalite = $penalite;

        return $this;
    }

    /**
     * Get penalite
     *
     * @return integer 
     */
    public function getPenalite()
    {
        return $this->penalite;
    }
    
    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Controle
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $operations->setControle($this);
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
