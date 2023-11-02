<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    public function listProducts(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }
}
