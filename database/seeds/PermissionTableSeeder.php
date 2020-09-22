<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'laporan-list',
            'laporan-create',
            'laporan-edit',
            'laporan-delete',
            'transaksi-list',
            'transaksi-create',
            'transaksi-edit',
            'transaksi-delete',
            'kategori-list',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',
            'rangkuman-list',
            'foto-list',
            'foto-create',
            'foto-edit',
            'foto-delete',
            'video-list',
            'video-create',
            'video-edit',
            'video-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
