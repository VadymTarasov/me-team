<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/', name: 'app_user')]
    public function addUser(Request $request, EntityManagerInterface $em): Response
    {

        $user = new User();

        $form = $this->createForm(UserFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            if ($user instanceof User) {
                $em->persist($user);
                $em->flush();
            }
            return $this->redirectToRoute('app_user_list');
        }

        return $this->render(
            'user/index.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    #[Route('/list', name: 'app_user_list')]
    public function userList(UserRepository $userRepository): Response
    {

        $users = $userRepository->findAll();
        return $this->render('user/list.html.twig', [
            'users' => $users,
        ]);
    }
}
