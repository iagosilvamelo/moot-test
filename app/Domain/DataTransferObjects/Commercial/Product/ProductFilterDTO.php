<?php

namespace App\Domain\DataTransferObjects\Commercial\Product;

class ProductFilterDTO
{
    public function __construct(
        private ?string $name,
        private ?array $categoryIds,
        private ?array $manufacturerIds,
    ) {}

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCategoryIds(): ?array
    {
        return $this->categoryIds;
    }

    public function getManufacturerIds(): ?array
    {
        return $this->manufacturerIds;
    }
}
