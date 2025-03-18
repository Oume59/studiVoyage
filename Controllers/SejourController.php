<?php

namespace App\Controllers;
use App\Repository\SejourRepository;

class SejourController extends Controller {

    public function index ()
    {
        $sejourRepository = new SejourRepository();
        $sejours = $sejourRepository->findAll();
        $this->render("Sejours/index",[
            'sejours' => $sejours,
        ]);
    }

}