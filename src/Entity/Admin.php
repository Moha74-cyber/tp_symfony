<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $invite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvite(): ?string
    {
        return $this->invite;
    }

    public function setInvite(string $invite): self
    {
        $this->invite = $invite;

        return $this;
    }
}
