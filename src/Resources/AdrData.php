<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class AdrData implements Request
{
    public function __construct(
        private string $unNumber,
        private int $category,
        private string $substanceName,
        private string $class,
        private string $packagingGroup,
        private string $label,
        private int $factor,
        private string $tunnelCode,
        private int $weight,
        private ?string $technicalName = null,
        private bool $isEnvironmentallyHazardous = false,
        private bool $isWaste = false,
        private bool $isLq = false,
        private ?int $amount = null,
        private ?string $packaging = null,
    ) {
    }

    public function setUnNumber(string $unNumber): static
    {
        $this->unNumber = $unNumber;
        return $this;
    }

    public function getUnNumber(): string
    {
        return $this->unNumber;
    }

    public function setCategory(int $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setSubstanceName(string $substanceName): static
    {
        $this->substanceName = $substanceName;
        return $this;
    }

    public function getSubstanceName(): string
    {
        return $this->substanceName;
    }

    public function setTechnicalName(?string $technicalName): static
    {
        $this->technicalName = $technicalName;
        return $this;
    }

    public function getTechnicalName(): ?string
    {
        return $this->technicalName;
    }

    public function setClass(string $class): static
    {
        $this->class = $class;
        return $this;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function setPackagingGroup(string $packagingGroup): static
    {
        $this->packagingGroup = $packagingGroup;
        return $this;
    }

    public function getPackagingGroup(): string
    {
        return $this->packagingGroup;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setFactor(int $factor): static
    {
        $this->factor = $factor;
        return $this;
    }

    public function getFactor(): int
    {
        return $this->factor;
    }

    public function setTunnelCode(string $tunnelCode): static
    {
        $this->tunnelCode = $tunnelCode;
        return $this;
    }

    public function getTunnelCode(): string
    {
        return $this->tunnelCode;
    }

    public function setIsEnvironmentallyHazardous(bool $isEnvironmentallyHazardous): static
    {
        $this->isEnvironmentallyHazardous = $isEnvironmentallyHazardous;
        return $this;
    }

    public function isEnvironmentallyHazardous(): bool
    {
        return $this->isEnvironmentallyHazardous;
    }

    public function setIsWaste(bool $isWaste): static
    {
        $this->isWaste = $isWaste;
        return $this;
    }

    public function isWaste(): bool
    {
        return $this->isWaste;
    }

    public function setIsLq(bool $isLq): static
    {
        $this->isLq = $isLq;
        return $this;
    }

    public function isLq(): bool
    {
        return $this->isLq;
    }

    public function setWeight(int $weight): static
    {
        $this->weight = $weight;
        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setPackaging(?string $packaging): static
    {
        $this->packaging = $packaging;
        return $this;
    }

    public function getPackaging(): ?string
    {
        return $this->packaging;
    }

    public function toRequest(): array
    {
        return [
            'Unnummer' => $this->unNumber,
            'Categorie' => $this->category,
            'Stofnaam' => $this->substanceName,
            'TechnischeBenaming' => $this->technicalName,
            'Klasse' => $this->class,
            'VerpakkingsGroep' => $this->packagingGroup,
            'Etiket' => $this->label,
            'Factor' => $this->factor,
            'Tunnelcode' => $this->tunnelCode,
            'IsMilieuGevaarlijk' => $this->isEnvironmentallyHazardous ? 1 : 0,
            'IsAfvalstof' => $this->isWaste ? 1 : 0,
            'IsLQ' => $this->isLq ? 1 : 0,
            'Gewicht' => $this->weight,
            'Aantal' => $this->amount,
            'Verpakking' => $this->packaging,
        ];
    }
}
