<?php

namespace App\Entity;

use App\Repository\InviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InviteRepository::class)
 */
class Invite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="integer")
     */
    private $last_enchere;

    /**
     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="invites")
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity=Invite::class, inversedBy="invites")
     */
    private $encheres;

    /**
     * @ORM\ManyToMany(targetEntity=Invite::class, mappedBy="encheres")
     */
    private $invites;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->encheres = new ArrayCollection();
        $this->invites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getLastEnchere(): ?int
    {
        return $this->last_enchere;
    }

    public function setLastEnchere(int $last_enchere): self
    {
        $this->last_enchere = $last_enchere;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addInvite($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removeInvite($this);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEncheres(): Collection
    {
        return $this->encheres;
    }

    public function addEnchere(self $enchere): self
    {
        if (!$this->encheres->contains($enchere)) {
            $this->encheres[] = $enchere;
        }

        return $this;
    }

    public function removeEnchere(self $enchere): self
    {
        $this->encheres->removeElement($enchere);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getInvites(): Collection
    {
        return $this->invites;
    }

    public function addInvite(self $invite): self
    {
        if (!$this->invites->contains($invite)) {
            $this->invites[] = $invite;
            $invite->addEnchere($this);
        }

        return $this;
    }

    public function removeInvite(self $invite): self
    {
        if ($this->invites->removeElement($invite)) {
            $invite->removeEnchere($this);
        }

        return $this;
    }
}
