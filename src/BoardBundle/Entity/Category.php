<?php

namespace BoardBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="BoardBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\OneToMany(targetEntity="Announcement", mappedBy="category")
     */
    private $announcements;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=200)
     */
    private $title;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->announcements = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add announcements
     *
     * @param Announcement $announcements
     * @return Category
     */
    public function addAnnouncement(Announcement $announcements)
    {
        $this->announcements[] = $announcements;

        return $this;
    }

    /**
     * Remove announcements
     *
     * @param Announcement $announcements
     */
    public function removeAnnouncement(Announcement $announcements)
    {
        $this->announcements->removeElement($announcements);
    }

    /**
     * Get announcements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }

    public function __toString()
    {
        return (string)$this->title;
    }
}
