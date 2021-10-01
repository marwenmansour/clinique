<?php

namespace App\Controller;


use App\Entity\Patient;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function search(PatientRepository $repository, Request $request) {
        $formulaire = $this->createForm(SearchPatientType::class);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $patients = $repository->searchByName($formulaire->get('recherche')->getData());
        } else {
            $patients = $repository->findAll();
        }

        return $this->render('patient/index.html.twig', [
            'formulaire' => $formulaire->createView(),
            'entityName' => 'patients',
            'patients' => $patients
        ]);
    }
}
