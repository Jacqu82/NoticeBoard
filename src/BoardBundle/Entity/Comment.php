<?php

namespace BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="BoardBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\ManyToOne(targetEntity="Announcement", inversedBy="comments")
     */
    private $announcement;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set text
     *
     * @param string $text
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
     */
    public function setDate()
    {
        $this->date = new \DateTime();
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \BoardBundle\Entity\User $user
     * @return Comment
     */
    public function setUser(\BoardBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BoardBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set announcement
     *
     * @param \BoardBundle\Entity\Announcement $announcement
     * @return Comment
     */
    public function setAnnouncement(\BoardBundle\Entity\Announcement $announcement = null)
    {
        $this->announcement = $announcement;

        return $this;
    }

    /**
     * Get announcement
     *
     * @return \BoardBundle\Entity\Announcement
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }
}
