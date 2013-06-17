<?php

namespace Vct\VpnBundle\Repository;
use Doctrine\ORM\EntityRepository;

class TUserRepository extends EntityRepository
{
    public function getTUserWithCount($count)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT t FROM VctVpnBundle:TUser t')
            ->setMaxResults($count)->getResult();
    }

    public function getTUserInArray($zArray)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT t FROM VctVpnBundle:TUser t where t.id IN (:zArray)')
            ->setParameter('zArray', $zArray)->getResult();
    }

    public function deleteTUserInArray($zArray)
    {
        return $this->getEntityManager()
            ->createQuery(
                'DELETE VctVpnBundle:TUser t where t.id IN (:zArray)')
            ->setParameter('zArray', $zArray)->getResult();
    }
}
