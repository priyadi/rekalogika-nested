<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Rekalogika\Mapper\Attribute\AllowDelete;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Colour $featuredColour = null;

    /**
     * @var Collection<int, Colour>
     */
    #[ORM\ManyToMany(targetEntity: Colour::class)]
    #[AllowDelete]
    private Collection $colours;

    public function __construct()
    {
        $this->colours = new ArrayCollection();
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

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getFeaturedColour(): ?Colour
    {
        return $this->featuredColour;
    }

    public function setFeaturedColour(?Colour $featuredColour): static
    {
        $this->featuredColour = $featuredColour;

        return $this;
    }

    /**
     * @return Collection<int, Colour>
     */
    public function getColours(): Collection
    {
        return $this->colours;
    }

    public function addColour(Colour $colour): static
    {
        if (!$this->colours->contains($colour)) {
            $this->colours->add($colour);
        }

        return $this;
    }

    public function removeColour(Colour $colour): static
    {
        $this->colours->removeElement($colour);

        return $this;
    }
}
