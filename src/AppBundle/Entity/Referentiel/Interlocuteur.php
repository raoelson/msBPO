<?php

namespace AppBundle\Entity\Referentiel;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Referentiel\Document;

/**
 * Interlocuteur
 *
 * @ORM\Table(name="interlocuteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\InterlocuteurRepository")
 */
class Interlocuteur
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
     * @var ArrayCollection Document $documents
     * @ORM\ManyToMany(targetEntity="Document", inversedBy="interlocuteurs", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="interlocuteur_document",
     *  joinColumns={@ORM\JoinColumn(name="interlocueteur_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="document_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"documentType" = "ASC"})
     */
    private $documents;
    
    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="interlocuteur", cascade={"persist", "merge"})
     */
    private $operations;
    
    public function __construct() {
        $this->documents = new ArrayCollection();
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
     * @return Interlocuteur
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
     * Add documents
     *
     * @param \AppBundle\Entity\Referentiel\Document $documents
     * @return Interlocuteur
     */
    public function addDocument(\AppBundle\Entity\Referentiel\Document $document)
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
        }

        return $this;
    }
    
    public function setDocuments($documents)
    {
        if ($documents instanceof ArrayCollection || is_array($documents)) {
            foreach ($documents as $document) {
                $this->addDocument($document);
            }
        }
        else if ($documents instanceof Document) {
            $this->addDocument($documents);
        }
        else {
            throw new Exception("$documents doit être une instance de Statut ou ArrayCollection");
        }
    }

    /**
     * Remove documents
     *
     * @param \AppBundle\Entity\Referentiel\Document $documents
     */
    public function removeDocument(\AppBundle\Entity\Referentiel\Document $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuemnts()
    {
        return $this->documents;
    }
    
    public function getDocumentsLibelle()
    {
        $listeLibelles = "";
        $sep = "";
        foreach ($this->documents as $document) {
            $listeLibelles .= $sep . $document->getDocumentType();
            $sep = ",";
        }
        return $listeLibelles;
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Interlocuteur
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $operations->setInterlocuteur($this);
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
