<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Trans extends Authenticatable
{
    protected $table = 'trans';	
	
	public function addNew($data,$type)
    {
        $add                    = new Trans;
        $add->user_id           = $data['user_id'];
        $add->amount            = $data['amount'];
        $add->type              = $type;
        $add->trans_id          = isset($data['trans_id']) ? $data['trans_id'] : time();
        $add->payment_method    = isset($data['payment_method']) ? $data['payment_method'] : 0;
        $add->notes             = isset($data['notes']) ? $data['notes'] : null;
        $add->save();
    }

    public function getAll($id)
    {
        return Trans::where('user_id',$id)->orderBy('id','DESC')->get();
    }
}
