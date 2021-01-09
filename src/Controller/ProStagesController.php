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
    public function index_accueil(): Response
    {
        return $this->render('pro_stages/index.html.twig');
    }
    /**
       * @Route("/entreprises", name="proStages_Entreprises")
       */
      public function index_entreprises(): Response
      {
          return $this->render('pro_stages/index_entreprises.html.twig');
      }

      /**
         * @Route("/formations", name="proStages_Formations")
         */
        public function index_formations(): Response
        {
            return $this->render('pro_stages/index_formations.html.twig');
        }
        /**
           * @Route("stages/1", name="proStages_stages")
           */
          public function index_stages(): Response
          {
              return $this->render('pro_stages/index_stages.html.twig');

          }
}
