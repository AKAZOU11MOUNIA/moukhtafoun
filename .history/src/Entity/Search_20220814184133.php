<?php

namespace App\Entity;

use phpDocumentor\Reflection\Types\Boolean;

class Search{
    /**
     * @var boolean
     */
    public $age=false;

    /**
     * @var string|null
     */
    public $ville;
    
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