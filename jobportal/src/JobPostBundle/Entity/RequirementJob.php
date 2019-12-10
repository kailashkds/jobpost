<?php

namespace JobPostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequirementJob
 *
 * @ORM\Table(name="requirement_job", indexes={@ORM\Index(name="job_id", columns={"job_id"}), @ORM\Index(name="requirement_master_id", columns={"requirement_master_id"})})
 * @ORM\Entity
 */
class RequirementJob
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="JobDetails")
     * @ORM\JoinColumn(name="job_id", referencedColumnName="id", nullable=false )
     */

    private $job;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="RequirementMaster")
     * @ORM\JoinColumn(name="requirement_master_id", referencedColumnName="id")
     * 
     */
    private $requirement;

    /**
     * @var string
     *
     * @ORM\Column(name="operator", type="string", length=45, nullable=true)
     */
    private $operator = 'OR';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ts", type="datetime", nullable=true)
     */
    private $ts;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set requirement
     *
     * @param integer $requirement
     *
     * @return RequirementJob
     */
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;

        return $this;
    }

    /**
     * Get requirement
     *
     * @return integer
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * Set operator
     *
     * @param string $operator
     *
     * @return RequirementJob
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set ts
     *
     * @param \DateTime $ts
     *
     * @return RequirementJob
     */
    public function setTs($ts)
    {
        $this->ts = $ts;

        return $this;
    }

    /**
     * Get ts
     *
     * @return \DateTime
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * Set job
     *
     * @param \JobPostBundle\Entity\JobDetails $job
     *
     * @return RequirementJob
     */
    public function setJob(\JobPostBundle\Entity\JobDetails $job = null)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \JobPostBundle\Entity\JobDetails
     */
    public function getJob()
    {
        return $this->job;
    }
    
    private $customRequirement;
    
    public function getCustomRequirement(){
        return $this->customRequirement;
    }
    
    public function setCustomRequirement($customRequirement){
        $this->customRequirement = $customRequirement;
    }
}
