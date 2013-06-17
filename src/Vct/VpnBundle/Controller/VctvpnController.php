<?php

namespace Vct\VpnBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vct\VpnBundle\Entity\TUser;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VctvpnController extends Controller
{

    public function indexAction($name)
    {
        return $this
            ->render('VctVpnBundle:Vctvpn:index.html.twig',
                array('name' => $name));
    }

    public function echoJsonAction(Request $request)
    {
        $param_get = $request->query->all();

        $response = new Response(json_encode(array($param_get)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function showUserAction(Request $request)
    {

// 		return $this
// 				->render('VctVpnBundle:Vctvpn:index.html.twig',
// 						array('name' => 'bala'));

        $param_get = $request->query->all();
        $user_id = $param_get['id'];

        // 		var_dump($user_id);

        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('VctVpnBundle:TUser');
        $user = $repo->findOneBy(array('id' => $user_id));


        $arr['user'] = $user;
//        var_dump($user);
// 		$arr['user_ids'] = 'ab';

        return $this->render('VctVpnBundle:Vctvpn:info.html.twig', $arr);
    }

}
