<?php

namespace BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="announcement")
 * @ORM\Entity(repositoryClass="BoardBundle\Repository\AnnouncementRepository")
 */
class Announcement
{
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="announcement")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="announcements")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="announcements")
     */
    private $user;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=200)
     *
     * @Assert\Length(
     *     min = 5,
     *     max = 50,
     *     minMessage = "Tytuł ogłoszenia powinien zawierać przynajmniej {{ limit }} znaków!",
     *     maxMessage = "Tytuł ogłoszenia może zawierać max {{ limit }} znaków!"
     * )
     */
    private $title;

    /**
     * @ORM\Column(name="description", type="text")
     *
     * @Assert\Length(
     *     min = 10,
     *     max = 500,
     *     minMessage = "Opis powinien zawierać przynajmniej {{ limit }} znaków!",
     *     maxMessage = "Opis może zawierać max {{ limit }} znaków!"
     * )
     */
    private $description;

    /**
     * @ORM\Column(name="price", type="float", precision=2)
     */
    private $price;

    /**
     * @ORM\Column(name="add_date", type="datetime")
     */
    private $addDate;

    /**
     * @ORM\Column(name="photo_path", type="text")
     */
    private $photoPath;

    public function getPhotoPath()
    {
        return $this->photoPath;
    }

    public function setPhotoPath($photoPath)
    {
        $this->photoPath = $photoPath;
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
     * @return Announcement
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
     * Set description
     *
     * @param string $description
     * @return Announcement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Announcement
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return Announcement
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime 
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set user
     *
     * @param \BoardBundle\Entity\User $user
     * @return Announcement
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
     * Set category
     *
     * @param \BoardBundle\Entity\Category $category
     * @return Announcement
     */
    public function setCategory(\BoardBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BoardBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function getWebPath()
    {
        return '/photo/'.$this->photoPath;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comments
     *
     * @param \BoardBundle\Entity\Comment $comments
     * @return Announcement
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
