<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Winze\PageBuilderBundle\Service\String;

/**
 * Description of Picture
 *
 * @author Vincent
 * @MongoDB\Document
 */
class Picture {

    const IMG_WIDTH_MINI = 40;
    const IMG_HEIGTH_MINI = 40;
    const IMG_WIDTH_MEDIUM = 250;
    const IMG_HEIGTH_MEDIUM = 250;
    const IMG_WIDTH_LARGE = 600;
    const IMG_HEIGTH_LARGE = 600;

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $path;
    // a property used temporarily while deleting
    private $filenameForRemove;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = String::sluggify($path);
    }

    public function getFilenameForRemove() {
        return $this->filenameForRemove;
    }

    public function setFilenameForRemove($filenameForRemove) {
        $this->filenameForRemove = $filenameForRemove;
    }

    public function getWebPath() {
        $UploadRootDir = $this->getUploadDir() . $this->getFileDir();
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    public function getSrc() {
        $UploadDir = '/' . $this->getUploadDir() . $this->getFileDir();
        return null === $this->path ? null : $UploadDir . '/' . String::sluggify($this->name) . '_' . $this->id . '.' . $this->path;
    }

    public function getMiniSrc() {
        $UploadDir = '/' . $this->getUploadDir() . $this->getFileDir();
        return null === $this->path ? null : $UploadDir . '/' . String::sluggify($this->name) . '_' . $this->id . '_mini.' . $this->path;
    }

    public function getMediumSrc() {
        $UploadDir = '/' . $this->getUploadDir() . $this->getFileDir();
        return null === $this->path ? null : $UploadDir . '/' . String::sluggify($this->name) . '_' . $this->id . '_medium.' . $this->path;
    }

    public function getLargeSrc() {
        $UploadDir = '/' . $this->getUploadDir() . $this->getFileDir();
        return null === $this->path ? null : $UploadDir . '/' . String::sluggify($this->name) . '_' . $this->id . '_large.' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir()

        ;
    }

    public function getFileDir() {
        return DIRECTORY_SEPARATOR . $this->id[3]
                . DIRECTORY_SEPARATOR . $this->id[4]
                . DIRECTORY_SEPARATOR . $this->id[5]
                . DIRECTORY_SEPARATOR . $this->id[6]
                . DIRECTORY_SEPARATOR . $this->id
        ;
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }

    /**
     * @MongoDB\PrePersist()
     * @MongoDB\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->file) {
            $this->path = $this->file->guessExtension();
        }
    }

    /**
     * @MongoDB\PostPersist()
     * @MongoDB\PostUpdate()
     */
    public function upload() {
        if (null === $this->file) {
            return;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $UploadRootDir = $this->getUploadRootDir() . $this->getFileDir();
        $filename = $UploadRootDir . DIRECTORY_SEPARATOR . String::sluggify($this->name) . '_' . $this->id . '.' . $this->file->guessExtension();
        $filename_mini = $UploadRootDir . DIRECTORY_SEPARATOR . String::sluggify($this->name) . '_' . $this->id . '_mini.' . $this->file->guessExtension();
        $filename_medium = $UploadRootDir . DIRECTORY_SEPARATOR . String::sluggify($this->name) . '_' . $this->id . '_medium.' . $this->file->guessExtension();
        $filename_large = $UploadRootDir . DIRECTORY_SEPARATOR . String::sluggify($this->name) . '_' . $this->id . '_large.' . $this->file->guessExtension();
        $this->file->move($UploadRootDir, String::sluggify($this->name) . '_' . $this->id . '.' . $this->file->guessExtension());
        /*
         * On vient créer plusiseurs images de taille différente.
         * les miniatures, les moyennes et les full
         */
        if (file_exists($filename)) {
            $thumb = new \Imagick();
            /*
             * Image mini
             */
            $thumb->readImage($filename);
            $thumb->scaleImage(self::IMG_WIDTH_MINI, self::IMG_HEIGTH_MINI, true);
            $thumb->writeImage($filename_mini);
            $thumb->clear();
            $thumb->destroy();
            /*
             * Image medium
             */
            $thumb->readImage($filename);
            $thumb->scaleImage(self::IMG_WIDTH_MEDIUM, self::IMG_HEIGTH_MEDIUM, true);
            $thumb->writeImage($filename_medium);
            $thumb->clear();
            $thumb->destroy();
            /*
             * Image large
             */
            $thumb->readImage($filename);
            $thumb->scaleImage(self::IMG_WIDTH_LARGE, self::IMG_HEIGTH_LARGE, true);
            $thumb->writeImage($filename_large);
            $thumb->clear();
            $thumb->destroy();
        }
        unset($this->file);
    }

    /**
     * @MongoDB\PreRemove()
     */
    public function storeFilenameForRemove() {
        $this->filenameForRemove = $this->getAbsolutePath();
    }

    /**
     * @MongoDB\PostRemove()
     */
    public function removeUpload() {
        if ($this->filenameForRemove) {
            unlink($this->filenameForRemove);
        }
    }

    public function getAbsolutePath() {
        $UploadRootDir = $this->getUploadRootDir() . $this->getFileDir();
        return null === $this->path ? null : $UploadRootDir . '/' . String::sluggify($this->name) . '_' . $this->id . '.' . $this->path;
    }

}