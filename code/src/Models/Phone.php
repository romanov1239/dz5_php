<?php

namespace Geekbrains\Application1\Models;

class Phone
{
    public string $phone;

    public function __construct ()
    {
        $this->phone = '+7111111';
    }

    public function getPhone (): string
    {
        return $this->phone;
    }

}
