<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Luodaan admin-rooli
        Role::create([
            'name' => 'admin',
            'description' => 'Pääkäyttäjä'
        ]);
        // Luodaan opettaja-rooli
        Role::create([
            'name' => 'teacher',
            'description' => 'Opettaja'
        ]);
        // Luodaan opiskelija-rooli
        Role::create([
            'name' => 'student',
            'description' => 'Opiskelija'
        ]);

        // Oikeudet
        Permission::create([
            'name' => 'update-info',
            'description' => 'Voi päivittää käyttäjän perustietoja'
        ]);
        Permission::create([
            'name' => 'update-student-info',
            'description' => 'Voi päivittää opiskelijan opiskeluun liittyviä tietoja'
        ]);
        Permission::create([
            'name' => 'update-role',
            'description' => 'Voi päivittää käyttäjän rooleja'
        ]);

        Role::first()->permissions()->attach(Permission::all()->pluck('id'));   // Admin-rooli saa kaikki oikeudet
        Role::find(2)->permissions()->attach([1, 2]);   // Teacher-rooli saa update-infon ja update-student-infon
        Role::find(3)->permissions()->attach(Permission::find(1));  // Student-rooli saa update-infon

    }
}
