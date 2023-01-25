<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
     public function categories()
    {
        return $this->belongsToMany('App\Models\Admin','admin_roles','admin_id' , 'role_id')->withTimestamps();;
    }
    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role')->withTimestamps();
    }

}
