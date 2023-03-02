<?php

namespace App\Controller;

use App\Entity\SuivieDeCommande;
use App\Form\ModifierlessuivisdecommandeType;
use App\Repository\LivraisonRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RestaurantRepository;
use App\Repository\SuivieDeCommandeRepository;
use App\Repository\TypeplatRepository;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Livraison;
use App\Entity\Plat;
use App\Entity\Restaurant;
use App\Form\LivraisonType;
use App\Form\NouveauPlatType;
use App\Form\NouveauRestaurantType;
use Symfony\Component\DomCrawler\Form;

class RestaurateurController extends AbstractController
{

    /**
     * @Route("/restaurateur", name="app_restaurateur")
     * @IsGranted("ROLE_Restaurateur")
     */
    public function index(RestaurantRepository $RestaurantRepository, PlatRepository $PlatRepository, TypeplatRepository $typeplatRepository, UserRepository $userRepository): Response
    {
        $restaurateurs = $RestaurantRepository->findBy(['fk_user' => $this->getUser()]);
        $user = $userRepository->findAll();
        $plat = $PlatRepository->findAll();
        return $this->render('restaurateur/index.html.twig', [
            'restaurateurs' => $restaurateurs,
            'users' => $user,
            'plats' => $plat,
        ]);
    }

    /**
     * @Route("/disponible/{id}", name="app_disponible")
     * @IsGranted("ROLE_Restaurateur")
     */
    public function disponible($id, TypeplatRepository $typeplatRepository, RestaurantRepository $restaurantRepository): Response
    {
        $restaurant = $restaurantRepository->find($id);

        return $this->render('restaurateur/disponible.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @Route("/preparationCommandes/{id}", name="app_preparationCommandes")
     */
    public function preparation(SuivieDeCommandeRepository $suivieDeCommandeRepository, $id): Response
    {
        $suivieDeCommandes = $suivieDeCommandeRepository->find($id);
        return $this->render('restaurateur/preparationCommandes.html.twig', [
            'suivieDeCommandes' => $suivieDeCommandes,
        ]);
    }

    /**
     * @Route("/modifierlesuivie/{id}", name="app_modifierlesuivie")
     */
    public function modifier($id, Livraison $livraison, LivraisonRepository $livraisonRepository, ManagerRegistry $doctrine, Request $request, SuivieDeCommandeRepository $suivieDeCommandeRepository): Response
    {
        $livraison = $livraisonRepository->find($id);
        $form = $this->createForm(ModifierlessuivisdecommandeType::class, $livraison);
        $manager = $doctrine->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraison = $form->getData();
            $manager->persist($livraison);
            $manager->flush();
            return $this->redirectToRoute("app_accueil");
        }
        return $this->renderForm('restaurateur/modifiersuiviecommande.html.twig', [
            'form' => $form,
            'livraison' => $livraison,

        ]);
    }


    /**
     * @Route("/ajouterRestaurant/{id}", name="app_addrestaurant")
     */
    public function ajouter($id, RestaurantRepository $restaurantRepository, UserRepository $userRepository, ManagerRegistry $doctrine, Request $request): Response
    {
        $restaurant = new Restaurant();
        $user = $userRepository->find($id);
        $form = $this->createForm(NouveauRestaurantType::class, $restaurant);

        $manager = $doctrine->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $restaurant = $form->getData();
            $restaurant->setFkUser($user);
            $manager->persist($restaurant);
            $manager->flush();
            return $this->redirectToRoute('app_addplat', ['id' => $restaurant->getId()]);
        }
        return $this->renderForm('restaurateur/nouveaurestaurant.html.twig', [
            'form' => $form,
        ]);
    }


    /**
     * @Route("/ajouterPlat/{id}", name="app_addplat")
     */
    public function ajouterPlat($id, RestaurantRepository $restaurantRepository, UserRepository $userRepository, ManagerRegistry $doctrine, Request $request): Response
    {
        $plat = new Plat();
        $restaurant = $restaurantRepository->find($id);
        $form = $this->createForm(NouveauPlatType::class, $plat);

        $manager = $doctrine->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plat = $form->getData();
            $plat->addRestaurant($restaurant);
            $manager->persist($plat);
            $manager->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->renderForm('restaurateur/nouveauPlat.html.twig', [
            'form' => $form,
        ]);
    }
}
