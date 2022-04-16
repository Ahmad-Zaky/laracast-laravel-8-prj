<?php

namespace App\Services\Newsletters\Contracts;

interface Newsletter {

    public function subscribe(string $email, string $list = null);
}