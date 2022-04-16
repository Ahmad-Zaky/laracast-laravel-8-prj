<?php

namespace App\Services\Newsletters;

use App\Services\Newsletters\Contracts\Newsletter;

class ConvertKit implements Newsletter {

    public function subscribe(string $email, string $list = null)
    {
        // subscribe
    }
}