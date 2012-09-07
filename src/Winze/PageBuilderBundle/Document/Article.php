<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Article
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\ArticleRepository") 
 */
class Article {

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
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Diaporama",
     *      cascade="all"
     * )
     */
    protected $diaporama;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Picture",
     *      cascade="all"
     * )
     */
    protected $picture;

    /**
     * @MongoDB\String
     */
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $titleEn;

    /**
     * @MongoDB\String
     */
    protected $body;

    /**
     * @MongoDB\String
     */
    protected $bodyEn;

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

    /* -----------------------
     * GETTER & SETTER
     */

    public function getTitleEn() {
        return $this->titleEn;
    }

    public function setTitleEn($titleEn) {
        $this->titleEn = $titleEn;
        return $this;
    }

    public function getBodyEn() {
        return $this->bodyEn;
    }

    public function setBodyEn($bodyEn) {
        $this->bodyEn = $bodyEn;
        return $this;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setPicture($picture) {
        $this->picture = $picture;
        return $this;
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
     * Set contenu
     *
     * @param Winze\PageBuilderBundle\Document\Contenu $contenu
     * @return Article
     */
    public function setContenu(\Winze\PageBuilderBundle\Document\Contenu $contenu) {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * Get contenu
     *
     * @return Winze\PageBuilderBundle\Document\Contenu $contenu
     */
    public function getContenu() {
        return $this->contenu;
    }

    /**
     * Set diaporama
     *
     * @param Winze\PageBuilderBundle\Document\Diaporama $diaporama
     * @return Article
     */
    public function setDiaporama(\Winze\PageBuilderBundle\Document\Diaporama $diaporama) {
        $this->diaporama = $diaporama;
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
     * Set title
     *
     * @param string $title
     * @return Article
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
     * Set body
     *
     * @param string $body
     * @return Article
     */
    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

    /**
     * Get body
     *
     * @return string $body
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return Article
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
     * @return Article
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
     * @return Article
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
     * @return Article
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
