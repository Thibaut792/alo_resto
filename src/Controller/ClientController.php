<?php

namespace App\Controller;

use App\Repository\LivraisonRepository;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */

class ClientController extends AbstractController
{
    /**
     * @Route("/plat", name="app_plat")
     */
    public function index(PlatRepository $platRepository): Response
    {
        $plat = $platRepository->findAll();
        return $this->render('client/index.html.twig', [
            'plats' => $plat,
        ]);
    }

    /**
     * @Route("/commande", name="app_commande")
     */
    public function commande(LivraisonRepository $livraisonRepository, RestaurantRepository $restaurantRepository): Response
    {
        $commande = $livraisonRepository->findAll();
        $restaurant = $restaurantRepository->findAll();
        return $this->render('client/commande.html.twig', [
            'commandes' => $commande,
            'restaurants' => $restaurant,
        ]);
    }
}
