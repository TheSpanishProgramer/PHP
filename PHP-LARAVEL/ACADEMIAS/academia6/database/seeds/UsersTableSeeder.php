<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRol = Role::create(['name' => 'admin']);
        $alumnoRol = Role::create(['name' => 'alumno']);
        $profesorRol = Role::create(['name' => 'profesor']);
        $invitadoRol = Role::create(['name' => 'invitado']);

        factory(User::class)->create([
            'name' => 'Admin1',
            'email' => 'admin@gmail.com',
        ])->assignRole($adminRol);

        factory(User::class)->create([
            'name' => 'Profesor1',
            'email' => 'profesor@gmail.com',
        ])->assignRole($profesorRol);

        factory(User::class)->create([
            'name' => 'Alumno1',
            'email' => 'alu@gmail.com',
        ])->assignRole($alumnoRol)->subjects()->attach([1,2,3]);

        factory(User::class)->create([
            'name' => 'Invitado1',
            'email' => 'invitado@gmail.com',
        ])->assignRole($invitadoRol);

        factory(User::class, 6)->create()->each->assignRole($alumnoRol);
        factory(User::class, 3)->create()->each->assignRole($profesorRol);
        factory(User::class, 2)->create()->each->assignRole($invitadoRol);
    }
}
