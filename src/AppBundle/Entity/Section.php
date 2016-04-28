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
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Spot", inversedBy="sections")
     * @ORM\JoinColumn(name="spot_id", referencedColumnName="id")
     */
    private $spot;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Route", mappedBy="section")
     */
    private $routes;
}