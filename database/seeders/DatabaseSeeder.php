<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SettingsSeeder;
use Modules\Account\Database\Seeders\AccountDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
        SettingsSeeder::class,
        RoleSeeder::class,
        RolePermissionSeeder::class,
        UserSeeder::class,
       ]);
       $role = Role::where('name', '=', 'Super Admin')->first();
       $role->permissions()->sync(Permission::get()->pluck('id'));
        $this->call(AccountDatabaseSeeder::class);
    }
}