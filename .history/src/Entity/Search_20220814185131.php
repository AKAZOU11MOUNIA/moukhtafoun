<?php

namespace App\Entity;

class Search{
    /**
     * @var int|null
     */
    public $age;

    /**
     * @var string|null
     */
    public $ville;
    
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