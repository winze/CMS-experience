<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Page
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\PageRepository")
 * 
 */
class Page {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * Nom de la page pour l'administrateur
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Page"
     * )
     */
    protected $pagePatern;

    /**
     * @MongoDB\ReferenceMany(
     *     targetDocument="Winze\PageBuilderBundle\Document\Page",
     *     cascade="all"
     * )
     */
    protected $pageChildren;

    /**
     * Alias de la page pour l'url rewriting
     * par défault l'alias sera un url_encode {titles_parent}/{title}
     * @MongoDB\String
     */
    protected $alias;

    /**
     * Titre de la page afficher dans le <title>
     * @MongoDB\String
     */
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $metaData;

    /**
     * @MongoDB\String
     */
    protected $metaDescription;

    /**
     * @MongoDB\String
     */
    protected $metaKey;

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


    public function __construct() {
        $this->pageChildren = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
    }
    
    /**
     * @MongoDB\PreUpdate 
     */
    public function preUpdated() {
        $this->updateAt = new \DateTime();
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Page
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set pagePatern
     *
     * @param Winze\PageBuilderBundle\Document\Page $pagePatern
     * @return Page
     */
    public function setPagePatern(\Winze\PageBuilderBundle\Document\Page $pagePatern) {
        $this->pagePatern = $pagePatern;
        return $this;
    }

    /**
     * Get pagePatern
     *
     * @return Winze\PageBuilderBundle\Document\Page $pagePatern
     */
    public function getPagePatern() {
        return $this->pagePatern;
    }

    /**
     * Add pageChildren
     *
     * @param Winze\PageBuilderBundle\Document\Page $pageChildren
     */
    public function addPageChildren(\Winze\PageBuilderBundle\Document\Page $pageChildren) {
        $this->pageChildren[] = $pageChildren;
        $pageChildren->setPagePatern($this);
    }

    /**
     * Get pageChildren
     *
     * @return Doctrine\Common\Collections\Collection $pageChildren
     */
    public function getPageChildren() {
        return $this->pageChildren;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Page
     */
    public function setAlias($alias) {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Get alias
     *
     * @return string $alias
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set metaData
     *
     * @param string $metaData
     * @return Page
     */
    public function setMetaData($metaData) {
        $this->metaData = $metaData;
        return $this;
    }

    /**
     * Get metaData
     *
     * @return string $metaData
     */
    public function getMetaData() {
        return $this->metaData;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Page
     */
    public function setMetaDescription($metaDescription) {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string $metaDescription
     */
    public function getMetaDescription() {
        return $this->metaDescription;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     * @return Page
     */
    public function setMetaKey($metaKey) {
        $this->metaKey = $metaKey;
        return $this;
    }

    /**
     * Get metaKey
     *
     * @return string $metaKey
     */
    public function getMetaKey() {
        return $this->metaKey;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return Page
     */
    public function setIsActif($isActif) {
        $this->isActif = $isActif;
        return $this;
    }

    /**
     * Get isActif
     *
     * @return boolean $isActif
     */
    public function getIsActif() {
        return $this->isActif;
    }

    /**
     * Set roalRead
     *
     * @param int $roalRead
     * @return Page
     */
    public function setRoalRead($roalRead) {
        $this->roalRead = $roalRead;
        return $this;
    }

    /**
     * Get roalRead
     *
     * @return int $roalRead
     */
    public function getRoalRead() {
        return $this->roalRead;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return Page
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updateAt
     *
     * @param date $updateAt
     * @return Page
     */
    public function setUpdateAt($updateAt) {
        $this->updateAt = $updateAt;
        return $this;
    }

    /**
     * Get updateAt
     *
     * @return date $updateAt
     */
    public function getUpdateAt() {
        return $this->updateAt;
    }

}
