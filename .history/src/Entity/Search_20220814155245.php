<?php

namespace App\Entity;

class Search{
    /**
     * @var int|null
     */
    private $age;

    /**
     * @var array|null
     */
    private $ville= [];
    
    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
    public function getVille(): ?array
    {
        return $this->ville;
    }

    public function setVille(array $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}