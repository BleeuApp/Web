<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Paid extends Authenticatable
{
    protected $table = 'paid';

    public function getAppData()
    {
        $data = [];
        $user = User::find(1);

        foreach(Paid::where('store_id',$_GET['store_id'])->orderBy('id','DESC')->get() as $row)
        {
            $data[] = [
            
            'amount' => $user->currency.$row->amount,
            'date'   => date('d-M-Y',strtotime($row->date_added)),
            'notes'  => $row->notes

            ];
        }

        return $data;
    }
}
