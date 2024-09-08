<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;
use Str;
use DB;

class Delivery extends Authenticatable
{
    protected $table = 'delivery';
    
    public $incrementing = false;

    public function getKeyName()
    {
        return 'id';
    }
	
	public function addNew($data,$type)
    {
        $add                    = $type == "add" ? new Delivery : Delivery::find($type);
        $add->store_id          = Auth::guard('store')->user()->id;
        
        if($type == "add")
        {
            $add->id           = rand(111,999).Str::uuid();
        }

        $add->name              = isset($data['name']) ? $data['name'] : null;
        $add->phone             = isset($data['phone']) ? $data['phone'] : null;
        $add->email             = isset($data['email']) ? $data['email'] : null;
        $add->type              = isset($data['type']) ? $data['type'] : 0;
        $add->per_delivery      = isset($data['per_delivery']) ? $data['per_delivery'] : 0;
        $add->per_km            = isset($data['per_km']) ? $data['per_km'] : 0;
        $add->v_type            = isset($data['v_type']) ? $data['v_type'] : null;
        $add->online            = 1;

        if(isset($data['password']))
        {
            $add->password = md5($data['password']);
        }

        if(isset($data['driver_id']))
        {
            $filename   = time().rand(111,699).'.' .$data['driver_id']->getClientOriginalExtension(); 
            $data['driver_id']->move("upload/delivery/", $filename);   
            $add->driver_id = $filename;   
        }

        if(isset($data['v_doc']))
        {
            $filename2   = time().rand(111,699).'.' .$data['v_doc']->getClientOriginalExtension(); 
            $data['v_doc']->move("upload/delivery/", $filename2);   
            $add->v_doc = $filename2;   
        }

        $add->save();
    }

    public function getAll($status = "all")
    {
        return Delivery::where(function($query) use($status){

                        if($status != "all")
                        {
                            $query->where('status',$status)->where('online',1);
                        }

                       })->where('store_id',Auth::guard('store')->user()->id)
                         ->get();
    }

    public function login($data)
    {
        $chk  = Delivery::where('status',0)->where('email',$data['email'])->where('password',md5($data['password']))->first();
        $lang = new Language;

        if(isset($chk->id))
        {
            return ['msg' => 'done','user' => $chk,'setting' => User::find(1),'lang'  => $lang->getEnglish("delivery")];
        }
        else
        {
            return ['msg' => 'error','error' => 'Invalid login details'];
        }
    }

    public function setting($data)
    {
        $driver_id  = isset($data['driver_id']) ? $data['driver_id'] : null;
        $v_doc      = isset($data['v_doc']) ? $data['v_doc'] : null;
      	$data       = json_decode($data['data']);

        $count = Delivery::where('id','!=',$_GET['id'])->where('email',$data->email)->count();

        if($count > 0)
        {
            return ['msg' => 'error' ,'error' => 'This email is already exists.'];
            exit;
        }

        $add            = Delivery::find($_GET['id']);
        $add->name      = $data->name;
        $add->phone     = $data->phone;
        $add->email     = $data->email;
        $add->v_type    = $data->v_type;

        if($data->password)
        {
            $add->password = md5($data->password);
        }

        if($driver_id)
        {
            $filename   = time().rand(111,699).'.' .$driver_id->getClientOriginalExtension(); 
            $driver_id->move("upload/delivery/", $filename);   
            $add->driver_id = $filename;   
        }

        if($v_doc)
        {
            $filename2   = time().rand(111,699).'.' .$v_doc->getClientOriginalExtension(); 
            $v_doc->move("upload/delivery/", $filename2);   
            $add->v_doc = $filename2;   
        }

        $add->save();

        return ['msg' => 'done'];
    }

    public function earning()
    {
        $res             = Delivery::find($_GET['delivery_id']);
        $last_withdraw   = Withdraw::where('delivery_id',$res->id)->orderBy('id','DESC')->first();
        $withdraw        = Withdraw::where('status','!=',2)->where('delivery_id',$res->id)->sum('amount');
        $month_withdraw  = Withdraw::where('status','!=',2)->where('delivery_id',$res->id)->where('created_at','LIKE',date('Y-m').'%')->sum('amount');
        $total           = $this->getTotalEarning($res);
        $month_earn      = $this->getTotalEarning($res,true);
        $balance         = number_format($total - $withdraw,1);

        return [
        
        'balance'           => $balance,
        'month_earn'        => $month_earn,
        'month_withdraw'    => $month_withdraw,
        'last_withdraw'     => $last_withdraw,
        'currency'          => User::find(1)->currency
        
        ];
    }

    public function getTotalEarning($delivery,$month = false)
    {
        $order = new OrderDates;
        $total = [];

        $res   = OrderDates::where(function($query) use($month){

                if($month)
                {
                    $query->where('order_dates.delivery_date','LIKE',date('Y-m').'%');
                }

        })->select(DB::raw("6371 * acos(cos(radians(order_dates.complete_lat)) 
                            * cos(radians(order_dates.d_lat)) 
                            * cos(radians(order_dates.d_lng) - radians(order_dates.complete_lng)) 
                            + sin(radians(order_dates.complete_lat)) 
                            * sin(radians(order_dates.d_lat))) AS distance"))
                            ->where('order_dates.delivery_id',$delivery->id)
                            ->orderBy('distance','ASC')
                            ->get();

        foreach($res as $row)
        {
            $total[] = $order->getEarning($delivery->id,$row->distance);
        }

        return array_sum($total);
    }

    public function getAppData()
    {
        return Delivery::where('store_id',$_GET['store_id'])->get();
    }

    public function addAppData($data)
    {
        $driver_id  = isset($data['driver_id']) ? $data['driver_id'] : null;
        $v_doc      = isset($data['v_doc']) ? $data['v_doc'] : null;
      	$data       = json_decode($data['data']);

        if($_GET['id'] == 0)
        {
            $count     = Delivery::where('store_id',$_GET['store_id'])->where('email',$data->email)->count();
        }
        else
        {
            $count     = Delivery::where('id','!=',$_GET['id'])->where('store_id',$_GET['store_id'])->where('email',$data->email)->count();
        }

        if($count > 0)
        {
            return ['msg' => 'error','error' => 'Sorry! This email is already exists.'];
            exit;
        }

        $add                = $_GET['id'] != 0 ? Delivery::find($_GET['id']) : new Delivery;
        $add->store_id      = $_GET['store_id'];
        
        if($_GET['id'] == 0)
        {
            $add->id        = rand(111,999).Str::uuid();
        }

        $add->name          = $data->name;
        $add->phone         = $data->phone;
        $add->email         = $data->email;
        $add->type          = $data->type;
        $add->v_type        = $data->v_type;
        $add->status        = $data->status;

        if($data->type == 0)
        {
            $add->per_delivery = $data->d_charges;
        }
        else
        {
            $add->per_km        = $data->d_charges;

        }

        if($data->password)
        {
            $add->password = md5($data->password);
        }

        if($driver_id)
        {
            $filename   = time().rand(111,699).'.' .$driver_id->getClientOriginalExtension(); 
            $driver_id->move("upload/delivery/", $filename);   
            $add->driver_id = $filename;   
        }

        if($v_doc)
        {
            $filename2   = time().rand(111,699).'.' .$v_doc->getClientOriginalExtension(); 
            $v_doc->move("upload/delivery/", $filename2);   
            $add->v_doc = $filename2;   
        }

        $add->Save();

        return ['msg' => 'done'];
        
    }

    public function resendCode()
    {
         $otp                = rand(1111,9999);
         $user               = Delivery::find($_GET['id']);
         $user->otp          = $otp;
         $user->save();
 
         $this->SendOtp($user);
 
         return ['user' => $user];
    }
 
    public function forgot($data)
    {
         $res = Delivery::where('status',0)->where('email',$data['email'])->first();
 
         if(isset($res->id))
         {
             $otp                = rand(1111,9999);
             $res->otp           = $otp;
             $res->save();
 
             $this->SendOtp($res);
 
             return ['msg' => 'done','id' => $res->id,'otp' => $otp];
 
         }
         else
         {
             return ['msg' => 'error','error' => 'Sorry! This email is not registered with us.'];
         }
 
    }
 
    public function resetPassword($data)
     {
         $res = Delivery::where('id',$_GET['id'])->first();
 
         if(isset($res->id))
         {
             $res->password      = md5($data['password']);
             $res->save();
 
             $return = ['msg' => 'done','user_id' => $res->id];
         }
         else
         {
             $return = ['msg' => 'error','error' => 'Sorry! Something went wrong.'];
         }
 
         return $return;
     }
 
     public function SendOtp($add)
     {
         /*Mail::send('home.email_delivery',['res' => $add,'otp' => $add->otp], function($message) use($add)
         {     
             $message->to($add->email)->subject("Tiffin Go - Verify Your Email");                        
         });*/
         
     }
}
