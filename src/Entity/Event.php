<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
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
    private $nature;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreInvite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToMany(targetEntity=invite::class, inversedBy="events")
     */
    private $invites;

    /**
     * @ORM\ManyToMany(targetEntity=oeuvre::class, inversedBy="events")
     */
    private $oeuvres;

    /**
     * @ORM\OneToMany(targetEntity=Enchere::class, mappedBy="event")
     */
    private $encheres;

    public function __construct()
    {
        $this->invites = new ArrayCollection();
        $this->oeuvres = new ArrayCollection();
        $this->encheres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNbreInvite(): ?int
    {
        return $this->nbreInvite;
    }

    public function setNbreInvite(int $nbreInvite): self
    {
        $this->nbreInvite = $nbreInvite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection|invite[]
     */
    public function getInvites(): Collection
    {
        return $this->invites;
    }

    public function addInvite(invite $invite): self
    {
        if (!$this->invites->contains($invite)) {
            $this->invites[] = $invite;
        }

        return $this;
    }

    public function removeInvite(invite $invite): self
    {
        $this->invites->removeElement($invite);

        return $this;
    }

    /**
     * @return Collection|oeuvre[]
     */
    public function getOeuvres(): Collection
    {
        return $this->oeuvres;
    }

    public function addOeuvre(oeuvre $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres[] = $oeuvre;
        }

        return $this;
    }

    public function removeOeuvre(oeuvre $oeuvre): self
    {
        $this->oeuvres->removeElement($oeuvre);

        return $this;
    }

    /**
     * @return Collection|Enchere[]
     */
    public function getEncheres(): Collection
    {
        return $this->encheres;
    }

    public function addEnchere(Enchere $enchere): self
    {
        if (!$this->encheres->contains($enchere)) {
            $this->encheres[] = $enchere;
            $enchere->setEvent($this);
        }

        return $this;
    }

    public function removeEnchere(Enchere $enchere): self
    {
        if ($this->encheres->removeElement($enchere)) {
            // set the owning side to null (unless already changed)
            if ($enchere->getEvent() === $this) {
                $enchere->setEvent(null);
            }
        }

        return $this;
    }
}
