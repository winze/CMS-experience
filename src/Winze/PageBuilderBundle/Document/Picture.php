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
        $UploadRootDir = $this->getUploadDir()
                . DIRECTORY_SEPARATOR . $this->id[0]
                . DIRECTORY_SEPARATOR . $this->id[1]
                . DIRECTORY_SEPARATOR . $this->id[2]
                . DIRECTORY_SEPARATOR . $this->id[3];
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    public function getSrc() {
        $UploadDir = '/' . $this->getUploadDir()
                . DIRECTORY_SEPARATOR . $this->id[0]
                . DIRECTORY_SEPARATOR . $this->id[1]
                . DIRECTORY_SEPARATOR . $this->id[2]
                . DIRECTORY_SEPARATOR . $this->id[3];
        return null === $this->path ? null : $UploadDir . '/' . String::sluggify($this->name) . '_' . $this->id . '.' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir()

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
        $UploadRootDir = $this->getUploadRootDir()
                . DIRECTORY_SEPARATOR . $this->id[0]
                . DIRECTORY_SEPARATOR . $this->id[1]
                . DIRECTORY_SEPARATOR . $this->id[2]
                . DIRECTORY_SEPARATOR . $this->id[3];
        $this->file->move($UploadRootDir, String::sluggify($this->name) . '_' . $this->id . '.' . $this->file->guessExtension());

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
        $UploadRootDir = $this->getUploadRootDir()
                . DIRECTORY_SEPARATOR . $this->id[0]
                . DIRECTORY_SEPARATOR . $this->id[1]
                . DIRECTORY_SEPARATOR . $this->id[2]
                . DIRECTORY_SEPARATOR . $this->id[3];
        return null === $this->path ? null : $UploadRootDir . '/' . String::sluggify($this->name) . '_' . $this->id . '.' . $this->path;
    }

}