<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class PermissionInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all routes name from web.php and store it into permissions table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routeArray=getAllRoutesInArray();
        foreach ($routeArray as $key=>$item) {
            $moduleId=$this->createModule($key);
            $this->createPermissions($moduleId,$item);
        }
        $this->info(sprintf('All permission has been created.'));
        return 0;
    }
    public function createModule($moduleName)
    {
        $moduleId = Module::updateOrCreate([
            'name'=>str_replace('/','',$moduleName),
            'slug'=>Str::slug($moduleName)
        ]);
        return $moduleId->id;
    }
    public function createPermissions($module_id,$permissions)
    {
        foreach ($permissions as $key=>$permission)
        {
            Permission::updateOrCreate([
                'module_id' =>$module_id,
                'name' => $permission['name'],
                'slug' => $permission['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}