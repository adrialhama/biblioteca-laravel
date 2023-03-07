<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamos>
 */
class PrestamosFactory extends Factory
{
    /**
     *Este código genera un número aleatorio para los campos id_user e id_libro
     * utilizando el método numberBetween del objeto $faker.
     * Luego, genera la fecha de préstamo actual con Carbon::now() y agrega 30 días
     * para generar la fecha de vencimiento.
     * La fecha de devolución se establece en null.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha_prestamo = Carbon::now();
        $fecha_vencimiento = $fecha_prestamo->addDays(30);

        return [
            'id_user' => $this->faker->numberBetween(1, 10),
            'id_libro' => $this->faker->numberBetween(1, 20),
            'fecha_prestamo' => $fecha_prestamo,
            'fecha_vencimiento' => $fecha_vencimiento,
            'fecha_devolucion' => null,
        ];
    }
}
