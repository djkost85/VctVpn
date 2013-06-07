<?php

namespace Vct\VpnBundle\Controller;
use Vct\VpnBundle\Form\Type\TUserType;
use Vct\VpnBundle\Form\Type\TUserUpdateType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Vct\VpnBundle\Entity\TUser;
use Vct\VpnBundle\Repository\TUserRepository;

class KanriController extends Controller {
	public function indexAction($name) {
		return $this
				->render('VctVpnBundle:Kanri:index.html.twig',
						array('name' => $name));
	}

	public function infoAction(Request $request) {
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('VctVpnBundle:TUser');

		$users = $repo->getTUserWithCount('99');

		$arr['users'] = $users;
		$arr['user_ids'] = 'ab';
		
		return $this->render('VctVpnBundle:Kanri:info.html.twig',$arr);
	}

	public function newAction(Request $request) {
		$user = new TUser();
		$form = $this->createForm(new TUserType(), $user);

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				echo 'validate <br/>';
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
			} else {
				echo 'not validate <br/>';

				//     			$validator = $this->get('validator');
				//     			$errors = $validator->validate($user, array('registration'));
				//     			var_dump($errors);
			}
		}

		return $this
				->render('VctVpnBundle:Kanri:new.html.twig',
						array('form' => $form->createView()));
	}
	
	public function deleteAction(Request $request) {
		
		$ids = $request->request->get('ids');
		var_dump($ids);
		
		
		
// 		return $this
// 		->render('VctVpnBundle:Kanri:index.html.twig',
// 				array('name' => 'deleteAction'));

		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('VctVpnBundle:TUser');
		
		$users = $repo->getTUserInArray($ids);
		// 		var_dump($users);
		
		$arr['users'] = $users;
		$arr['user_ids'] = 'ab';
		
		return $this->render('VctVpnBundle:Kanri:delete.html.twig',$arr);
		
		
	}
	
	public function updateAction($user_id) {
		
// 		$user = new TUser();
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('VctVpnBundle:TUser');
		$user = $repo->findOneBy(array('id'=>$user_id));
		
		var_dump($user);
		
		$form = $this->createForm(new TUserUpdateType(), $user);
		$request = $this->getRequest();
		
		if ($request->isMethod('POST')) {
			$form->bind($request);
		
			if ($form->isValid()) {
				echo 'validate <br/>';
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->redirect($this->generateUrl('vct_vpn_kanri_confirm',array('user_id'=>$user_id)));
			} else {
				echo 'not validate <br/>';
		
				//     			$validator = $this->get('validator');
				//     			$errors = $validator->validate($user, array('registration'));
				//     			var_dump($errors);
			}
		}
		
		return $this
		->render('VctVpnBundle:Kanri:update.html.twig',
				array('form' => $form->createView(),'user_id'=>$user->getId()));
		
	}
	
	public function confirmAction($user_id) {
		
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('VctVpnBundle:TUser');
		$user = $repo->findOneBy(array('id'=>$user_id));
		
		$arr['user'] = $user;
		
		return $this->render('VctVpnBundle:Kanri:confirm.html.twig',$arr);
	}

}
