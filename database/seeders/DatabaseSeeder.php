<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profesor;
use App\Models\Empresa;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'profesor']);
        Role::firstOrCreate(['name' => 'empresa']);
        Role::firstOrCreate(['name' => 'alumno']);

        $profesor = Profesor::create([
            'nombre' => 'David',
            'ape1' => 'Gómez',
            'ape2' => 'Esteban',
            'telefono' => '658962348',
            'email' => 'david.gomez@iesbarajas.com',
            'dni' => '15498632A',
            'titulacion' => 'Ingeniería Informatica',
            'direccion' => 'Calle Profesor 1',
            'fecha_nacimiento' => '1978-11-01',
        ]);

        $empresa = Empresa::create([
            'nombre' => 'Factor Libre',
            'nif' => 'B12345678',
            'email' => 'info@factorlibre.com',
            'telefono' => '665894326',
            'direccion' => 'Paseo de las Delicias, 20',
            'ciudad' => 'Madrid',
            'ceo' => 'Carlos Liébana',
        ]);

         $alumno = Alumno::create([
            'nombre' => 'Diego',
            'ape1' => 'Fernandez',
            'ape2' => 'Esteban',
            'email' => 'diego.fernandez@iesbarajas.com',
            'telefono' => '695459638',
            'direccion' => 'Calle Alumno',
            'ciudad' => 'Torrejón de Ardoz',
            'fecha_nacimiento' => '2004-11-08',
            'dni' => '87654321B',
        ]);

        $admin = User::create([
            'name' => 'Direccion',
            'email' => 'direccion@iesbarajas.com',
            'password' => bcrypt('direccion'),
        ]);
        $admin->assignRole('admin');

        $profesorUser = User::create([
            'name' => 'Profesor',
            'email' => 'profesor@iesbarajas.com',
            'password' => bcrypt('profesor'),
            'profesor_id' => 1,
        ]);
        $profesorUser->assignRole('profesor');

        $empresaUser = User::create([
            'name' => 'Empresa',
            'email' => 'empresa@iesbarajas.com',
            'password' => bcrypt('empresa'),
            'empresa_id' => 1,
        ]);
        $empresaUser->assignRole('empresa');

        $alumnoUser = User::create([
            'name' => 'Diego',
            'email' => 'diego.fernandez@iesbarajas.com',
            'password' => bcrypt('diego'),
            'alumno_id' => 1,
        ]);
        $alumnoUser->assignRole('alumno');
    }
}
