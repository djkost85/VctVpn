<?php

namespace Vct\VpnBundle\Repository;
use Doctrine\ORM\EntityRepository;

class TUserRepository extends EntityRepository {

	public function getTUserWithCount($count) {
		return $this->getEntityManager()
				// 				->createQuery('SELECT * FROM VctVpnBundle:TUser limit :count')
				// 				->setParameters(array('count' => $count))->getResult();
				->createQuery('SELECT t FROM VctVpnBundle:TUser t')
				->getResult();

		// 		$em = $this->getDoctrine()->getManager();
		// 		$query = $em->createQuery(
		// 				'SELECT p FROM AcmeStoreBundle:Product p WHERE p.price > :price ORDER BY p.price ASC'
		// 		)->setParameter('price', '19.99');

	}
}
