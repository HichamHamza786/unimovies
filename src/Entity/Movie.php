<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['movies'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['movies'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['movies'])]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column]
    #[Groups(['movies'])]
    private ?int $duration = null;

    #[ORM\Column(length: 10)]
    #[Groups(['movies'])]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    #[Groups(['movies'])]
    private ?string $summary = null;

    #[ORM\Column(length: 5000)]
    #[Groups(['movies'])]
    private ?string $synopsis = null;

    #[ORM\Column(length: 2083)]
    #[Groups(['movies'])]
    private ?string $poster = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 1, nullable: true)]
    #[Groups(['movies'])]
    private ?string $rating = null;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: Season::class, orphanRemoval: true)]
    #[Groups(['movies'])]
    private Collection $seasons;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: Review::class, orphanRemoval: true)]
    #[Groups(['movies'])]
    private Collection $reviews;

    #[ORM\ManyToMany(inversedBy: 'movie', targetEntity: Genre::class, orphanRemoval: true)]
    #[Groups(['movies'])]
    private Collection $genres;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: Casting::class, orphanRemoval: true)]
    #[ORM\OrderBy(['creditOrder' => 'ASC'])]
    #[Groups(['movies'])]
    private Collection $castings;

    #[ORM\Column(length: 255)]
    #[Groups(['movies'])]
    private ?string $slug = null;

    public function __construct()
    {
        $this->seasons = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->castings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): static
    {
        $this->summary = $summary;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): static
    {
        $this->poster = $poster;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return Collection<int, Season>
     */
    public function getSeasons(): Collection
    {
        return $this->seasons;
    }

    public function addSeason(Season $season): static
    {
        if (!$this->seasons->contains($season)) {
            $this->seasons->add($season);
            $season->setMovie($this);
        }

        return $this;
    }

    public function removeSeason(Season $season): static
    {
        if ($this->seasons->removeElement($season)) {
            // set the owning side to null (unless already changed)
            if ($season->getMovie() === $this) {
                $season->setMovie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setMovie($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getMovie() === $this) {
                $review->setMovie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenres(Genre $genre): static
    {
        if (!$this->genres->contains($genre)) {
            $this->genres->add($genre);
            $genre->addMovie($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): static
    {
        if ($this->genres->removeElement($genre)) {
            // set the owning side to null (unless already changed)
            $genre->removeMovie($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Casting>
     */
    public function getCastings(): Collection
    {
        return $this->castings;
    }

    public function addCastings(Casting $casting): static
    {
        if (!$this->castings->contains($casting)) {
            $this->castings->add($casting);
            $casting->setMovie($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): static
    {
        if ($this->castings->removeElement($casting)) {
            // set the owning side to null (unless already changed)
            if ($casting->getMovie() === $this) {
                $casting->setMovie(null);
            }
        }

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
}
