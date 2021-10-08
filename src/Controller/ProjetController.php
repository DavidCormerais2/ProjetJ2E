<?php

namespace App\Controller;

use App\Entity\Analyse2;
use App\Entity\Echantillon;
use App\Entity\Patient2;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'projet')]
    public function index(): Response
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }
    public function creationAnalyse(EntityManagerInterface $em, int $echid, String $type, Float $res){
        $echantillon = $em->getRepository(Echantillon::class)->find($echid);
        $newAnalyse = new Analyse2();
        $newAnalyse->setEchantillon($echantillon)
            ->setType($type)
            ->setResultat($res);
        $em->persist($newAnalyse);
        $em->flush();
    }
    public function modificationResultatAnalyse(EntityManagerInterface $em, int $id , Float $newRes){
        $analyse = $em->getRepository(Analyse2::class)->find($id);
        if($analyse != null){
            $analyse->setResultat($newRes);
        }
        $em->flush();
    }
    public function suppressionAnalyse(EntityManagerInterface $em, int $id){
        $analyse = $em->getRepository(Analyse2::class)->find($id);
        if($analyse != null){
            $em->remove($analyse);
        }
        $em->flush();
    }
    public function creationPatient(EntityManagerInterface $em, int $patientid, String $nom, String $prenom){
        $newPatient = new Patient2();
        $newPatient->setNom($nom)
            ->setPrenom($prenom);
        $em->persist($newPatient);
        $em->flush();
    }
    public function modificationPatient(EntityManagerInterface $em, int $id , String $nom = null, String $prenom= null){
        $patient = $em->getRepository(Patient2::class)->find($id);
        if($prenom == null){
            $patient->setNom($nom);
        }
        else if($nom == null){
            $patient->setPrenom($prenom);
        }
        $em->flush();
    }
    public function suppressionPatient(EntityManagerInterface $em, int $id){
        $patient = $em->getRepository(Patient2::class)->find($id);
        if($patient != null){
            $em->remove($patient);
        }
        $em->flush();
    }
    public function creationEch(EntityManagerInterface $em, int $patientid, String $quantite){
        $patient = $em->getRepository(Patient2::class)->find($patientid);
        $newPatient = new Echantillon();
        $newPatient->setPatient($patient)
            ->setQuantite($quantite);
        $em->persist($newPatient);
        $em->flush();
    }
    public function modificationEch(EntityManagerInterface $em, int $id , String $quantite){
        $ech = $em->getRepository(Echantillon::class)->find($id);
        if($ech != null){
            $ech->setQuantite($quantite);
        }
        $em->flush();
    }
    public function suppressionEch(EntityManagerInterface $em, int $id)
    {
        $ech = $em->getRepository(Echantillon::class)->find($id);
        if ($ech != null) {
            $em->remove($ech);
        }
        $em->flush();
    }
}
