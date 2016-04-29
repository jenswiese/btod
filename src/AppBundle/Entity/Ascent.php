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
 * @ORM\Table(name="ascent")
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="climber_id",referencedColumnName="id")
     */
    private $climber;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Route")
     * @ORM\JoinColumn(name="route_id",referencedColumnName="id")
     */
    private $route;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
}