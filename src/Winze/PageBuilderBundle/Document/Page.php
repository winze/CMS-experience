<?php

namespace Winze\PageBuilderBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * Description of Page
 *
 * @author Vincent
 * @MongoDB\Document
 */
class Page {
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

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
     * Set name
     *
     * @param string $name
     * @return Page
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
}
