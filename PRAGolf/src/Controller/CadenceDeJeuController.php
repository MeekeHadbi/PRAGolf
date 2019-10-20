<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CadenceDeJeuController extends AbstractController
{
    /**
     * @Route("/cadence/de/jeu", name="cadence_de_jeu")
     */
    public function index()
    {
        $json = file_get_contents("xlsToJson.json");

        $contenu= json_decode($json);
        return $this->render('cadence_de_jeu/index.html.twig'
            ,array('contenu'=>$contenu,));
    }
}
