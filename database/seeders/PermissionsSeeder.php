<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            ["id"=>1,"name"=>"View destinations","guard_name"=>"web"],
            ["id"=>2,"name"=>"Manage destinations","guard_name"=>"web"],
            ["id"=>3,"name"=>"View FQAs","guard_name"=>"web"],
            ["id"=>4,"name"=>"Manage FQAs","guard_name"=>"web"],
            ["id"=>5,"name"=>"View heroes","guard_name"=>"web"],
            ["id"=>6,"name"=>"Manage heroes","guard_name"=>"web"],
            ["id"=>7,"name"=>"View members","guard_name"=>"web"],
            ["id"=>8,"name"=>"Manage members","guard_name"=>"web"],
            ["id"=>9,"name"=>"View posts","guard_name"=>"web"],
            ["id"=>10,"name"=>"Manage posts","guard_name"=>"web"],
            ["id"=>11,"name"=>"View sections","guard_name"=>"web"],
            ["id"=>12,"name"=>"Manage sections","guard_name"=>"web"],
            ["id"=>13,"name"=>"View services","guard_name"=>"web"],
            ["id"=>14,"name"=>"Manage services","guard_name"=>"web"],
            ["id"=>15,"name"=>"View socials","guard_name"=>"web"],
            ["id"=>16,"name"=>"Manage socials","guard_name"=>"web"],
            ["id"=>17,"name"=>"View testimonials","guard_name"=>"web"],
            ["id"=>18,"name"=>"Manage testimonials","guard_name"=>"web"],
            ["id"=>19,"name"=>"View tour classifications","guard_name"=>"web"],
            ["id"=>20,"name"=>"Manage tour classifications","guard_name"=>"web"],
            ["id"=>21,"name"=>"View terms","guard_name"=>"web"],
            ["id"=>22,"name"=>"Manage terms","guard_name"=>"web"],
            ["id"=>23,"name"=>"View partners","guard_name"=>"web"],
            ["id"=>24,"name"=>"Manage partners","guard_name"=>"web"],
            ["id"=>25,"name"=>"View sites","guard_name"=>"web"],
            ["id"=>26,"name"=>"Manage sites","guard_name"=>"web"],
            ["id"=>27,"name"=>"Manage Authentication","guard_name"=>"web"],
            ["id"=>28,"name"=>"Manage Logs","guard_name"=>"web"],
        ]);

        DB::table('roles')->insert([
            ["id"=>1,"name"=>"Super Admin","guard_name"=>"web"]
        ]);

        DB::table('model_has_roles')->insert([
            ["role_id"=>1,"model_type"=>"App\Models\User","model_id"=>"1"],
        ]);

        DB::table('role_has_permissions')->insert([
            ["permission_id"=>1,"role_id"=>1],
            ["permission_id"=>2,"role_id"=>1],
            ["permission_id"=>3,"role_id"=>1],
            ["permission_id"=>4,"role_id"=>1],
            ["permission_id"=>5,"role_id"=>1],
            ["permission_id"=>6,"role_id"=>1],
            ["permission_id"=>7,"role_id"=>1],
            ["permission_id"=>8,"role_id"=>1],
            ["permission_id"=>9,"role_id"=>1],
            ["permission_id"=>10,"role_id"=>1],
            ["permission_id"=>11,"role_id"=>1],
            ["permission_id"=>12,"role_id"=>1],
            ["permission_id"=>13,"role_id"=>1],
            ["permission_id"=>14,"role_id"=>1],
            ["permission_id"=>15,"role_id"=>1],
            ["permission_id"=>16,"role_id"=>1],
            ["permission_id"=>17,"role_id"=>1],
            ["permission_id"=>18,"role_id"=>1],
            ["permission_id"=>19,"role_id"=>1],
            ["permission_id"=>20,"role_id"=>1],
            ["permission_id"=>21,"role_id"=>1],
            ["permission_id"=>22,"role_id"=>1],
            ["permission_id"=>23,"role_id"=>1],
            ["permission_id"=>24,"role_id"=>1],
            ["permission_id"=>25,"role_id"=>1],
            ["permission_id"=>26,"role_id"=>1],
            ["permission_id"=>27,"role_id"=>1],
            ["permission_id"=>28,"role_id"=>1],
        ]);
    }
}
