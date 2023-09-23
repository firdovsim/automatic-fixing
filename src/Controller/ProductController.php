<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(ProductRepository $repository): Response
    {
        $products = $repository->findAllGreaterThanPriceAndStatusTrue(13000);

        return new JsonResponse($products);
    }

    #[Route(path: '/product/create', name: 'app_product_create')]
    public function createProduct(EntityManagerInterface $manager, ValidatorInterface $validator): Response
    {
        $product = new Product();
        $product->setName('Samsung Galaxy');
        $product->setPrice(132090);
        $product->setDescription('New and modern');
        $product->setStatus(true);

        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string) $errors, Response::HTTP_BAD_REQUEST);
        }

        $manager->persist($product);
        $manager->flush();

        return new Response('Created new product');
    }

    #[Route(path: '/product/{id}', name: 'app_product_show')]
    public function show(
        Product $product = null
    ): Response {
        return new Response(sprintf('Check out product %s', $product?->getId()));
    }
}
