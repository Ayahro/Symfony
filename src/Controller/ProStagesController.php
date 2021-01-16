<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="proStages_Accueil")
     */
    public function accueil(): Response
    {
      $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

       $stages =  $repositoryStage->findAll();

       return $this->render('pro_stages/accueil.html.twig',['stages'=>$stages]);
    }


    /**
       * @Route("/entreprises", name="proStages_Entreprises")
       */
      public function entreprises(): Response
      {
          return $this->render('pro_stages/entreprises.html.twig');
      }


      /**
         * @Route("/formations", name="proStages_Formations")
         */
        public function formations(): Response
        {
            return $this->render('pro_stages/formations.html.twig');
        }


        /**
           * @Route("/stages/{id}", name="proStages_stages")
           */
           public function stages($id): Response
      {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        $stage =  $repositoryStage->find($id);


          return $this->render('pro_stages/stages.html.twig',['stage' => $stage]);
      }


}
