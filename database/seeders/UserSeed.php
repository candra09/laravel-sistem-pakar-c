<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('123')
        ]);

        $role = Role::create(['name' => 'Pengguna']);

        $permissions = Permission::whereIn('id', [24, 25, 26, 27])->get();

        $role->syncPermissions($permissions);

        $user->assignRole($role); // Menggunakan assignRole dari Spatie

        // Atau cara alternatif untuk menetapkan peran
        // $user->roles()->sync([$role->id]);

        // $user->assignRole([$role->id]);
    }
}
