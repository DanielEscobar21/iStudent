<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Administrador',
        'email' => 'admin@istudent.com',
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'role'=>3,
        'nocontrol'=>18240281,
        'created_at' => now(),
        'updated_at' => now()])->assignRole('Administrador');

        User::create(['name' => 'Maestro',
        'email' => 'maestro@istudent.com',
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'role'=>2,
        'nocontrol'=>18240280,
        'created_at' => now(),
        'updated_at' => now()])->assignRole('Maestro');

        User::create(['name' => 'Estudiante',
        'email' => 'estudiante@istudent.com',
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'role'=>1,
        'nocontrol'=>18240282,
        'created_at' => now(),
        'updated_at' => now()])->assignRole('Estudiante');

        /*DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@istudent.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Leongto16'),
            'role'=>3,
            'nocontrol'=>18240281,
            'created_at' => now(),
            'updated_at' => now()
        ]);*/
        User::factory(50)->create();
    }
}
