<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class PhotoData implements Response
{
    private string $filename;
    private ?string $photo;
    private ?int $photoLength;
    private ?string $locX;
    private ?string $locY;

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhotoLength(?int $photoLength): static
    {
        $this->photoLength = $photoLength;
        return $this;
    }

    public function getPhotoLength(): ?int
    {
        return $this->photoLength;
    }

    public function setLocX(?string $locX): static
    {
        $this->locX = $locX;
        return $this;
    }

    public function getLocX(): ?string
    {
        return $this->locX;
    }

    public function setLocY(?string $locY): static
    {
        $this->locY = $locY;
        return $this;
    }

    public function getLocY(): ?string
    {
        return $this->locY;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setFilename($response['Bestandsnaam'] ?? '')
            ->setPhoto($response['Foto'] ?? null)
            ->setPhotoLength(isset($response['FotoLengte']) ? (int) $response['FotoLengte'] : null)
            ->setLocX($response['LocX'] ?? null)
            ->setLocY($response['LocY'] ?? null);
    }
}
