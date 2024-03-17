<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\PermissionSeeder;
use Spatie\Permission\Models\Permission;
use Database\Seeders\CountdownManageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(PermissionSeeder::class);
        // $this->call(RolesSeeder::class);

        $role = Role::where(['name' => 'admin'])->first();
        $role->syncPermissions(Permission::all());
        
        // $admin = \App\Models\Admin::create([
        //     'name'           => "admin",
        //     'email'          => 'admin@admin.com',
        //     'password'       => '$2y$10$DFVs5Bo4sAT/f8XeFQifFuDBlqib/Tzvr2UXXk6yOyjxr5DjSFqCa',   // password
        //     'remember_token' => Str::random(10),
        // ]);
        // $admin->assignRole('admin');
    }
}
