<?php

namespace JobPostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobDetails
 *
 * @ORM\Table(name="job_details")
 * @ORM\Entity(repositoryClass="JobPostBundle\Repository\JobDetailsRepository")
 */
class JobDetails
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
     * @var string
     *
     * @ORM\Column(name="cname", type="string", length=100, nullable=true)
     */
    private $cname;

    /**
     * @var string
     *
     * @ORM\Column(name="cdescription", type="text", length=65535, nullable=true)
     */
    private $cdescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ts", type="datetime", nullable=true)
     */
    private $ts;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="RequirementJob", mappedBy="job", cascade={"persist"})
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $requirementJob;

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
     * Set cname
     *
     * @param string $cname
     *
     * @return JobDetails
     */
    public function setCname($cname)
    {
        $this->cname = $cname;

        return $this;
    }

    /**
     * Get cname
     *
     * @return string
     */
    public function getCname()
    {
        return $this->cname;
    }

    /**
     * Set cdescription
     *
     * @param string $cdescription
     *
     * @return JobDetails
     */
    public function setCdescription($cdescription)
    {
        $this->cdescription = $cdescription;

        return $this;
    }

    /**
     * Get cdescription
     *
     * @return string
     */
    public function getCdescription()
    {
        return $this->cdescription;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return JobDetails
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set ts
     *
     * @param \DateTime $ts
     *
     * @return JobDetails
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
     * Constructor
     */
    public function __construct()
    {
        $this->requirementJob = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add requirementJob
     *
     * @param \JobPostBundle\Entity\RequirementJob $requirementJob
     *
     * @return JobDetails
     */
    public function addRequirementJob(\JobPostBundle\Entity\RequirementJob $requirementJob)
    {
        $this->requirementJob[] = $requirementJob;

        return $this;
    }

    /**
     * Remove requirementJob
     *
     * @param \JobPostBundle\Entity\RequirementJob $requirementJob
     */
    public function removeRequirementJob(\JobPostBundle\Entity\RequirementJob $requirementJob)
    {
        $this->requirementJob->removeElement($requirementJob);
    }

    /**
     * Get requirementJob
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequirementJob()
    {
        return $this->requirementJob;
    }
}
