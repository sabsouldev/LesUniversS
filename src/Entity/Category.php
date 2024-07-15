<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 15)]
    private ?string $color = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'categories')]
    private Collection $articles;

    /**
     * @var Collection<int, Presse>
     */
    #[ORM\ManyToMany(targetEntity: Presse::class, mappedBy: 'category')]
    private Collection $presses;

    /**
     * @var Collection<int, Podcast>
     */
    #[ORM\ManyToMany(targetEntity: Podcast::class, mappedBy: 'category')]
    private Collection $podcasts;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->presses = new ArrayCollection();
        $this->podcasts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        $this->articles->removeElement($article);

        return $this;
    }

    /**
     * @return Collection<int, Presse>
     */
    public function getPresses(): Collection
    {
        return $this->presses;
    }

    public function addPress(Presse $press): static
    {
        if (!$this->presses->contains($press)) {
            $this->presses->add($press);
            $press->addCategory($this);
        }

        return $this;
    }

    public function removePress(Presse $press): static
    {
        if ($this->presses->removeElement($press)) {
            $press->removeCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Podcast>
     */
    public function getPodcasts(): Collection
    {
        return $this->podcasts;
    }

    public function addPodcast(Podcast $podcast): static
    {
        if (!$this->podcasts->contains($podcast)) {
            $this->podcasts->add($podcast);
            $podcast->addCategory($this);
        }

        return $this;
    }

    public function removePodcast(Podcast $podcast): static
    {
        if ($this->podcasts->removeElement($podcast)) {
            $podcast->removeCategory($this);
        }

        return $this;
    }
}
