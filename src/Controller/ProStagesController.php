<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="proStages_Accueil")
     */
    public function accueil(): Response
    {
        return $this->render('pro_stages/accueil.html.twig');
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
           * @Route("/stages/{i d}", name="proStages_stages")
           */
          public function stages($id): Response
          {
              return $this->render('pro_stages/stages.html.twig',
            ['idStages' => $id ]);

          }


}
