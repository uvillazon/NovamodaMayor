<?php

namespace Novamoda\MayorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NovamodaMayorBundle:Proformas:index.html.twig');
//        return $this->render('NovamodaMayorBundle:Default:index.html.twig');
    }

    public function logonAction()
    {
        return $this->render('NovamodaMayorBundle:Default:login.html.twig');
    }
}
