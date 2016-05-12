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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="section")
 */
class Section
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Spot", inversedBy="sections", cascade={"persist"})
     * @ORM\JoinColumn(name="spot_id", referencedColumnName="id")
     * @var Spot
     */
    private $spot;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ClimbingRoute", mappedBy="section", cascade={"persist"})
     * @var ClimbingRoute[]
     */
    private $routes;


    public function __construct()
    {
        $this->routes = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Spot
     */
    public function getSpot()
    {
        return $this->spot;
    }

    /**
     * @param Spot $spot
     */
    public function setSpot($spot)
    {
        $this->spot = $spot;
    }

    /**
     * @return ClimbingRoute[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    public function addRoute(ClimbingRoute $route)
    {
        $this->routes->add($route);
    }

}