<?php

namespace App\DTO;

use App\DTO\impl\MovieDTO;

interface IDTOCheck
{

    public static function check(?int $id, array $data): MovieDTO;
}
