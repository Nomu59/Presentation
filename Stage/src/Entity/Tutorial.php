<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tutorial
 *
 * @ORM\Table(name="tutorial", uniqueConstraints={@ORM\UniqueConstraint(name="slug", columns={"slug"})}, indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TutorialRepository")
 */
class Tutorial
{
    /**
     * @var int
     *
     * @ORM\Column(name="tutorial_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tutorialId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $slug = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_url", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $imgUrl = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="duration_time", type="integer", nullable=false)
     */
    private $durationTime;

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
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true, options={"default"="NULL"})
     */
    private $content = 'NULL';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_published", type="boolean", nullable=false)
     */
    private $isPublished = '0';

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Onboarding", inversedBy="tutorial")
     * @ORM\JoinTable(name="appartenir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tutorial_id", referencedColumnName="tutorial_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="onborading_id", referencedColumnName="onborading_id")
     *   }
     * )
     */
    private $onborading = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->onborading = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTutorialId(): ?int
    {
        return $this->tutorialId;
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

    public function getDurationTime(): ?int
    {
        return $this->durationTime;
    }

    public function setDurationTime(int $durationTime): static
    {
        $this->durationTime = $durationTime;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

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

    /**
     * @return Collection<int, Onboarding>
     */
    public function getOnborading(): Collection
    {
        return $this->onborading;
    }

    public function addOnborading(Onboarding $onborading): static
    {
        if (!$this->onborading->contains($onborading)) {
            $this->onborading->add($onborading);
        }

        return $this;
    }

    public function removeOnborading(Onboarding $onborading): static
    {
        $this->onborading->removeElement($onborading);

        return $this;
    }

}
