<?php

namespace AppBundle\Entity\Referentiel;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cabinet
 *
 * @ORM\Table(name="cabinet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Referentiel\CabinetRepository")
 */
class Cabinet
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
     * @ORM\Column(name="numero", type="string", length=255, unique=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255, nullable=true)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=5, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="standard_phone", type="string", length=32, nullable=true)
     */
    private $numeroStdPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne_rouge", type="string", length=32, nullable=true)
     */
    private $numeroLgRouge;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=32, nullable=true)
     */
    private $numeroFax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="permanence_telephonique", type="text", nullable=true)
     */
    private $permanencePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="permanence_expert", type="text", nullable=true)
     */
    private $permanenceExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe_expert", type="text", nullable=true)
     */
    private $equipeExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe_assistante", type="text", nullable=true)
     */
    private $equipeAssistante;
    
    /**
     * @var ArrayCollection $operations
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Operation", mappedBy="cabinet", cascade={"persist", "merge"})
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
     * Set numero
     *
     * @param string $numero
     * @return Cabinet
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Cabinet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Cabinet
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Cabinet
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Cabinet
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set numeroStdPhone
     *
     * @param string $numeroStdPhone
     * @return Cabinet
     */
    public function setNumeroStdPhone($numeroStdPhone)
    {
        $this->numeroStdPhone = $numeroStdPhone;

        return $this;
    }

    /**
     * Get numeroStdPhone
     *
     * @return string 
     */
    public function getNumeroStdPhone()
    {
        return $this->numeroStdPhone;
    }

    /**
     * Set numeroLgRouge
     *
     * @param string $numeroLgRouge
     * @return Cabinet
     */
    public function setNumeroLgRouge($numeroLgRouge)
    {
        $this->numeroLgRouge = $numeroLgRouge;

        return $this;
    }

    /**
     * Get numeroLgRouge
     *
     * @return string 
     */
    public function getNumeroLgRouge()
    {
        return $this->numeroLgRouge;
    }

    /**
     * Set numeroFax
     *
     * @param string $numeroFax
     * @return Cabinet
     */
    public function setNumeroFax($numeroFax)
    {
        $this->numeroFax = $numeroFax;

        return $this;
    }

    /**
     * Get numeroFax
     *
     * @return string 
     */
    public function getNumeroFax()
    {
        return $this->numeroFax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Cabinet
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set permanencePhone
     *
     * @param string $permanencePhone
     * @return Cabinet
     */
    public function setPermanencePhone($permanencePhone)
    {
        $this->permanencePhone = $permanencePhone;

        return $this;
    }

    /**
     * Get permanencePhone
     *
     * @return string 
     */
    public function getPermanencePhone()
    {
        return $this->permanencePhone;
    }

    /**
     * Set permanenceExpert
     *
     * @param string $permanenceExpert
     * @return Cabinet
     */
    public function setPermanenceExpert($permanenceExpert)
    {
        $this->permanenceExpert = $permanenceExpert;

        return $this;
    }

    /**
     * Get permanenceExpert
     *
     * @return string 
     */
    public function getPermanenceExpert()
    {
        return $this->permanenceExpert;
    }

    /**
     * Set equipeExpert
     *
     * @param string $equipeExpert
     * @return Cabinet
     */
    public function setEquipeExpert($equipeExpert)
    {
        $this->equipeExpert = $equipeExpert;

        return $this;
    }

    /**
     * Get equipeExpert
     *
     * @return string 
     */
    public function getEquipeExpert()
    {
        return $this->equipeExpert;
    }

    /**
     * Set equipeAssistante
     *
     * @param string $equipeAssistante
     * @return Cabinet
     */
    public function setEquipeAssistante($equipeAssistante)
    {
        $this->equipeAssistante = $equipeAssistante;

        return $this;
    }

    /**
     * Get equipeAssistante
     *
     * @return string 
     */
    public function getEquipeAssistante()
    {
        return $this->equipeAssistante;
    }

    /**
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return Cabinet
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
        $operations->setCabinet($this);
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
    
    public function getDatas()
    {
        return $this->numero . "##" . $this->nom . "##" . $this->rue . "##"
                . $this->codePostal. "##" . $this->ville . "##" . $this->email
                . "##" . $this->numeroStdPhone . "##" . $this->numeroLgRouge
                . "##" . $this->numeroFax . "##" . $this->permanencePhone
                . "##" . $this->permanenceExpert . "##" . $this->equipeExpert
                . "##" . $this->equipeAssistante. "##" . $this->id;
    }
}
