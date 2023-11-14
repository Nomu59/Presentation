<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Onboarding
 *
 * @ORM\Table(name="onboarding", uniqueConstraints={@ORM\UniqueConstraint(name="slug", columns={"slug"})}, indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="community_id", columns={"community_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\OnboardingRepository")
 */
class Onboarding
{
    /**
     * @var int
     *
     * @ORM\Column(name="onborading_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $onboradingId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $slug = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_url", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $imgUrl = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prerequisites", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $prerequisites = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="level", type="string", length=50, nullable=false)
     */
    private $level;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $tag = 'NULL';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_published", type="boolean", nullable=false)
     */
    private $isPublished = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="average_notation", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $averageNotation = 'NULL';

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var \Communaute
     *
     * @ORM\ManyToOne(targetEntity="Communaute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="community_id", referencedColumnName="community_id")
     * })
     */
    private $community;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tutorial", mappedBy="onborading")
     */
    private $tutorial = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tutorial = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getOnboradingId(): ?int
    {
        return $this->onboradingId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(?string $imgUrl): static
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrerequisites(): ?string
    {
        return $this->prerequisites;
    }

    public function setPrerequisites(?string $prerequisites): static
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function isIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function isAverageNotation(): ?bool
    {
        return $this->averageNotation;
    }

    public function setAverageNotation(?bool $averageNotation): static
    {
        $this->averageNotation = $averageNotation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?Utilisateur
    {
        return $this->user;
    }

    public function setUser(?Utilisateur $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCommunity(): ?Communaute
    {
        return $this->community;
    }

    public function setCommunity(?Communaute $community): static
    {
        $this->community = $community;

        return $this;
    }

    /**
     * @return Collection<int, Tutorial>
     */
    public function getTutorial(): Collection
    {
        return $this->tutorial;
    }

    public function addTutorial(Tutorial $tutorial): static
    {
        if (!$this->tutorial->contains($tutorial)) {
            $this->tutorial->add($tutorial);
            $tutorial->addOnborading($this);
        }

        return $this;
    }

    public function removeTutorial(Tutorial $tutorial): static
    {
        if ($this->tutorial->removeElement($tutorial)) {
            $tutorial->removeOnborading($this);
        }

        return $this;
    }

}
