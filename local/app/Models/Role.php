<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Role extends Authenticatable
{
    protected $table = 'role';	
	
	public function addNew($data,$type)
    {
        $add            = $type == "add" ? new Role : Role::find($type);
        $add->name      = isset($data['name']) ? $data['name'] : null;
        $add->perm      = isset($data['chk']) ? implode(",",$data['chk']) : "All";
        $add->save();
    }

    public function getAll()
    {
        return Role::get();
    }
}
