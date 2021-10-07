<?php

namespace App\Controller;

use App\Entity\Analyse;
use App\Entity\Etudiant;
use App\Entity\Patient;
use App\Entity\Promo;
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
        $promos = $em->getRepository(Promo::class)->findAll();
        echo "<table><tr><td>Promo</td><td>Etudiants</td></tr>";
        $this->creationEtudiants($em);
        $this->modifEtudiants($em, "Pierre", "Pedro");
        $this->modifEtudiants($em, "Alex", "Remi");
        $this->supprEtudiants($em, "Remi");
        foreach ($promos as $promo){
            echo "<tr><td>";
            print($promo->getIntitule());
            echo "</td><td>";
            $etudiants = $promo->getListeEtu();
            foreach ($etudiants as $etudiant){
                print($etudiant->getNom());
            }
            echo "</td></tr>";
        }
        echo "</table><br/>";

        return new Response();
    }
    public function creationEtudiants(EntityManagerInterface $em){
        $promo = $em->getRepository(Promo::class)->findOneBy(['Intitule' => 'M1']);
        $promo2 = $em->getRepository(Promo::class)->findOneBy(['Intitule' => 'M2']);
        $newEtu = new Etudiant();
        $newEtu->setNom("Pierre")
            ->setPromo($promo);
        $newEtu2 = new Etudiant();
        $newEtu2->setNom("Alex")
            ->setPromo($promo2);
        $em->persist($newEtu);
        $em->persist($newEtu2);
        $em->flush();
    }
    public function modifEtudiants(EntityManagerInterface $em, String $nom, String $newNom){
        $etu = $em->getRepository(Etudiant::class)->findOneBy(['Nom'=> $nom]);
        $etu->setNom($newNom);
        $em->persist($etu);
        $em->flush();
    }
    public function supprEtudiants(EntityManagerInterface $em, String $nom){
        $etu = $em->getRepository(Etudiant::class)->findOneBy(['Nom'=>$nom]);
        $em->remove($etu);
        $em->flush();
    }
}
