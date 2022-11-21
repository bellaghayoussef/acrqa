<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $permission = Permission::create(['name' => 'super admin']);
        $role1 = Role::create(['name' => 'super admin']);
        $role1->givePermissionTo($permission);
         
          $permission2 = Permission::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo($permission2);

        $permission3 = Permission::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'user']);
        $role3->givePermissionTo($permission3);


        // \App\Models\User::factory(10)->create();
 $newUser = \App\Models\User::create([
                'email'    => 'abdellaoui.essahbi@gmail.com ',
                'password' => bcrypt('password'),
               'last_name' =>'abdellaoui',
               'first_name' =>'essahbi',
               'udd' =>'123456789',
               'phone' =>'50164060',
               'country_id' =>'1',
      
             
               

            ]);

$newUser->assignRole($role1);

         $countries = array(
            array('id' => '1','iso' => 'QA','name' => 'Qatar','nicename' => 'قطر','iso3' => 'QAR','numcode' => '4','phonecode' => '974'),
         
          );

          DB::table('countries')->insert($countries);

          


        
    }
}
