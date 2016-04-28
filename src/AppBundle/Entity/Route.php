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
 * @ORM\Table(name="route")
 */
class Route
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deletedAt;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Section", inversedBy="routes")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Setter", inversedBy="routes")
     * @ORM\JoinColumn(name="setter_id", referencedColumnName="id")
     */
    private $setter;



//- Name
//- Ort (Sektor 1)
//- Schwierigkeitsgrad (weiß)
//- Top out (ja/nein)
//- Setter (z.B. Jonas)
//- type (dynamic, static)
}