<?php

namespace App\Mapper;

use App\Dto\ColourDto;
use App\Entity\Colour;
use App\Repository\ColourRepository;
use Rekalogika\Mapper\Attribute\AsObjectMapper;

class ColourDtoToColourMapper
{
    public function __construct(
        private ColourRepository $colourRepository
    ) {
    }

    #[AsObjectMapper]
    public function mapColourDtoToColour(ColourDto $colourDto): Colour
    {
        $colour = $this->colourRepository->find($colourDto->id);

        if (!$colour) {
            throw new \Exception('Colour not found'); // maybe create a new colour instead if not found?
        }
        
        return $colour;
    }
}
