<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all();
        foreach($permissions as $permission){
            RolePermission::created([
                'role_id'=>1,
                'permission'=>$permission->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}