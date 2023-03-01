<?php

namespace App\Models;

use App\Traits\Sluggable;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=[];
    public function sluggable(): array
    {
        return [
            'source' => 'name',
        ];
    }
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}