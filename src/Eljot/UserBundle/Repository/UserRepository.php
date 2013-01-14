<?php

namespace Eljot\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUserByWanId($wanId)
    {
        $query = $this->_em->createQueryBuilder('u')
            ->select('u')
            ->from('InhouseUserBundle:User', 'u')
            ->join('u.migration', 'm')
            ->where('m.wanId =:wanId')
            ->setParameter('wanId', $wanId)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    public function updateMigrationGroupByIds(array $userIds, $migrationGroupId)
    {
        $query = $this->_em->createQuery('update InhouseUserBundle:User u set u.migrationGroup = ?1 where u.id in (?2)');
        $query->setParameter(1, $migrationGroupId);
        $query->setParameter(2, $userIds);
        $updatedNumber = $query->execute();

        return $updatedNumber;
    }
}