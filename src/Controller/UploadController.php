<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;

class UploadController extends AbstractController
{
    /**
     * @Route("stock-images")
     */

    public function storeImages(Request $request) {
        $data = $request->files->get('file');    //récupère dans la request le files de nom 'file'

        $fileName = $data->getClientOriginalName();        //récupère et stock dans fileName, le nom du fichier
        
        try {
            $data->move($this->getParameter('stockImages'), $fileName); 
        } catch (FileException $e) {
            return new Response($e);
        }         

        return new Response($fileName);
    }
}

