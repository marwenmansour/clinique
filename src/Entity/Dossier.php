<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierRepository::class)
 */
class Dossier
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
    private $nombre_rdv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreRdv(): ?int
    {
        return $this->nombre_rdv;
    }

    public function setNombreRdv(int $nombre_rdv): self
    {
        $this->nombre_rdv = $nombre_rdv;

        return $this;
    }
}
