<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'universitas' => fake()->randomElement(['ARS University', 'STIT Bandung', 'IMWI', 'UICM', 'STIEB Bina Esa']),
            'jalur_program' => fake()->randomElement(['KIP', 'Non-KIP']),
            'no_kip' => strtoupper($this->faker->bothify('?##?#?')),
            'file_kip' => 'uploads/kip/sample.pdf/sample.jpg',

            'nama_lengkap' => fake()->name(),
            'nisn' => fake()->numerify('##########'), //10 digit
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'nama_ibu_kandung' => fake()->name(),
            'kewarganegaraan' => fake()->country(),
            'nik' => fake()->numerify('################'), // 16 digit

            'file_ijazah' => 'uploads/ijazah/sample.pdf/sample.jpg',
            'no_ijazah' => strtoupper($this->faker->randomElement([
                'DN-' . $this->faker->numerify('##/UNIV/20##/#####'),
                'IJZ/' . $this->faker->lexify('???') . '/' . $this->faker->numerify('20##-#####'),
                'STTB/' . $this->faker->lexify('???') . '/' . $this->faker->numerify('20##/####')
            ])),
            'file_transkrip' => 'uploads/transkrip/sample.pdf/sample.jpg',
            'file_foto' => 'uploads/foto/sample.jpg/sample.png',

            'fakultas' => fake()->word(),
            'program_studi' => fake()->randomElement([
                'Teknik Informatika',
                'Sistem Informasi',
                'Manajemen',
                'Akuntansi',
                'Desain Komunikasi Visual'
            ]),

            'no_hp' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}