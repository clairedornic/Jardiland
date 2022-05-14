<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $name;


    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $stock;

   /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products")
     * @Assert\NotBlank
     */
    private $categories;

    /**
     * @ORM\Column(type="boolean")
     */
    private $highlighted;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Url(
     *    message = "The url '{{ value }}' is not a valid url",
     * )
     */
    private $image;

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    public function getHighlighted(): ?bool
    {
        return $this->highlighted;
    }

    public function setHighlighted(bool $highlighted): self
    {
        $this->highlighted = $highlighted;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
