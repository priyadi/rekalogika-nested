<?php

namespace App\Dto;

class ProductDto
{
    public ?int $id;

    public ?string $name;

    public ?bool $active;

    public ?string $sku;

    public ?ColourDto $featuredColour;

    /** @var ?array<int, ColourDto> */
    public ?array $colours = null;
}