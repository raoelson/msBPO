<?php

namespace Proxies\__CG__\AppBundle\Entity\Referentiel;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CategorieAppel extends \AppBundle\Entity\Referentiel\CategorieAppel implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'id', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'libelle', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'dateCreation', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'dateModification', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'dateSuppression', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'typeActions', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'operations');
        }

        return array('__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'id', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'libelle', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'dateCreation', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'dateModification', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'dateSuppression', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'typeActions', '' . "\0" . 'AppBundle\\Entity\\Referentiel\\CategorieAppel' . "\0" . 'operations');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CategorieAppel $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setLibelle($libelle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLibelle', array($libelle));

        return parent::setLibelle($libelle);
    }

    /**
     * {@inheritDoc}
     */
    public function getLibelle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLibelle', array());

        return parent::getLibelle();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateCreation($dateCreation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateCreation', array($dateCreation));

        return parent::setDateCreation($dateCreation);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateCreation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateCreation', array());

        return parent::getDateCreation();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateModification($dateModification)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateModification', array($dateModification));

        return parent::setDateModification($dateModification);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateModification()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateModification', array());

        return parent::getDateModification();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateSuppression($dateSuppression)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateSuppression', array($dateSuppression));

        return parent::setDateSuppression($dateSuppression);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateSuppression()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateSuppression', array());

        return parent::getDateSuppression();
    }

    /**
     * {@inheritDoc}
     */
    public function edited()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'edited', array());

        return parent::edited();
    }

    /**
     * {@inheritDoc}
     */
    public function addTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeActions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTypeAction', array($typeActions));

        return parent::addTypeAction($typeActions);
    }

    /**
     * {@inheritDoc}
     */
    public function setTypeActions($typeActions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTypeActions', array($typeActions));

        return parent::setTypeActions($typeActions);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTypeAction(\AppBundle\Entity\Referentiel\TypeAction $typeActions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTypeAction', array($typeActions));

        return parent::removeTypeAction($typeActions);
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeActions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeActions', array());

        return parent::getTypeActions();
    }

    /**
     * {@inheritDoc}
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOperation', array($operations));

        return parent::addOperation($operations);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOperation(\AppBundle\Entity\Operation $operations)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOperation', array($operations));

        return parent::removeOperation($operations);
    }

    /**
     * {@inheritDoc}
     */
    public function getOperations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOperations', array());

        return parent::getOperations();
    }

}
