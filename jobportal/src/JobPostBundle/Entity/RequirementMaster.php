<?php

namespace JobPostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequirementMaster
 *
 * @ORM\Table(name="requirement_master")
 * @ORM\Entity
 */
class RequirementMaster
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
     * @ORM\Column(name="requirement_name", type="string", length=150, nullable=true)
     */
    private $requirementName;

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=45, nullable=true)
     */
    private $groupName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

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
     * Set requirementName
     *
     * @param string $requirementName
     *
     * @return RequirementMaster
     */
    public function setRequirementName($requirementName)
    {
        $this->requirementName = $requirementName;

        return $this;
    }

    /**
     * Get requirementName
     *
     * @return string
     */
    public function getRequirementName()
    {
        return $this->requirementName;
    }

    /**
     * Set groupName
     *
     * @param string $groupName
     *
     * @return RequirementMaster
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return RequirementMaster
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
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
     * @return RequirementMaster
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
}
