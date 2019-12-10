<?php

namespace JobPostBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Description of JobDetailsRepository
 *
 * @author Kailash sharma
 */
class JobDetailsRepository extends EntityRepository
{
    /**
     * 
     * @param array $skills
     * @return array
     */
    public function getRelatedJobs($skills) {
        
        $em = $this->getEntityManager();
        $rawQuery = 'SELECT cname, cdescription  FROM job_details where id  in (select distinct job_id from requirement_job where requirement_master_id in (:skils) and operator ="AND") AND id  in (select distinct job_id from requirement_job where requirement_master_id in (:skils) and operator ="OR")   OR id in (select distinct job_id from requirement_job where requirement_master_id in (:skils) and operator ="OR" and operator !="AND")'
                    .' union ' 
                    .'SELECT cname, cdescription FROM job_details where id  not in (select distinct job_id from requirement_job )';
        $statementDB = $em->getConnection()->prepare($rawQuery);
        $statementDB->bindValue('skils', implode(",",array_values($skills)));
        $statementDB->execute();
        $resultDatabase = $statementDB->fetchAll();

        return $resultDatabase;
        
    }
}
