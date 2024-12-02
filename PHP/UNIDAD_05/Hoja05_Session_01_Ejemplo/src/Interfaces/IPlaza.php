<?php

namespace Funicular\Interfaces;

use Funicular\Models\PlazaModel;

interface IPlaza
{
    public function index(): array;
    public function show(int $numero): PlazaModel;
    public function update(int $numero): bool;
    public function delete(int $numero): bool;
}
