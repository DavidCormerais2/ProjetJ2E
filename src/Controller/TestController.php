<?php

namespace App\Controller;

use App\Entity\Analyse;
use App\Entity\Patient;
use App\Entity\Truc;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'src/Controller/TestController.php',
        ]);
    }

    /**
     * @return Response
     * @Route "/demo"
     */
    public function demo(EntityManagerInterface $em){
        $truc = $em->getRepository(Truc::class)->find(2);
        $text = $truc->getBidule();

        return new Response($text);
    }
    public function remplissagePatient(){
        $Analyse = new Analyse();
        $Analyse->setType("GR")
            ->setUnit("G/L");

        $Patient = new Patient();
            $Patient->setNom("Pedro")
                ->setTypeAnalyse("NFS")
                ->addResultatAnalyse($Analyse);
    }
    #Consignes :
    # Automate analyse échantillon de sang et envoie le résultat
    # Création classes suivantes :
    # Nom Patient
    # Type d'analyse
    # Résultats
}
