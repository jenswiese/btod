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
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Section", inversedBy="routes", cascade={"persist"})
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     * @var Section
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="routes", cascade={"persist"})
     * @ORM\JoinColumn(name="setter_id", referencedColumnName="id")
     * @var User
     */
    private $setter;

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
     * @return Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param Section $section
     */
    public function setSection(Section $section)
    {
        $this->section = $section;
    }

    /**
     * @return User
     */
    public function getSetter()
    {
        return $this->setter;
    }

    /**
     * @param User $setter
     */
    public function setSetter(User $setter)
    {
        $this->setter = $setter;
    }


//- Name
//- Ort (Sektor 1)
//- Schwierigkeitsgrad (weiß)
//- Top out (ja/nein)
//- Setter (z.B. Jonas)
//- type (dynamic, static)
}