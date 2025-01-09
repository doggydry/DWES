<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '€50,000',
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '€10,000',
            ],
            [
                'id' => 3,
                'title' => 'Director',
                'salary' => '€40,000',
            ]
        ];
    }
    public static function find(int $id): array
    {
        // Busca el primer trabajo que coincida con el id dado (primero se llama al metodo y luego con fn() => se busca el primer $job que coincida con el $id)
        $job =  Arr::first(static::all(), fn($job) => $job['id'] == $id);
        // Para controlar que no salga errores al acceder a ids que no esten en el array
        if (! $job) {
            abort(404);
        }
        return $job;
    }
}
