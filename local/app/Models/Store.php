<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use DB;

class Store extends Authenticatable
{
    protected $table = 'store';	
	
	 /*
    |--------------------------------------
    |Add/Update Data
    |--------------------------------------
    */
    public function addNew($data,$type)
    {
        $a                  = isset($data['l_name']) ? array_combine($data['lid'], $data['l_name']) : [];
        $b                  = isset($data['l_address']) ? array_combine($data['lid'], $data['l_address']) : [];
        $add                = $type === 'add' ? new Store : Store::find($type);
        $add->name          = isset($data['name']) ? $data['name'] : null;
        $add->phone         = isset($data['phone']) ? $data['phone'] : null;
        $add->email         = isset($data['email']) ? $data['email'] : null;
        $add->address       = isset($data['address']) ? $data['address'] : null;
        $add->whatsapp_no   = isset($data['whatsapp_no']) ? $data['whatsapp_no'] : null;
        $add->can_msg       = isset($data['can_msg']) ? $data['can_msg'] : null;
        $add->avg_cost      = isset($data['avg_cost']) ? $data['avg_cost'] : null;
        $add->lat           = isset($data['lat']) ? $data['lat'] : null;
        $add->lng           = isset($data['lng']) ? $data['lng'] : null;
        $add->working_day   = isset($data['working_day']) ? implode(",",$data['working_day']) : null;
        $add->breakfast     = isset($data['breakfast']) ? $data['breakfast'] : null;
        $add->lunch         = isset($data['lunch']) ? $data['lunch'] : null;
        $add->dinner        = isset($data['dinner']) ? $data['dinner'] : null;
        $add->b_time_from   = isset($data['b_time_from']) ? $data['b_time_from'] : null;
        $add->b_time_to     = isset($data['b_time_to']) ? $data['b_time_to'] : null;
        $add->l_time_from   = isset($data['l_time_from']) ? $data['l_time_from'] : null;
        $add->l_time_to     = isset($data['l_time_to']) ? $data['l_time_to'] : null;
        $add->d_time_from   = isset($data['d_time_from']) ? $data['d_time_from'] : null;
        $add->d_time_to     = isset($data['d_time_to']) ? $data['d_time_to'] : null;
        $add->max_km        = isset($data['max_km']) ? $data['max_km'] : 0;
        $add->s_data        = serialize([$a,$b]);

        if(isset($data['com_type']))
        {
            $add->com_type      = isset($data['com_type']) ? $data['com_type'] : 0;
            $add->com_value     = isset($data['com_value']) ? $data['com_value'] : 0;
        }

        if(isset($data['password']))
        {
            $add->password      = bcrypt($data['password']);
            $add->shw_password  = $data['password'];
        }

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/store/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    public function getAll($type = "all")
    {
        return Store::where(function($query) use($type)
        {

        if($type != "all")
        {
            $query->where('status',$type);
        }

        })->orderBy('id','DESC')->get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);
 
        return isset($data[$field][$id]) ? $data[$field][$id] : null;
    }

    public function getCate($id)
    {
        $res = StoreCate::where('store_id',$id)->pluck('cate_id')->toArray();

        return count($res) > 0  ? $res : [];
    }

    public function getAppData($type = null,$ids = [])
    {
        $lat   = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon   = isset($_GET['lng']) ? $_GET['lng'] : 0;
        $admin = User::find(1);

        $res = Store::where(function($query) use($type,$ids){

                    if($type && $type == "trend")
                    {
                        $query->where('trend',1);
                    }
                    elseif($type && $type == "new")
                    {
                        $query->where('trend',0);
                    }
                    else
                    {
                        $cate = Category::where('name',$type)->first();

                        if(isset($cate->id))
                        {
                            $getId = StoreCate::where('cate_id',$cate->id)->pluck('store_id')->toArray();

                            $query->whereIn('id',array_unique($getId));
                        }
                    }

                    if($ids && count($ids) > 0)
                    {
                        $query->whereIn('id',$ids);
                    }

                    $query->where('status',0);

                    })->select('store.*',DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                        
                        * cos(radians(store.lat)) 
                        * cos(radians(store.lng) - radians(" . $lon . ")) 
                        + sin(radians(" .$lat. ")) 
                        * sin(radians(store.lat))) AS distance"))
                        
                        ->orderBy('distance','ASC')->get();
        
           $data = [];
           
           foreach($res as $row)
           {
             $deliver = $row->max_km == 0 || $row->max_km >= $row->distance ? true : false;

             $data[] = [

                'id'            => $row->id,
                'name'          => $this->getLang($row->id)['name'],
                'address'       => $this->getLang($row->id)['address'],
                'img'           => Asset('upload/store/'.$row->img),
                'km'            => number_format($row->distance,1),
                'rating'        => $this->getRating($row->id),
                'per_person'    => $row->avg_cost,
                'currency'      => $admin->currency,
                'deliver'       => $deliver,
                'subscribe'     => $this->getSubscriberCount($row->id),
                'max'           => $row->max_km

             ];

           }

           return $data;
    }

    public function getRating($id)
    {
        $total = Rating::where('store_id',$id)->count();
        $sum   = Rating::where('store_id',$id)->sum('star');

        return $total > 0 ? number_format($sum/$total,1) : 0.0;
    }

    public function getSubscriberCount($id)
    {
        $item = Tifin::where('store_id',$id)->pluck('id')->toArray();

        return OrderDetail::whereIn('item_id',array_unique($item))->count();
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Store::find($id);

        if($lid == 0)
        {
            return ['name' => $data->name,'address' => $data->address];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['name' => $data[0][$lid],'address' => $data[1][$lid]];
        }
    }

    public function getRandom($limit = 6)
    {
        $ids = Store::inRandomOrder()->take($limit)->pluck('id')->toArray();

        return $this->getAppData(null,$ids);
    }

    public function getSingleStore()
    {
        $store = Store::find($_GET['store_id']);
        $offer = new Offer;
        $rating = new Rating;
        
        $data = [

        'name'          => $this->getLang($store->id)['name'],
        'address'       => $this->getLang($store->id)['address'],
        'img'           => Asset('upload/store/'.$store->img),
        'phone'         => $store->phone,
        'lat'           => $store->lat,
        'lng'           => $store->lng,
        'working_day'   => explode(",",$store->working_day),
        'breakfast'     => $store->breakfast,
        'lunch'         => $store->lunch,
        'dinner'        => $store->dinner,
        'b_time'        => date('h:i:A',strtotime($store->b_time_from))." - ".date('h:i:A',strtotime($store->b_time_to)),
        'l_time'        => date('h:i:A',strtotime($store->l_time_from))." - ".date('h:i:A',strtotime($store->l_time_to)),
        'd_time'        => date('h:i:A',strtotime($store->d_time_from))." - ".date('h:i:A',strtotime($store->d_time_to)),
        'max_km'        => $store->max_km,
        'cates'         => $this->getCateName($store->id),
        'rating'        => $this->getRating($store->id),
        'ratings'       => $rating->getStoreRating($store->id),
        'subscribe'     => $this->getSubscriberCount($store->id),
        'offer'         => $offer->getAppData($store->id),
        'id'            => $store->id
            
        ];

        return $data;
    }

    public function getCateName($id)
    {
        $ids  = $this->getCate($id);

        $data = [];

        foreach(Category::whereIn('id',$ids)->get() as $cate)
        {
            $data[] = $cate->getLang($cate->id)['name'];
        }

        return $data;
    }

    public function signupFromApp($data)
    {
        $count              = Store::where('email',$data['form']['email'])->count();

        if($count > 0)
        {
            return ['msg' => 'error','error' => 'Sorry! This email is already exists.'];
            exit;
        }

        $add                = new Store;
        $add->name          = $data['form']['name'];
        $add->phone         = $data['form']['phone'];
        $add->email         = $data['form']['email'];
        $add->address       = $data['form']['address'];
        $add->working_day   = implode(",",$data['days']);
        $add->breakfast     = in_array("breakfast",$data['type']) ? 0 : 1;
        $add->lunch         = in_array("lunch",$data['type']) ? 0 : 1;
        $add->dinner        = in_array("dinner",$data['type']) ? 0 : 1;
        $add->max_km        = $data['form']['max_km'];
        $add->status        = 1;
        $add->save();

        return ['msg' => 'done'];
    }

    public function login($data)
    {
        $res  = Store::where('email',$data['email'])->where('shw_password',$data['password'])->where('status',0)->first();
        $lang = new Language;

        if(isset($res->id))
        {
            $userData = ['name' => $res->name,'phone' => $res->phone,'address' => $res->address,'days' => explode(",",$res->working_days),'id' => $res->id];
            
            return ['msg' => 'done','user' => $userData,'setting' => User::find(1),'lang'  => $lang->getEnglish("store")];
        }
        else
        {
            return ['msg' => 'error' ,'error' => 'Invalid login details. Please check and try again'];
        }
    }

    public function overview()
    {
        $date       = new OrderDates;
        $totalSub   = $this->countSub($_GET['store_id'],0);
        $activeSub  = $this->countSub($_GET['store_id'],1);
        $today      = $date->countDelivery($_GET['store_id'],date("Y-m-d"));
        $next       = $date->countDelivery($_GET['store_id'],date("Y-m-d",strtotime(date("Y-m-d")." + 1 day")));
        $item       = Tifin::where('store_id',$_GET['store_id'])->where('status',0)->count();
        $ids        = Delivery::where('store_id',$_GET['store_id'])->pluck('id')->toArray();

        return [
        
        'total_sub'  => $totalSub,
        'active_sub' => $activeSub,
        'today' => $today,
        'next'  => $next,
        'item'  => $item,
        'staff' => Delivery::where('store_id',$_GET['store_id'])->where('status',0)->count(),
        'online' => Delivery::where('store_id',$_GET['store_id'])->where('status',0)->where('online',1)->count(),
        'request' => Withdraw::whereIn('delivery_id',array_unique($ids))->count(),
        'pending' => Withdraw::whereIn('delivery_id',array_unique($ids))->where('status',0)->count()

        ];
                           
    }

    public function countSub($store_id,$type = 0)
    {
        return OrderDetail::where(function($query) use($type){
                        
                        if($type > 0)
                        {
                            $query->where('orders.end_date','>=',date("Y-m-d"));
                        }

                         })->join('orders','order_detail.order_id','=','orders.id')
                         ->select('order_detail.*')
                          ->where('orders.store_id',$store_id)
                          ->count();
    }

    public function account()
    {
        $row = Store::find($_GET['store_id']);
        
        return [

        'name'      => $this->getLang($row->id)['name'],
        'address'   => $this->getLang($row->id)['address'],
        'phone'     => $row->phone,
        'whatsapp'  => $row->whatsapp_no,
        'max_km'    => $row->max_km,
        'days'      => explode(",",$row->working_day),
        'breakfast' => $row->breakfast,
        'lunch'     => $row->lunch,
        'dinner'    => $row->dinner,
        'password'  => $row->shw_password

        ];
    }

    public function updateAccount($data)
    {
        $count = Store::where('id','!=',$_GET['store_id'])->where('phone',$data['phone'])->count();

        if($count > 0)
        {
            return ['msg' => 'error','error' => 'Sorry! this phone number is already exists with another account.'];
            exit;
        } 

        $res                    = Store::find($_GET['store_id']);
        $res->name              = $data['name'];
        $res->phone             = $data['phone'];
        $res->address           = $data['address'];
        $res->whatsapp_no       = isset($data['whatsapp']) ? $data['whatsapp'] : null;
        $res->max_km            = isset($data['max_km']) ? $data['max_km'] : 0;
        $res->save();

        return ['msg' => 'done','user' => $res];

    }

    public function days($data)
    {
        $res                = Store::find($_GET['store_id']);
        $res->working_day   = implode(",",$data);
        $res->save();
    }

    public function meal($data)
    {
        $res                = Store::find($_GET['store_id']);
        $res->breakfast     = in_array("breakfast",$data) ? 0 : 1;
        $res->lunch         = in_array("lunch",$data) ? 0 : 1;
        $res->dinner        = in_array("dinner",$data) ? 0 : 1;
        $res->save();
    }

    public function dashOverview()
    {
        $total_sub        = Order::pluck('user_id')->toArray();
        $total_earning    = OrderDates::where('order_dates.status','!=',3)->join('order_detail','order_dates.detail_id','=','order_detail.id')
                                      ->sum('order_detail.price');

        $current_sub      = Order::where('created_at','LIKE',date("Y-m").'%')->pluck('user_id')->toArray();
        $current_earning  = OrderDates::where('order_dates.status','!=',3)->join('order_detail','order_dates.detail_id','=','order_detail.id')
                                    ->where('order_dates.created_at','LIKE',date("Y-m").'%')->sum('order_detail.price');

        $last_sub        = Order::where('created_at','LIKE',date("Y-m",strtotime(date("Y-m").' -1 month')).'%')->pluck('user_id')->toArray();
        $last_earning    = OrderDates::where('order_dates.status','!=',3)->join('order_detail','order_dates.detail_id','=','order_detail.id')
                                     ->where('order_dates.created_at','LIKE',date("Y-m",strtotime(date("Y-m").' -1 month')).'%')
                                     ->sum('order_detail.price');

        return [
        
        'total_sub'       => count(array_unique($total_sub)),
        'total_earning'   => $total_earning,
        'current_sub'     => count(array_unique($current_sub)),
        'current_earning' => $current_earning,
        'last_sub'        => count(array_unique($last_sub)),
        'last_earning'    => $last_earning

        ];
    }

    public function getCom($id)
    {
        $user = new User;

        return $user->com(null,$id);
    }

    public function totalEarning($id,$type = null)
    {
        $total    =  Order::where('store_id',$id)->sum('total');
        $discount =  Order::where('store_id',$id)->sum('discount');

        return $total + $discount;
    }

    public function balance($id)
    {
        $paid  = Paid::where('store_id',$id)->sum('amount');
        $total = $this->totalEarning($id);
        $com   = $this->getCom($id);

        return ($total - $com) - $paid;
    }

    public function lastPaid($id)
    {
        $res = Paid::where('store_id',$id)->orderBy('id','DESC')->first();

        return isset($res->id) ? $res->amount." | ".date('d-M-Y',strtotime($res->date_added)) : null;
    }

    public function getEarning()
    {
        $total_paid = Paid::where('store_id',$_GET['store_id'])->sum('amount');
        $total      = $this->getAppEarning();

        return [

        'total'         => $total,
        'balance'       => $total - $total_paid,
        'total_paid'    => $total_paid,
        'this_month'    => $this->getAppEarning("month"),
        'last_month'    => $this->getAppEarning("last"),

        ];
    }

    public function getAppEarning($type = null)
    {
        $res   = Order::where(function($query) use($type){

                if($type == "month")
                {
                    $query->where('created_at','LIKE',date('Y-m').'%');
                }
                elseif($type == "last")
                {
                    $last = date("Y-m",strtotime(date("Y-m-d").' - 1 month'));

                    $query->where('created_at','LIKE',$last.'%');
                }

        })->where('store_id',$_GET['store_id'])->get();
        $store = Store::find($_GET['store_id']);
        $total = [];

        foreach($res as $row)
        {
            if($store->com_type == 0)
            {
                $com = $store->com_value;
            }
            else
            {
                $com = round($row->total * $store->com_value / 100);
            }

            $total[] = $row->total - $com;
        }

        return array_sum($total);
    }

    public function resendCode()
   {
        $otp                = rand(1111,9999);
        $user               = Store::find($_GET['id']);
        $user->otp          = $otp;
        $user->save();

        $this->SendOtp($user);

        return ['user' => $user];
   }

   public function forgot($data)
   {
        $res = Store::where('status',0)->where('email',$data['email'])->first();

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
        $res = Store::where('id',$_GET['id'])->first();

        if(isset($res->id))
        {
            $res->shw_password  = $data['password'];
            $res->password      = bcrypt($data['password']);
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
        /*Mail::send('home.email_store',['res' => $add,'otp' => $add->otp], function($message) use($add)
        {     
            $message->to($add->email)->subject("Tiffin Go - Verify Your Email");                        
        });*/
        
    }
}
