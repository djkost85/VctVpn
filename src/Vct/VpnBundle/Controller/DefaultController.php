<?php

namespace Vct\VpnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VctVpnBundle:Default:index.html.twig', array('name' => $name));
    }
}
