<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Kapcsolat;
use App\Entity\KapcsolatEntity; //új entitiáns használata
use App\Form\KapcsolatControllerFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KapcsolatKontroller extends AbstractController
{
    #[Route("/urlap", name: "urlap")]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $kapcs = new KapcsolatEntity();
        $kapcs->setNev("");
        $kapcs->setEmail("");
        $kapcs->setUzenet("");

        $urlap = $this->createForm(KapcsolatControllerFormType::class, $kapcs);

        $fNev = $urlap->get("Nev")->getData();
        $fEmail = $urlap->get("Email")->getData();
        $fUzenet = $urlap->get("Uzenet")->getData();

        // if ($fNev == null || $fEmail == null || $fUzenet == null) {
        //     $urlap-> addError( new FormError("Hiba! Kérjük töltsd ki az összes mezőt!"));
        // }

        //feldolgozás
        if ($urlap->isSubmitted() && $urlap->isValid()) {
            $kapcs = $urlap->getData();
            //adatbázis mentés
            $menedzser = $doctrine->getManager();
            $menedzser->persist($kapcs);
            $menedzser->flush();

            //ha minden rendben van
            return new Response("Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.");
        }

        return $this->renderForm('kapcsolatLap.html.twig', [
            'urlap' => $urlap,
        ]);
    }
}
