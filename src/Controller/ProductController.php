<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function addProduct(Request $request, EntityManagerInterface $em): Response
    {

        $product = new Product();

        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();

            if ($product instanceof Product) {
                $em->persist($product);
                $em->flush();
            }

            return $this->redirectToRoute('app_user_list');
        }


        return $this->render(
            'product/index.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
