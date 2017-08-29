<?php

namespace AppBundle\Entity\Referentiel;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Referentiel\Interlocuteur;

/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\DocumentRepository")
 */
class Document
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
     * @ORM\Column(name="document_type", type="string", length=255, unique=true)
     */
    private $documentType;
    
    /**
     * @var ArrayCollection Interlocuteur $interlocuteurs
     * @ORM\ManyToMany(targetEntity="Interlocuteur", mappedBy="documents", cascade={"persist", "merge"})
     */
    private $interlocuteurs;
    
    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="document", cascade={"persist", "merge"})
     */
    private $operations;
    
    public function __construct() {
        $this->interlocuteurs = new ArrayCollection();
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
     * Set documentType
     *
     * @param string $documentType
     * @return Document
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get documentType
     *
     * @return string 
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }
    
    /**
     * Add interlocuteurs
     *
     * @param \AppBundle\Entity\Referentiel\Interlocuteur $interlocuteurs
     * @return Document
     */
    public function addInterlocuteur(\AppBundle\Entity\Referentiel\Interlocuteur $interlocuteur)
    {
        if (!$this->interlocuteurs->contains($interlocuteur)) {
            if (!$interlocuteur->getDocuemnts()->contains($this)) {
                $interlocuteur->addDocument($this);
            }
            $this->interlocuteurs->add($interlocuteur);
        }

        return $this;
    }
    
    public function setInterlocuteur($interlocuteurs)
    {
        if ($interlocuteurs instanceof ArrayCollection || is_array($interlocuteurs)) {
            foreach ($interlocuteurs as $interlocuteur) {
                $this->addInterlocuteur($interlocuteur);
            }
        }
        else if ($interlocuteurs instanceof Interlocuteur) {
            $this->addInterlocuteur($interlocuteurs);
        }
        else {
            throw new Exception("$interlocuteurs doit être une instance de Interlocuteur ou ArrayCollection");
        }
    }

    /**
     * Remove interlocuteurs
     *
     * @param \AppBundle\Entity\Referentiel\Interlocuteur $interlocuteurs
     */
    public function removeInterlocuteurs(\AppBundle\Entity\Referentiel\Interlocuteur $interlocuteurs)
    {
        $this->interlocuteurs->removeElement($interlocuteurs);
    }

    /**
     * Get interlocuteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInterlocuteurs()
    {
        return $this->interlocuteurs;
    }

    /**
     * Remove interlocuteurs
     *
     * @param \AppBundle\Entity\Referentiel\Interlocuteur $interlocuteurs
     */
    public function removeInterlocuteur(\AppBundle\Entity\Referentiel\Interlocuteur $interlocuteurs)
    {
        $this->interlocuteurs->removeElement($interlocuteurs);
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Document
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $operations->setDocument($this);
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
