<?php

namespace Vct\VpnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vct\VpnBundle\Entity\TUser;

use Symfony\Component\HttpFoundation\Request;

class KanriController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VctVpnBundle:Kanri:index.html.twig', array('name' => $name));
    }
    
    public function newAction(Request $request)
    {
//     	return $this->render('VctVpnBundle:Default:index.html.twig', array('name' => 'test_new'));
    	
    	$user = new TUser();
    	$user->setEmail('email');

    	$form = $this->createFormBuilder($user)->add('email','text')->getForm();
    	return $this->render('VctVpnBundle:Kanri:new.html.twig',array('form'=>$form->createView()));
    }
    
    public function infoAction(Request $request)
    {
//     	return $this->render('VctVpnBundle:Default:index.html.twig', array('name' => 'test_new'));
    	
    	return $this->render('VctVpnBundle:Kanri:info.html.twig');
    }
    
}