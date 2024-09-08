<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Mail;
use Auth;
use Config;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Str;


class AppUser extends Authenticatable
{
   protected $table = 'app_user';

   public $incrementing = false;

    public function getKeyName()
    {
        return 'id';
    }

   public function signup($data)
   {
      $setting = User::find(1);

      AppUser::where('email',$data['email'])->where('status',0)->delete();
      AppUser::where('phone',$data['phone'])->where('status',0)->delete();

      $countEmail = AppUser::where('email',$data['email'])->where('status',1)->count();
      $phoneCount = AppUser::where('phone',$data['phone'])->where('status',1)->count();

      if($countEmail > 0)
      {
        return ['msg' => 'error','error' => 'Opps! This email is already exists.'];
        exit;
      }

      if($phoneCount > 0)
      {
        return ['msg' => 'error','error' => 'Opps! This phone number is already exists.'];
        exit;
      }

      if(isset($data['rcode']))
       {
         $chkCode = AppUser::where('rcode',$data['rcode'])->first();

         if(!isset($chkCode->id))
         {
            return ['msg' => 'error','error' => 'Opps! This referral code is not valid.'];
            exit;
         }
       }
       else
       {
         $chkCode = 0;
       }

        $add                = new AppUser;
        $add->id            = rand(111,999).Str::uuid();
        $add->name          = $data['name'];
        $add->email         = $data['email'];
        $add->phone         = $data['phone'];
        $add->password      = md5($data['password']);
        $add->wallet        = 0;
        $add->status        = $setting->verify_type == 0 ? 1 : 0;

        if(isset($chkCode->id))
        {
            $user           = User::find(1);
            $add->wallet    = $user->point_use;
            $up             = AppUser::find($chkCode->id);
            $up->wallet     = $up->wallet + $user->point_who; 
            $up->save();
        }

        $add->save();

        if($setting->verify_type != 0)
        {
            $otp = $this->sendVerifyCode($add,$setting);
        }
        else
        {
            $otp = 0;
        }

        $userData = ['id' => $add->id,'name' => $add->name,'email' => $add->email,'phone' => $add->phone,'rcode' => $add->rcode,'status' => $add->status];

        return ['msg' => 'done','user' => $userData,'otp' => $otp,'codeSent' => $setting->verify_type];
   }

   public function sendVerifyCode($res,$setting)
   {
     $otp = rand(1111,9999);
    
     AppUser::where('id',$res->id)->update(['vcode' => $otp]);

     if($setting->verify_type == 1)
     {  
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $client     = new Client($accountSid, $authToken);
        $client->messages->create($res->phone,['from' => env('twilio_phone'),'body' => "Hi ".$res->name.", Your verify code of your mobile number is ".$otp]);
     }
     elseif($setting->verify_type == 2)
     {
        app('App\Http\Controllers\Controller')->sendSms($res->country.$res->phone,"Your verify code of your mobile number is ".$otp);
     }
     elseif($setting->verify_type == 3)
     {
        Mail::send('home.email',['res' => $res,'otp' => $otp], function($message) use($res)
        {     
            $message->to($res->email)->subject("Tifin Box - Verify Your Email");                        
        });  
     }

     return $otp;
   }

   public function resendCode()
   {
        $user    = AppUser::find($_GET['id']);
        $setting = User::find(1);

        $this->sendVerifyCode($user,$setting);

        return ['user' => $user,'codeSent' => $setting->verify_type];
   }

   public function login($data)
   {
     $setting = User::find(1);

     if($setting->verify_type == 3 || $setting->verify_type == 0)
     {
        $chk = AppUser::where('email',$data['email'])->where('password',md5($data['password']))->where('status',1)->first();
     }
     else
     {
        $chk = AppUser::where('phone',$data['phone'])->where('password',md5($data['password']))->where('status',1)->first();
     }

     
     if(isset($chk->id))
     {
        $userData = ['id' => $chk->id,'name' => $chk->name,'email' => $chk->email,'phone' => $chk->phone,'rcode' => $chk->rcode];

        return ['msg' => 'done','user' => $userData];
     }
     else
     {
        return ['msg' => 'error', 'error' => 'Opps! Invalid login details'];
     }
   }

   public function forgot($data)
    {   
        $setting = User::find(1);

        if($setting->verify_type == 3 || $setting->verify_type == 0)
        {
            $res   = AppUser::where('email',$data['email'])->where('status',1)->first();
            $error = "Sorry! This email is not registered with us.";
        }
        else
        {
            $res   = AppUser::where('phone',$data['phone'])->where('status',1)->first();
            $error = "Sorry! This phone number is not registered with us.";
        }
        
        if(isset($res->id))
        {
            $this->sendVerifyCode($res,$setting);

            $userData = ['id' => $res->id,'name' => $res->name,'email' => $res->email,'phone' => $res->phone,'rcode' => $res->rcode];

            $return = ['msg' => 'done','user' => $userData,'codeSent' => $setting->verify_type,'forgot' => true];
        }
        else
        {
            $return = ['msg' => 'error','error' => $error];
        }

        return $return;
    }

    public function verify($data)
    {
        $otp = $data['otp_1'].$data['otp_2'].$data['otp_3'].$data['otp_4'];

        $res = AppUser::where('id',$_GET['id'])->where('vcode',trim($otp))->first();

        if(isset($res->id))
        {
            $res->status = 1;
            $res->save();

            $userData = ['id' => $res->id,'name' => $res->name,'email' => $res->email,'phone' => $res->phone,'rcode' => $res->rcode];

            $return = ['msg' => 'done','user' => $userData];
        }
        else
        {
            $return = ['msg' => 'error','error' => 'Sorry! OTP not match.'];
        }

        return $return;
    }

    public function resetPassword($data)
    {
        $res = AppUser::where('id',$_GET['id'])->first();

        if(isset($res->id))
        {
            $res->password = md5($data['password']);
            $res->save();

            $return = ['msg' => 'done','user_id' => $res->id];
        }
        else
        {
            $return = ['msg' => 'error','error' => 'Sorry! Something went wrong.'];
        }

        return $return;
    }

    public function countOrder($id)
    {
        return Order::where('user_id',$id)->where('status','>',0)->count();
    }

    public function getAll()
    {
        return AppUser::orderBy('id','DESC')->get();
    }

    public function getStoreUser($store_id)
    {
        $ids = Order::where('store_id',$store_id)->pluck("user_id")->toArray();

        return AppUser::whereIn('id',array_unique($ids))->orderBy('uid','DESC')->get();
    }

    public function updateData($data)
    {
      $file = isset($data['file']) ? $data['file'] : null;
      $data = json_decode($data['data']);
        
      $count = AppUser::where('id','!=',$_GET['user_id'])->where('email',$data->email)->count();

      if($count == 0)
      {
            $add = AppUser::find($_GET['user_id']);

            if($file)
            {
                $filename   = time().rand(111,699).'.' .$file->getClientOriginalExtension(); 
                $file->move("upload/user/", $filename);   
                $add->img = $filename;   
            }

            $add->name          = $data->name;
            $add->email         = $data->email;
            $add->phone         = $data->phone;
            
            if(isset($data->password) && $data->password != "")
            {
                $add->password  = md5($data->password);
            }

            $add->save();   

            $img      = $add->img ? Asset('upload/user/'.$add->img) : null;

            $userData = ['id' => $add->id,'name' => $add->name,'email' => $add->email,'phone' => $add->phone,'rcode' => $add->rcode,'img' => $img];

             return ['msg' => 'done','user' => $userData];
        }
        else
        {
            return ['msg' => 'error','error' => 'Opps! This email is already exists.'];
        }
    }

    public function totalOrder($id)
    {
        return Order::where('user_id',$id)->where('status',$id)->count();
    }

    public function getLastOrder($id)
   {
     $res = Order::where('store_id',Auth::guard('store')->user()->id)->where('user_id',$id)->orderBy('id','DESC')->first();

     return isset($res->id) ? date('d-M-Y h:i:A',strtotime($res->created_at)) : null;
   }

   public function getTotalOrder($id)
   {
     return Order::where('store_id',Auth::guard('store')->user()->id)->where('user_id',$id)->count();
   }

   public function getWallet()
   {
     $res = AppUser::find($_GET['user_id']);

     if(isset($_GET['amount']))
     {
        $res->wallet = $res->wallet + $_GET['amount'];
        $res->save();
     }   

     $trans = new Trans;

     return ['wallet' => $res->wallet,'stripe' => User::find(1)->stripe_key,'trans' => $trans->getAll($_GET['user_id'])];
   }

   public function updateWallet($data)
   {
     $add           = AppUser::find($data['user_id']);
     $add->wallet   = $add->wallet + $data['amount'];
     $add->save();

     $trans = new Trans;
     $trans->addNew($data,0);
   }
}
