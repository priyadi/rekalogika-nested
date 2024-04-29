<?php

namespace App\Controller;

use App\Dto\ProductDto;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Rekalogika\Mapper\MapperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly MapperInterface $mapper
    ) {
    }

    #[Route('/product', methods: ['POST'])]
    public function post(#[MapRequestPayload] ProductDto $dto): JsonResponse
    {
        $product = $this->mapper->map($dto, new Product());

        dump($dto);
        dump($product);

        $this->em->persist($product);
        $this->em->flush();

        return $this->json($this->mapper->map($product, $dto));
    }

    #[Route('/product/{{productId}}', methods: ['PUT'])]
    public function put(Product $product, #[MapRequestPayload] ProductDto $dto): JsonResponse
    {
        $product = $this->mapper->map($dto, $product);

        $this->em->flush();

        return $this->json($this->mapper->map($product, $dto));
    }
}
