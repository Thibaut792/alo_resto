<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RestaurantRepository;

use Symfony\Component\Routing\Annotation\Route;

class RestaurateurController extends AbstractController
{

    /**
     * @Route("/restaurateur", name="app_restaurateur")
     */
    public function index(RestaurantRepository $RestaurantRepository, Request $request ): Response
    {
        $restaurateurs = $RestaurantRepository->findAll();

        $session = $request->getSession();
        return $this->render('restaurateur/index.html.twig', [
            'restaurateurs' => $restaurateurs,
        ]);
    }

    /**
     * @Route("/restaurateur/{id<\d+>}", name="app_restaurateur_view")
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