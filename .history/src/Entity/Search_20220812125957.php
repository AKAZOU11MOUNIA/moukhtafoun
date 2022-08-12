<?php

namespace App\Entity;

class Search{
    /**
     * @var int|null
     */
    private $age;

    /**
     * @var string|null
     */
    private $ville;
    
    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}