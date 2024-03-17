<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'sub-admin-list',
            'sub-admin-create',
            'sub-admin-edit',
            'sub-admin-delete',
            'home-slider-list',
            'home-slider-create',
            'home-slider-edit',
            'home-slider-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'cms-page-list',
            'cms-page-create',
            'cms-page-edit',
            'cms-page-delete',
            'faq-list',
            'faq-create',
            'faq-edit',
            'faq-delete',
            'footer-setting-create',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission ,'guard_name' => 'admin']);
        }
    }
}
