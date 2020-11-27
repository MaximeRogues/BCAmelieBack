<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadController extends AbstractController
{
    /**
     * @Route("stock-images")
     */
    public function stockImages(Request $request)    {
        $data = $request->files->get('file');      //récupère dans la request le files de nom 'file'

        $fileName = $data->getClientOriginalName();      //récupère et stock dans fileName, le nom du fichier
        $data->move('public/images', $fileName); //choisir l'endroit d'ou est le fichier

        return new Response($fileName);
    }
}
