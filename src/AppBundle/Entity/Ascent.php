<?php

/*
 * This file is part of the btod package.
 *
 * (c) Jens Wiese <jens@howtrueisfalse.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="ascent")
 * @ORM\HasLifecycleCallbacks()
 */
class Ascent
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\Type(type="AppBundle\Entity\ClimbingRoute")
     * @Assert\Valid()
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ClimbingRoute")
     * @ORM\JoinColumn(name="climbing_route_id", referencedColumnName="id")
     */
    private $climbingRoute;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->setCreatedAt(new \DateTime("now"));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClimbingRoute()
    {
        return $this->climbingRoute;
    }

    /**
     * @param mixed $climbingRoute
     */
    public function setClimbingRoute($climbingRoute)
    {
        $this->climbingRoute = $climbingRoute;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }


}