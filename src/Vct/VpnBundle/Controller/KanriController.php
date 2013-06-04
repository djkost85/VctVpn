<?php

namespace Vct\VpnBundle\Controller;

use Vct\VpnBundle\Form\Type\TUserType;

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
//     	$user->setEmail('email');

//     	$form = $this->createFormBuilder($user)->add('vpnServerId','text')->add('email','text')->add('registerDate','date')->getForm();
    	$form = $this->createForm(new TUserType(),$user);
    	
    	if($request->isMethod('POST')) {
    		$form->bind($request);
    		
    		if($form->isValid()) {
    			echo 'validate';
    		}	
    	}
    	
    	return $this->render('VctVpnBundle:Kanri:new.html.twig',array('form'=>$form->createView()));
    }
    
    public function infoAction(Request $request)
    {
//     	return $this->render('VctVpnBundle:Default:index.html.twig', array('name' => 'test_new'));
    	
    	return $this->render('VctVpnBundle:Kanri:info.html.twig');
    }
    
}