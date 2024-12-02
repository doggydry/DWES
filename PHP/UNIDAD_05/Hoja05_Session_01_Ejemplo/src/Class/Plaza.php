<?php

namespace Funicular\Class;

use Funicular\Interfaces\IPlaza;
use Funicular\Models\PlazaModel;

class Plaza
{

    public function __construct(private readonly IPlaza $interface) {}

    public function index(): array
    {
        return $this->interface->index();
    }

    public function show(int $numero): PlazaModel
    {
        return $this->interface->show($numero);
    }

    public function update(int $numero): bool
    {
        return $this->interface->update($numero);
    }

    public function delete(int $numero): bool
    {
        return $this->interface->delete($numero);
    }
}
