<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Kapcsolat;
use App\Form\KapcsolatControllerFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class KapcsolatKontroller extends AbstractController
{
    #[Route("/urlap", name: "urlap")]
    public function new(Request $request): Response
    {
        $kapcs = new Kapcsolat();
        $kapcs->setNev("");
        $kapcs->setEmail("");
        $kapcs->setUzenet("");

        //átmenetileg kivéve
        // $urlap = $this->createFormBuilder($kapcs)
        //     ->add("Nev", TextType::class, ['label' => 'Név'])
        //     ->add("Email", EmailType::class, ['label' => 'Email cím'])
        //     ->add("Uzenet", TextareaType::class, ['label' => 'Üzenet helye...'])
        //     ->add('Bekuldes', SubmitType::class, ['labe' => 'Beküldés'])
        //     ->getForm();

        $urlap = $this->createForm(KapcsolatControllerFormType::class, $kapcs);

        //feldolgozás
        $urlap->handleRequest($request);
        if ($urlap->isSubmitted() && $urlap->isValid()) {
            $kapcs = $urlap->getData();

            //adatbázis mentés

            return $this->redirectToRoute("Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.");
        }

        return $this->renderForm('kapcsolatLap.html.twig', [
            'urlap' => $urlap,
        ]);
    }
}
