<?php

namespace App\Controller;

use App\Entity\Typevehicule;
use App\Entity\User;
use App\Form\ChoixVehiculeType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 *
 */
class LivreurController extends AbstractController
{
    /**
     * @Route("/choixVehicule/{id}", name="app_choixVehicule")
     * @IsGranted("ROLE_Livreur")
     */
    public function choixVehicule($id, UserRepository $userRepository, ManagerRegistry $doctrine, Request $request): Response
    {
        $typeVehicule = new User();
        $idUser = $userRepository->find($id);
        $form = $this->createForm(ChoixVehiculeType::class, $typeVehicule);

        $manager = $doctrine->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeVehicule = $form->getData();
            //$typeVehicule->setUser($this->getUser());
            $typeVehicule->setFkTypeVehicule($idUser);
            $manager->persist($typeVehicule);
            $manager->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->renderForm('livreur/index.html.twig', [
            'form' => $form,
        ]);
    }
}
