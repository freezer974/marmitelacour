<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('label', 'Admin')->first();
        $role_cuisinier = Role::where('label', 'Cuisinier')->first();
        $role_particulier = Role::where('label', 'Particulier')->first();

        $options = [
            'cost' => 12,
        ];

        $admin = new User(); 
        $admin->name = 'Admin1';
        $admin->lastname = 'Admin1';
        $admin->firstname = 'Admin1';
        $admin->email = 'admin1@societe.com';
        $admin->email_verified_at = Carbon::now();
        $admin->password = password_hash('admin1', PASSWORD_BCRYPT, $options);
        $admin->save();
        $admin->roles()->attach($role_admin);

        $cuisinier = new User(); 
        $cuisinier->name = 'Cuisinier1';
        $cuisinier->lastname = 'Cuisinier1';
        $cuisinier->firstname = 'Cuisinier1';
        $cuisinier->specialite = 'cuisine chinoise';
        $cuisinier->email = 'cuisinier1@societe.com';
        $cuisinier->email_verified_at = Carbon::now();
        $cuisinier->password = password_hash('cuisinier1', PASSWORD_BCRYPT, $options);
        $cuisinier->save();
        $cuisinier->roles()->attach($role_cuisinier);

        $particulier = new User(); 
        $particulier->name = 'Particulier1';
        $particulier->lastname = 'Particulier1';
        $particulier->firstname = 'Particulier1';
        $particulier->telephone = '0262123456';
        $particulier->email = 'particulier1@societe.com';
        $particulier->email_verified_at = Carbon::now();
        $particulier->password = password_hash('particulier1', PASSWORD_BCRYPT, $options);
        $particulier->save();
        $particulier->roles()->attach($role_particulier);
    }
}
