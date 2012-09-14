<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Diaporama
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\DiaporamaRepository")
 */
class Diaporama {

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
     *     targetDocument="Winze\PageBuilderBundle\Document\Article"
     * )
     */
    protected $article;

    /**
     * @MongoDB\ReferenceMany(
     *     targetDocument="Winze\PageBuilderBundle\Document\DiaporamaPicture",
     *     cascade="all",
     *     mappedBy="diaporama",
     *     sort={"position"=1}
     * )
     */
    protected $diaporamaPictures;

    /**
     * @MongoDB\String
     */
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $titleEn;

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
        $this->diaporamaPictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Fontion qui permet de savoir si l'image est associé au diaporama
     * @param string $id
     * @return boolean
     */
    public function isExist($id) {
        if (count($this->getDiaporamaPictures()) > 0) {
            foreach ($this->getDiaporamaPictures() as $key => $diaporamaPicture) {
                if ($diaporamaPicture->getId() == $id) {
                    return $key;
                }
            }
        }
        return false;
    }

    /**
     * Fonction de suppression d'une image d'un diaporama
     * @param string $id Id du contenu à supprimer
     * @return boolean/Winze\PageBuilderBundle\Document\Contenu Retourn false si les contenu n'est pas associé
     *                      à la page sinon retourne l'objet contenu
     */
    public function removePicture($id) {
        $key = $this->isExist($id);
        if ($key === false) {
            return false;
        }

        $diaporamaPicture = $this->diaporamaPictures[$key];
        unset($this->diaporamaPictures[$key]);
        return $diaporamaPicture;
    }

    /* ------------------------
     * GETTER & SETTER
     */

    public function getTitleEn() {
        return $this->titleEn;
    }

    public function setTitleEn($titleEn) {
        $this->titleEn = $titleEn;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
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
     * @return Diaporama
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
     * Set article
     *
     * @param Winze\PageBuilderBundle\Document\Article $article
     * @return Diaporama
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
     * Add diaporamaPictures
     *
     * @param Winze\PageBuilderBundle\Document\DiaporamaPicture $diaporamaPictures
     */
    public function addDiaporamaPictures(\Winze\PageBuilderBundle\Document\DiaporamaPicture $diaporamaPictures) {
        $this->diaporamaPictures[] = $diaporamaPictures;
        $diaporamaPictures->setDiaporama($this);
    }

    /**
     * Get diaporamaPictures
     *
     * @return Doctrine\Common\Collections\Collection $diaporamaPictures
     */
    public function getDiaporamaPictures() {
        return $this->diaporamaPictures;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return Diaporama
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
     * @return Diaporama
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
     * @return Diaporama
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
     * @return Diaporama
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
