<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class StoreCate extends Authenticatable
{
    protected $table = 'store_cate';	
	
	public function addNew($data)
    {
        StoreCate::where('store_id',$data['id'])->delete();

        $cate = isset($data['chk']) ? $data['chk'] : [];

        for($i=0;$i<count($cate);$i++)
        {
            $add            = new StoreCate;
            $add->store_id  = $data['id'];
            $add->cate_id   = $cate[$i];
            $add->save();
        }
    }
}
