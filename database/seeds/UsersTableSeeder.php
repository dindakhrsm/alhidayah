<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
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
        //reset the users table
        DB::statement(' SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        //generate 3 users/author
        // DB::table('users')->insert([
        //     [
        //         'name' => "Bambang Setiabudi",
        //         'username' => "bambang",
        //         'email' => "b.setiabudi@bapeten.go.id",
        //         'password' => bcrypt('secret')
        //     ],

        //     [
        //         'name' => "Dinda Kharisma",
        //         'username' => "dinda",
        //         'email' => "d.kharisma@bapeten.go.id",
        //         'password' => bcrypt('secret')
        //     ],

        //     [
        //         'name' => "Amsirahk Adnid",
        //         'username' => "amsi",
        //         'email' => "amsirahk@test.com",
        //         'password' => bcrypt('secret')
        //     ],
        // ]);

        $superadmin = User::create([
            'name' => 'Super Admin',
            'username' => "superadmin",
            'email' => 'superadmin@bapeten.go.id',
            'password' => bcrypt('bismillah'),
        ]);
        $role = Role::create(['name' => 'superadmin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        // $superadmin->assignRole('superadmin');
        $superadmin->assignRole([$role->id]);

        $admin = User::create([
            'name' => 'Admin',
            'username' => "admin",
            'email' => 'admin@bapeten.go.id',
            'password' => bcrypt('bismillah'),
        ]);
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $pelak1 = User::create([
            'name' => 'Pelaksana 1',
            'username' => "pelak1",
            'email' => 'pelak1@bapeten.go.id',
            'password' => bcrypt('bismillah'),
        ]);
        $role = Role::create(['name' => 'pelak1']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $pelak1->assignRole([$role->id]);

        $pelak2 = User::create([
            'name' => 'Pelaksana 2',
            'username' => "pelak2",
            'email' => 'pelak2@bapeten.go.id',
            'password' => bcrypt('bismillah'),
        ]);
        $role = Role::create(['name' => 'pelak2']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $pelak2->assignRole([$role->id]);
    }
}
