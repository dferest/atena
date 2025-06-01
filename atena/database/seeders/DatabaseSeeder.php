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

        $admin = User::create([
            'name' => 'Direccion',
            'email' => 'direccion@iesbarajas.com',
            'password' => bcrypt('direccion'),
        ]);
        $admin->assignRole('admin');
    }
}
