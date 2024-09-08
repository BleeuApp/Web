<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use DB;

class User extends Authenticatable
{
    /*
    |------------------------------------------------------------------
    |Checking for current admin password
    |@password = admin password
    |------------------------------------------------------------------
    */
    public function matchPassword($password)
    {
      if(auth()->attempt(['username' => Auth()->user()->username, 'password' => $password]))
      {
          return false;
      }
      else
      {
          return true;
      }
    }

    /*
    |---------------------------------
    |Update Account Data
    |---------------------------------
    */
    public function updateData($data)
    {
        $update                                 = User::find(Auth::user()->id);
        $update->name                           = isset($data['name']) ? $data['name'] : null;
        $update->email                          = isset($data['email']) ? $data['email'] : null;
        $update->username                       = isset($data['username']) ? $data['username'] : null;
        $update->currency                       = isset($data['currency']) ? $data['currency'] : "$";
        $update->currency_code                  = isset($data['currency_code']) ? $data['currency_code'] : "USD";
        $update->welcome_title                  = isset($data['welcome_title']) ? $data['welcome_title'] : null;
        $update->welcome_text                   = isset($data['welcome_text']) ? $data['welcome_text'] : null;
        $update->verify_type                    = isset($data['verify_type']) ? $data['verify_type'] : 0;
        $update->sms_api                        = isset($data['sms_api']) ? $data['sms_api'] : null;
        $update->term_link                      = isset($data['term_link']) ? $data['term_link'] : null;
        $update->point_who                      = isset($data['point_who']) ? $data['point_who'] : 0;
        $update->point_use                      = isset($data['point_use']) ? $data['point_use'] : 0;
        $update->app_name                       = isset($data['app_name']) ? $data['app_name'] : null;
        $update->country_code                   = isset($data['country_code']) ? $data['country_code'] : null;
        $update->razor_key                      = isset($data['razor_key']) ? $data['razor_key'] : null;
        $update->flutter_key                    = isset($data['flutter_key']) ? $data['flutter_key'] : null;
        $update->stripe_key                     = isset($data['stripe_key']) ? $data['stripe_key'] : null;
        $update->stripe_sec_key                 = isset($data['stripe_sec_key']) ? $data['stripe_sec_key'] : null;
        $update->push_user_app_id               = isset($data['push_user_app_id']) ? $data['push_user_app_id'] : null;
        $update->push_user_rest_id              = isset($data['push_user_rest_id']) ? $data['push_user_rest_id'] : null;
        $update->push_user_google_id            = isset($data['push_user_google_id']) ? $data['push_user_google_id'] : null;
        $update->push_store_app_id              = isset($data['push_store_app_id']) ? $data['push_store_app_id'] : null;
        $update->push_store_rest_id             = isset($data['push_store_rest_id']) ? $data['push_store_rest_id'] : null;
        $update->push_store_google_id           = isset($data['push_store_google_id']) ? $data['push_store_google_id'] : null;
        $update->push_delivery_app_id           = isset($data['push_delivery_app_id']) ? $data['push_delivery_app_id'] : null;
        $update->push_delivery_rest_id          = isset($data['push_delivery_rest_id']) ? $data['push_delivery_rest_id'] : null;
        $update->push_delivery_google_id        = isset($data['push_delivery_google_id']) ? $data['push_delivery_google_id'] : null;
        $update->web_url                        = isset($data['web_url']) ? $data['web_url'] : null;
        
        if(isset($data['new_password']))
        {
            $update->password = bcrypt($data['new_password']);
        }

        $update->save();
    }

    public function overview()
    {
        $total_user = AppUser::where('status',1)->count();
        $month_user = AppUser::where('status',1)->where('created_at','LIKE',date("Y-m").'%')->count();

        $total_order = OrderDetail::count();
        $month_order = OrderDetail::where('created_at','LIKE',date("Y-m").'%')->count();

        $total_com   = $this->com();
        $month_com   = $this->com(date("Y-m"));

        $total_store = Store::count();
        $month_store = Store::where('created_at','LIKE',date("Y-m").'%')->count();

        return [
        
        'total_user'    => $total_user,
        'month_user'    => $month_user,
        'total_order'   => $total_order,
        'month_order'   => $month_order,
        'total_com'     => $total_com,
        'month_com'     => $month_com,
        'total_store'   => $total_store,
        'month_store'   => $month_store

        ];
    }

    public function com($type = null,$store_id = 0)
    {
        $res = OrderDetail::where(function($query) use($type,$store_id){

            if($type)
            {
                $query->where('order_detail.created_at','LIKE',$type.'%');
            }

            if($store_id > 0)
            {
                $query->where('orders.store_id',$store_id);
            }
                        
        })->join('orders','order_detail.order_id','=','orders.id')
                          ->join('store','orders.store_id','=','store.id')
                          ->select('order_detail.*','store.com_type','store.com_value')
                          ->get();

        $total = [];

        foreach($res as $row)
        {
            if($row->com_type == 0)
            {
                $total[] = $row->com_value;
            }
            else
            {
                $total[] = round($row->price_total * $row->com_value / 100);
            }
        }
        
        return array_sum($total);
    }

    public function storeChart()
    {
        $storeID = Order::where('status',5)->pluck('store_id')->toArray();

        $data = [];

        foreach(array_unique($storeID) as $sid)
        {
            $user = Store::find($sid);

            if(isset($user->id))
            {
                $data[] = ['name' => $user->name,'order' => Order::where('store_id',$sid)->where('status',5)->count()];
            }
        }   

         usort($data, function ($a, $b) {
        if ($b["order"] == $a["order"]) return 0;
        return $b["order"] < $a["order"] ? -1 : 1;
        });

         $all = $data;


         return array_slice($all,0,5);
    }

    public function lastDays()
    {
        $dates = [];

        for($i=1;$i<8;$i++)
        {
            $date = date("Y-m-d",strtotime(date('Y-m-d').' - '.$i.' day'));

            $sale = Order::where('status',5)->whereDate('created_at',$date)->sum('total');

            $dates[] = ['date' => date('d-M',strtotime($date)),'sale' => $sale];
        }

        return $dates;
    }

    public function lastMonths()
    {
        $dates = [];

        for($i=0;$i<7;$i++)
        {
            $date = date("Y-m",strtotime(date('Y-m-d').' - '.$i.' month'));

            $sale = Order::where('status',5)->whereDate('created_at','LIKE',$date.'%')->sum('total');

            $dates[] = ['date' => date('M-Y',strtotime($date)),'sale' => $sale];
        }

        return $dates;
    }

    public function addNew($data,$type)
    {
        $add            = $type == "add" ? new User : User::find($type);
        $add->name      = isset($data['name']) ? $data['name'] : null;
        $add->email     = isset($data['email']) ? $data['email'] : null;
        $add->username  = isset($data['username']) ? $data['username'] : null;
        $add->role_id   = isset($data['role_id']) ? $data['role_id'] : 0;

        if(isset($data['password']))
        {
            $add->password = bcrypt($data['password']);
        }

        $add->save();
    }

    public function getAll()
    {
        return User::leftjoin('role','users.role_id','=','role.id')
                   ->select('role.name as role','users.*')
                   ->where('users.id','!=',1)
                   ->get();
    }

    public function getChart()
    {
        $topStores = Store::join('orders', 'store.id', '=', 'orders.store_id')
                            ->select('store.id', 'store.name', DB::raw('COUNT(orders.id) as order_count'), DB::raw('SUM(orders.total) as total_amount'))
                            ->groupBy('store.id', 'store.name')
                            ->orderByDesc('order_count')
                            ->limit(5)
                            ->get();
        $data = [];
        
        foreach($topStores as $store)
        {
            $data[] = ['store' => str_replace("'","",$store->name),'total' => $store->total_amount];
        }

        $months = array_map(function ($monthOffset) {
            return date("'F'", strtotime("-$monthOffset month"));
        }, range(0, 5));

        $mm = array_map(function ($monthOffsets) {
            return date('Y-m', strtotime("-$monthOffsets month"));
        }, range(0, 5));

        $com = [];

        foreach($mm as $month)
        {
            $com[] = $this->com($month);
        }

        return ['sub' => $data,'months' => $months,'com' => $com];
    }
}
