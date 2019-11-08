<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Interfaces\TransportInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car implements TransportInterface
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $maxSpeed;

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
     * @return Car|null
     */
    public function setBrand(?string $brand): ?Car
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
     * @return Car|null
     */
    public function setModel(?string $model): ?Car
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
     * @return Car|null
     */
    public function setMaxSpeed(?float $maxSpeed): ?Car
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
     * @return Car|null
     */
    public function setColor(string $color): ?Car
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     */
    public function transportType(): string
    {
        echo 'its amazing car';
        return 'its amazing car';
    }
}
