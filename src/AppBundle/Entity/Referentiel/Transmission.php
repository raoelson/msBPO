<?php

namespace AppBundle\Entity\Referentiel;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Transmission
 *
 * @ORM\Table(name="transmission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\TransmissionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Transmission {

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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="transmission", cascade={"persist", "merge"})
     */
    private $operations;

    /**
     * @var ArrayCollection TypeAction $typeActions
     * @ORM\ManyToMany(targetEntity="TypeAction", mappedBy="transmissions", cascade={"persist", "merge"})
     */
    private $typeActions;

    public function __construct() {
        $this->operations = new ArrayCollection();
        $this->typeActions = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Transmission
     */
    public function setLibelle($libelle) {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle() {
        return $this->libelle;
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Transmission
     */
    public function addOperation(\AppBundle\Entity\Operation $operations) {
        $operations->setTransmission($this);
        $this->operations[] = $operations;

        return $this;
    }

    /**
     * Remove operations
     *
     * @param \AppBundle\Entity\Operation $operations
     */
    public function removeOperation(\AppBundle\Entity\Operation $operations) {
        $this->operations->removeElement($operations);
    }

    /**
     * Get operations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperations() {
        return $this->operations;
    }

    /**
     * Add typeActions
     *
     * @param \AppBundle\Entity\Referentiel\TypeAction $typeActions
     * @return Transmission
     */
    public function addTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeActions) {
        if (!$this->typeActions->contains($typeActions)) {
            if (!$typeActions->getTransmissions()->contains($this)) {
                $typeActions->addTransmission($this);
            }
            $this->typeActions->add($typeActions);
        }

        return $this;
    }

    /**
     * Remove typeActions
     *
     * @param \AppBundle\Entity\Referentiel\TypeAction $typeActions
     */
    public function removeTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeActions) {
        $this->typeActions->removeElement($typeActions);
    }

    /**
     * Get typeActions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeActions() {
        return $this->typeActions;
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

}
