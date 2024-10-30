<?php

namespace App\Domain\Bowlingbahn\Model;

class Bowlingbahn
{
    private ?string $name = null;

    public function setName(string $string): Bowlingbahn
    {
        $this->name = $string;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}