<?php

namespace App\Services\Interfaces;

use App\Services\Interfaces\BaseInterFace;

interface SettingsServiceInterface
{
    public function update(array $attributes, int $id);
}