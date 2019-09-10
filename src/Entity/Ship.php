<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Interfaces\TransportInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShipRepository")
 */
class Ship implements TransportInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $maxSpeed;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $color;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string|null $brand
     * @return Ship|null
     */
    public function setBrand(?string $brand): ?Ship
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     * @return Ship|null
     */
    public function setModel(?string $model): ?Ship
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMaxSpeed(): ?float
    {
        return $this->maxSpeed;
    }

    /**
     * @param float|null $maxSpeed
     * @return Ship|null
     */
    public function setMaxSpeed(?float $maxSpeed): ?Ship
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Ship|null
     */
    public function setColor(string $color): ?Ship
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     */
    public function showMaxSpeed(): string
    {
        return $this->showMaxSpeed();
    }
}
