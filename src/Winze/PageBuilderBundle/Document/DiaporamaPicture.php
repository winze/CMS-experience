<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Diaporama
 *
 * @author Vincent
 * @MongoDB\Document(repositoryClass="Winze\PageBuilderBundle\Repository\DiaporamaPictureRepository")
 */
class DiaporamaPicture {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(
     *     targetDocument="Winze\PageBuilderBundle\Document\Diaporama",
     *     inversedBy="diaporamaPictures"
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
     * @MongoDB\Int
     */
    protected $position = 1;

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
     * Set diaporama
     *
     * @param Winze\PageBuilderBundle\Document\Diaporama $diaporama
     * @return DiaporamaPicture
     */
    public function setDiaporama(\Winze\PageBuilderBundle\Document\Diaporama $diaporama)
    {
        $this->diaporama = $diaporama;
        return $this;
    }

    /**
     * Get diaporama
     *
     * @return Winze\PageBuilderBundle\Document\Diaporama $diaporama
     */
    public function getDiaporama()
    {
        return $this->diaporama;
    }

    /**
     * Set picture
     *
     * @param Winze\PageBuilderBundle\Document\Picture $picture
     * @return DiaporamaPicture
     */
    public function setPicture(\Winze\PageBuilderBundle\Document\Picture $picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * Get picture
     *
     * @return Winze\PageBuilderBundle\Document\Picture $picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set position
     *
     * @param int $position
     * @return DiaporamaPicture
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return int $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set isActif
     *
     * @param boolean $isActif
     * @return DiaporamaPicture
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
     * @return DiaporamaPicture
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
     * @return DiaporamaPicture
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
     * @return DiaporamaPicture
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
