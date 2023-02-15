<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RestaurantRepository;
use App\Repository\TypeplatRepository;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class RestaurateurController extends AbstractController
{

    /**
     * @Route("/restaurateur", name="app_restaurateur")
     * @IsGranted("ROLE_Restaurateur")
     */
    public function index(RestaurantRepository $RestaurantRepository, TypeplatRepository $typeplatRepository, UserRepository $userRepository): Response
    {
        $restaurateurs = $RestaurantRepository->findAll();
        $typeplats = $typeplatRepository ->findAll();
        $users = $userRepository ->findAll();

        return $this->render('restaurateur/index.html.twig', [
            'restaurateurs' => $restaurateurs,
            'typeplats' => $typeplats,
            'users' => $users,
        ]);
    }

    /**
     * @Route("/restaurateur/{id<\d+>}", name="app_restaurateur_view")
     * @IsGranted("ROLE_Restaurateur")
     */
    public function view(RestaurantRepository $RestaurantRepository, $id, Request $request): Response
    {
        $restaurateur = $RestaurantRepository->find($id);

        $session = $request->getSession();
        return $this->render('restaurateur/view.html.twig', [
            'restaurateur' => $restaurateur,
        ]);
    }


}