<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Article
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\FormRepository") 
 */
class Form {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Contenu"
     * )
     */
    protected $contenu;
    
    /**
     * @MongoDB\String
     */
    protected $name;
    
    /**
     * @MongoDB\String
     */
    protected $title;


    /**
     * @MongoDB\Boolean
     */
    protected $isActif;

    /**
     * Le rôle minimal pour accéder à la page
     * par défault All user
     * @MongoDB\Int
     */
    protected $roalRead;

    /**
     * @MongoDB\Date
     */
    protected $createdAt;

    /**
     * @MongoDB\Date
     */
    protected $updateAt;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenu
     *
     * @param Winze\PageBuilderBundle\Document\Contenu $contenu
     * @return Form
     */
    public function setContenu(\Winze\PageBuilderBundle\Document\Contenu $contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * Get contenu
     *
     * @return Winze\PageBuilderBundle\Document\Contenu $contenu
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Form
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Form
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return Form
     */
    public function setIsActif($isActif)
    {
        $this->isActif = $isActif;
        return $this;
    }

    /**
     * Get isActif
     *
     * @return boolean $isActif
     */
    public function getIsActif()
    {
        return $this->isActif;
    }

    /**
     * Set roalRead
     *
     * @param int $roalRead
     * @return Form
     */
    public function setRoalRead($roalRead)
    {
        $this->roalRead = $roalRead;
        return $this;
    }

    /**
     * Get roalRead
     *
     * @return int $roalRead
     */
    public function getRoalRead()
    {
        return $this->roalRead;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return Form
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updateAt
     *
     * @param date $updateAt
     * @return Form
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    /**
     * Get updateAt
     *
     * @return date $updateAt
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
