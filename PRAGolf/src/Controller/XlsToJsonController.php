<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 19/10/2019
 * Time: 10:49
 */

namespace App\Controller;

use App\Repository\UploadRepository;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Entity\Upload;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityRepository;
class XlsToJsonController implements IReadFilter
{
    /**
     * @Route("/xlsRead", name="xlsRead")
     */
    public function xlsToJson(UploadRepository $uploadRepository)
    {
        $upload = $uploadRepository->find(1);// Récupère le dernier id de la table Upload
        $reader = new Xlsx();
        $fileName = $upload->getName();//on recupere le nom de l'id
        $path = "../public/uploads/" . $fileName;
        $reader->setReadFilter(new XlsToJsonController());
        $reader->setReadDataOnly(true);
        /**  Load only the rows and columns that match our filter to Spreadsheet  **/
        $spreadsheet = $reader->load($path);

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                'B10:K500',     // The worksheet range that we want to retrieve
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );
        $infoJoueur = array();
        $nom = "B";
        $rep = "I";
        $date="E";
        for ($compt2 = 11; $compt2 < 175; $compt2++) {//Trie les joueurs par couleur
            $nomCell = $dataArray[$compt2][$nom];
            $couleur = $dataArray[$compt2][$rep];
            if ($nom !== null && $couleur !== null && $couleur !== "Rep.") {
                 $infoJoueur[$couleur][] = $nomCell;
            }
        }
        foreach ($infoJoueur as $couleurRep => $joueur) { // Tri de joueurs; créations des parties

            $nbJoueursCouleur = count($joueur);
            $addJoueurs = false;
            unset($joueurToAdd);//permet de changer le nom du joueur à chaque tour en  détruisant la valeur précédente

            foreach ($joueur as $nomJoueur) {//Pour chaque joueur en fonction du nomJoueur
                $joueurToAdd[] = $nomJoueur;//on ajoute le nom du joueur

                if (($nbJoueursCouleur == 4 or $nbJoueursCouleur == 2) && (count($joueurToAdd) == 2)) {
                    //si il reste 4 ou 2 joueur alors on creer des groupe de 2
                    $parties[] = array($couleurRep, $joueurToAdd);
                    $nbJoueursCouleur = $nbJoueursCouleur - 2;
                    unset($joueurToAdd);
                } elseif ($nbJoueursCouleur == 3 && (count($joueurToAdd) == 3)) {

                    $parties[] = array($couleurRep, $joueurToAdd);
                    $nbJoueursCouleur = $nbJoueursCouleur - 3;
                    unset($joueurToAdd);
                } elseif ($nbJoueursCouleur > 4 && (count($joueurToAdd) > 2)) {
                    //DEBUT:SI il y'a plus de quatre joueurs par couleur on fait des groupes de trois

                    $parties[] = array($couleurRep, $joueurToAdd);
                    $nbJoueursCouleur = $nbJoueursCouleur - 3;
                    unset($joueurToAdd);
                }
            }
        }
        $nomCompet = $dataArray[10][$nom]; // Récupère le nom de la compétition
        $nbJoueurs = $dataArray[166][$nom]; // Récupère le nombre de joueurs
        $dateCompet = $dataArray[63][$date]; // Récupère la date de la compétition
        array_push($parties, $nomCompet,$dateCompet, $nbJoueurs);
        echo "<pre>";
        $jsonpart = fopen('xlsToJson.json', 'w+');
        fwrite($jsonpart, json_encode($parties, JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        fclose($jsonpart);
        return new Response(dd($parties));

    }
    public function readCell($column, $row, $worksheetName = '')
    {
        // Read title row and rows 20 - 30
        return ($row > 9 && $row < 175) ? true : false;
    }
}


