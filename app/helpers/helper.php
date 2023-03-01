<?php

use App\Models\Role;
use App\Models\Settings;
use Illuminate\Support\Facades\Route;

// to check if the route has any permission to the auth user
if (!function_exists('hasAnyPermissions')) {

    function hasAnyPermissions($permission)
    {
        return auth()->user()->hasPermission($permission);
    }
}
if (!function_exists('roles')) {

    function roles()
    {
        return Role::all();
    }
}
// generate all routes as permission
if (!function_exists('getAllRoutesInArray')) {
    function getAllRoutesInArray(): array
    {
        $data = [];
        foreach (Route::getRoutes() as $key => $route) {
            if ($route->getName() && $route->getPrefix() != '' && $route->getPrefix() != '_ignition') {
                $data[$key] = [
                    'name' => $route->getName(),
                    'prefix' => $route->getPrefix(),
                ];
            }
        }
        $arr = array();
        foreach ($data as $key => $item) {
            $arr[$item['prefix']][$key] = $item;
        }
        ksort($arr, SORT_NUMERIC);
        return $arr;
    }
}
if (!function_exists('settings')) {
    function settings()
    {
        return Settings::first();
    }
}