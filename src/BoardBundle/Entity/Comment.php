<?php

namespace BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="BoardBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\ManyToOne(targetEntity="BoardBundle\Entity\Announcement", inversedBy="comments")
     */
    private $announcement;

    /**
     * @ORM\ManyToOne(targetEntity="BoardBundle\Entity\User", inversedBy="comments")
     */
    private $user;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="commentText", type="text")
     */
    private $commentText;

    /**
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;
    

    public function getCommentText()
    {
        return $this->commentText;
    }

    public function setCommentText($commentText)
    {
        $this->commentText = $commentText;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate()
    {
        $this->creationDate = date('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
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
}
