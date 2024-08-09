<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123')
        ]);

        $role = Role::create(['name' => 'Admin']);

        // $permissions = Permission::pluck('id','id')->all();

        $permissions = Permission::all(); // Atau gunakan filter sesuai dengan kebutuhan Anda
        $role->syncPermissions($permissions);


        $user->assignRole($role); // Menggunakan assignRole dari Spatie

        // Atau cara alternatif untuk menetapkan peran
        // $user->roles()->sync([$role->id]);

        // $user->assignRole([$role->id]);
    }
}
