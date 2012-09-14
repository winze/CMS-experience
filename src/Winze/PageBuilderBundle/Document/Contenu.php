<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Contenu
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\ContenuRepository")
 */
class Contenu {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Page",
     *     inversedBy="contenus"
     * )
     */
    protected $page;

    /**
     * @MongoDB\Int
     */
    protected $position = 1;

    /**
     * @MongoDB\String
     */
    protected $style;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Article",
     *      cascade="all"
     * )
     */
    protected $article;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Diaporama",
     *      cascade="all"
     * )
     */
    protected $diaporama;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Form",
     *      cascade="all"
     * )
     */
    protected $form;

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
    public function getId() {
        return $this->id;
    }

    /**
     * Set page
     *
     * @param Winze\PageBuilderBundle\Document\Page $page
     * @return Contenu
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
     * Set position
     *
     * @param int $position
     * @return Contenu
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
     * Set style
     *
     * @param string $style
     * @return Contenu
     */
    public function setStyle($style) {
        $this->style = $style;
        return $this;
    }

    /**
     * Get style
     *
     * @return string $style
     */
    public function getStyle() {
        return $this->style;
    }

    /**
     * Set article
     *
     * @param Winze\PageBuilderBundle\Document\Article $article
     * @return Contenu
     */
    public function setArticle(\Winze\PageBuilderBundle\Document\Article $article) {
        $this->article = $article;
        return $this;
    }

    /**
     * Get article
     *
     * @return Winze\PageBuilderBundle\Document\Article $article
     */
    public function getArticle() {
        return $this->article;
    }

    /**
     * Set diaporama
     *
     * @param Winze\PageBuilderBundle\Document\Diaporama $diaporama
     * @return Contenu
     */
    public function setDiaporama(\Winze\PageBuilderBundle\Document\Diaporama $diaporama) {
        $this->diaporama = $diaporama;
        $diaporama->setContenu($this);
        return $this;
    }

    /**
     * Get diaporama
     *
     * @return Winze\PageBuilderBundle\Document\Diaporama $diaporama
     */
    public function getDiaporama() {
        return $this->diaporama;
    }

    /**
     * Set form
     *
     * @param Winze\PageBuilderBundle\Document\Form $form
     * @return Contenu
     */
    public function setForm(\Winze\PageBuilderBundle\Document\Form $form) {
        $this->form = $form;
        return $this;
    }

    /**
     * Get form
     *
     * @return Winze\PageBuilderBundle\Document\Form $form
     */
    public function getForm() {
        return $this->form;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return Contenu
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
     * @return Contenu
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
     * @return Contenu
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
     * @return Contenu
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
