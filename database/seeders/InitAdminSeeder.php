<?php

namespace Database\Seeders;

use App\Models\Genres;
use App\Models\Types;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=>bcrypt('admin')
        ]);
        Role::create(['name'=>'admin']);
        Permission::create(['name' => 'give_permission_super_admin']);
        Permission::create(['name' => 'manage accounts']);



        $permission=Permission::first();
        $role=Role::findById(1);
        $role->givePermissionTo($permission);
        $user=User::all()->first();
        $user->givePermissionTo('manage accounts');
        $user->assignRole('admin');

        //Data insert into table
        $genres=['علمي','أكشن','رومانسي','كوميدي','دراما','خيال','رعب','غموض','مغامرات'];
        $types=['اسباني','أمريكي','تركي','مصري','كوري','انمي','صيني','روسي','عربي'];

        for ($index=0;$index<=8;$index++) {
            Types::create(['name'=>$types[$index]]);
            Genres::create(['name' => $genres[$index]]);
        }

    }
}
