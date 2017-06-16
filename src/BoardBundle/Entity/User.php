<?php

namespace BoardBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="Announcement", mappedBy="user")
     */
    private $announcements;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        $this->announcements = new ArrayCollection();
        parent::__construct();
    }

    /**
     * Add announcements
     *
     * @param \BoardBundle\Entity\Announcement $announcements
     * @return User
     */
    public function addAnnouncement(\BoardBundle\Entity\Announcement $announcements)
    {
        $this->announcements[] = $announcements;

        return $this;
    }

    /**
     * Remove announcements
     *
     * @param \BoardBundle\Entity\Announcement $announcements
     */
    public function removeAnnouncement(\BoardBundle\Entity\Announcement $announcements)
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

    /**
     * Add comments
     *
     * @param \BoardBundle\Entity\Comment $comments
     * @return User
     */
    public function addComment(\BoardBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \BoardBundle\Entity\Comment $comments
     */
    public function removeComment(\BoardBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
