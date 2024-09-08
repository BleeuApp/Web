<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;

class Withdraw extends Authenticatable
{
    protected $table = 'withdraw';	
	
	public function addNew($data)
    {
        $add                = new Withdraw;
        $add->delivery_id   = $_GET['delivery_id'];
        $add->amount        = $data['balance'];
        $add->save();

        if($data['save'] == true)
        {
            $res                    = Delivery::find($_GET['delivery_id']);
            $res->bank_name         = isset($data['bank_name']) ? $data['bank_name'] : null;
            $res->account_no        = isset($data['account_no']) ? $data['account_no'] : null;
            $res->ifsc              = isset($data['ifsc']) ? $data['ifsc'] : null;
            $res->other             = isset($data['other']) ? $data['other'] : null;
            $res->save();

            return ['bank_name' => $res->bank_name,'account_no' => $res->account_no,'ifsc' => $res->ifsc,'other' => $res->other];
        }
        else
        {
            return true;
        }
    }

    public function getAll($id)
    {
        $res = Withdraw::where('delivery_id',$id)->orderBy('id','DESC')->get();
        
        $data  = [];
        $admin = User::find(1);

        foreach($res as $row)
        {
            $data[] = [
            
            'id'        => $row->id,
            'amount'    => $row->amount,
            'status'    => $row->status,
            'date'      => date('d-M-Y',strtotime($row->created_at)),
            'complete'  => $row->complete_date_time,
            'currency'  => $admin->currency

            ];
        }

        return $data;
    }

    public function getAllRequest()
    {
        return Withdraw::where(function($query){

            if(isset($_GET['store_id']))
            {
                $query->where('delivery.store_id',$_GET['store_id']);
            }
            else
            {
                $query->where('delivery.store_id',Auth::guard('store')->user()->id);
            }

        })->join('delivery','withdraw.delivery_id','=','delivery.id')
                       ->select('delivery.name','withdraw.*')
                       ->orderBy('withdraw.id','DESC')
                       ->get();
    }
}
