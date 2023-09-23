<?php

namespace App\Generator;
use App\Kernel;
use App\Generator\MessageGenerator;

class UuidGenerate{

    /**
     * @throws \Exception
     */

    public function generate():
    int {
        return random_int(0, 100);
    }

}
