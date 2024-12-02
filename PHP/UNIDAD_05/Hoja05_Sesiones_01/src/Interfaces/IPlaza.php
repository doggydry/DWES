<?php 
namespace Sesiones\Interfaces;

use Sesiones\Models\ModeloPlaza;

interface IPlaza{
    public function index(): array;
    public function mostrar(int $numero): ModeloPlaza;
    public function actualizar(int $numero): bool;
    public function borrar(int $numero): bool;
}