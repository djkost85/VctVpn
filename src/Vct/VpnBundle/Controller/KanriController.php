<?php

namespace Vct\VpnBundle\Controller;
use Vct\VpnBundle\Form\Type\TUserNewType;
use Vct\VpnBundle\Form\Type\TUserUpdateType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Vct\VpnBundle\Entity\TUser;
use Vct\VpnBundle\Repository\TUserRepository;

class KanriController extends Controller
{
    public function indexAction($name)
    {
        return $this
            ->render('VctVpnBundle:Kanri:index.html.twig',
                array('name' => $name));
    }

    public function infoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('VctVpnBundle:TUser');

        $users = $repo->getTUserWithCount('99');

        $arr['users'] = $users;
        $arr['user_ids'] = 'ab';

        return $this->render('VctVpnBundle:Kanri:info.html.twig', $arr);
    }

    public function aboutAction(Request $request)
    {
        return $this->render('VctVpnBundle:Kanri:about.html.twig');
    }

    public function  contactAction(Request $request)
    {
//        $email = "yuwj86@163.com";
//        $subject = "subject blabla";
//        $name = "name blabla";
//        $body = "body blabla";

        $enquiry = new TUser();
        $enquiry->setEmail('yuwj86@163.com');

        $message = \Swift_Message::newInstance()
            ->setSubject('Contact enquiry from symblog')
            ->setFrom('yuwj86@gmail.com')
            ->setTo('yuwj86@163.com')
            ->setBody($this->renderView('VctVpnBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
        $this->get('mailer')->send($message);

        $this->get('session')->setFlash('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

        return $this
            ->render('VctVpnBundle:Kanri:index.html.twig',
                array('name' => "name bla"));

        // Redirect - This is important to prevent users re-posting
        // the form if they refresh the page
//        return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
//
//        return $this->render('VctVpnBundle:Kanri:contact.html.twig');
    }

    public function newAction(Request $request)
    {
        $user = new TUser();
        $form = $this->createForm(new TUserNewType(), $user);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                echo 'validate <br/>';
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $user_id = $user->getId();
                return $this->redirect($this->generateUrl('vct_vpn_kanri_confirm', array('user_id' => $user_id)));
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

    public function deleteAction(Request $request)
    {

        $ids = $request->request->get('ids');
        var_dump($ids);

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('VctVpnBundle:TUser');
        $users = $repo->getTUserInArray($ids);

        if ($request->isMethod('POST')) {
            $repo->deleteTUserInArray($ids);
        }

        $arr['users'] = $users;
        $arr['user_ids'] = 'ab';

        return $this->render('VctVpnBundle:Kanri:delete.html.twig', $arr);


    }

    public function updateAction($user_id)
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('VctVpnBundle:TUser');
        $user = $repo->findOneBy(array('id' => $user_id));

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

                return $this->redirect($this->generateUrl('vct_vpn_kanri_confirm', array('user_id' => $user_id)));
            } else {
                echo 'not validate <br/>';

                //     			$validator = $this->get('validator');
                //     			$errors = $validator->validate($user, array('registration'));
                //     			var_dump($errors);
            }
        }

        return $this
            ->render('VctVpnBundle:Kanri:update.html.twig',
                array('form' => $form->createView(), 'user_id' => $user->getId()));

    }

    public function confirmAction($user_id)
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('VctVpnBundle:TUser');
        $user = $repo->findOneBy(array('id' => $user_id));

        $arr['user'] = $user;

        return $this->render('VctVpnBundle:Kanri:confirm.html.twig', $arr);
    }

    public function refreshUserState(TUser $tUser)
    {


    }

    public  function notFoundAction()
    {
        throw $this->createNotFoundException('The page dose not exitst');
    }
}
