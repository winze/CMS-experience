<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Page
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\MenuRepository")
 */
class Menu {

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
     * Title affiche dans le menu à l'utilisateur
     * @MongoDB\String
     */
    protected $title;
    protected $alias;

    /**
     * @MongoDB\Int
     */
    protected $position = 1;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Menu",
     *     cascade="all"
     * )
     */
    protected $menuPatern;

    /**
     * @MongoDB\ReferenceMany(
     *     targetDocument="Winze\PageBuilderBundle\Document\Menu",
     *     cascade="all"
     * )
     */
    protected $menuChildren;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Page"
     * )
     */
    protected $page;

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
        $this->menuChildren = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * @MongoDB\PreUpdate 
     */
    public function preUpdated() {
        $this->updateAt = new \DateTime();
    }

    public function getAlias() {
        return $this->alias;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
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
     * @return Menu
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
     * Set title
     *
     * @param string $title
     * @return Menu
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
     * Set position
     *
     * @param int $position
     * @return Menu
     */
    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return int $position
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set menuPatern
     *
     * @param Winze\PageBuilderBundle\Document\Menu $menuPatern
     * @return Menu
     */
    public function setMenuPatern(\Winze\PageBuilderBundle\Document\Menu $menuPatern) {
        $this->menuPatern = $menuPatern;
        return $this;
    }

    /**
     * Get menuPatern
     *
     * @return Winze\PageBuilderBundle\Document\Menu $menuPatern
     */
    public function getMenuPatern() {
        return $this->menuPatern;
    }

    /**
     * Add menuChildren
     *
     * @param Winze\PageBuilderBundle\Document\Menu $menuChildren
     */
    public function addMenuChildren(\Winze\PageBuilderBundle\Document\Menu $menuChildren) {
        $this->menuChildren[] = $menuChildren;
        $menuChildren->setMenuPatern($this);
    }

    /**
     * Get menuChildren
     *
     * @return Doctrine\Common\Collections\Collection $menuChildren
     */
    public function getMenuChildren() {
        return $this->menuChildren;
    }

    /**
     * Set page
     *
     * @param Winze\PageBuilderBundle\Document\Page $page
     * @return Menu
     */
    public function setPage(\Winze\PageBuilderBundle\Document\Page $page) {
        $this->page = $page;
        return $this;
    }

    /**
     * Get page
     *
     * @return Winze\PageBuilderBundle\Document\Page $page
     */
    public function getPage() {
        return $this->page;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return Menu
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
     * @return Menu
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
     * @return Menu
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
     * @return Menu
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
