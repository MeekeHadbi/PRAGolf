<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request)
    {
        $upload= new Upload();
        $form= $this->createForm(UploadType::class,$upload);

        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            $file=$upload->getName();
            $fileName=md5(uniqid()).'.xlsx';
            $file->move($this->getParameter('upload_directory'),$fileName);
            $upload->setName($fileName);

            $em=$this->getDoctrine()->getManager();
            $em->persist($upload);
            $em->flush();
            return $this->redirectToRoute('index');
        }
        return $this->render('index/index.html.twig',array(
                'form'=>$form->createView(),
                )
        );
    }
}
