<?php

namespace App\Services\Interfaces;

interface BaseInterFace
{
    public function all();
    public function store(array $attribute);
    public function update(array $attributes, int $id);
    public function find(int $id);
    public function delete(int $id);
    public function statusActive(int $id);
    public function statusInactive(int $id);
}
