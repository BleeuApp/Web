<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Str;
use Auth;

class Order extends Authenticatable
{
    protected $table = 'orders';
    
    public $incrementing = false;

    public function getKeyName()
    {
        return 'id';
    }

    public function addNew($data)
    {
        $add                = new Order;
        $add->id            = rand(111,999).Str::uuid();
        $add->store_id      = $data['store_id'];
        $add->user_id       = $data['user_id'];
        $add->address_id    = $data['address'];
        $add->total         = $data['total'];
        $add->discount      = isset($data['discount']) ? $data['discount'] : 0;
        $add->start_date    = $data['cal']['start'];
        $add->end_date      = $data['cal']['end'];
        $add->plan_id       = $data['plan'];
        $add->notes         = isset($data['notes']) ? $data['notes'] : null;
        $add->save();

        $detail = new OrderDetail;
        $detail->addNew($data,$add->id);

        $user           = AppUser::find($data['user_id']);
        $user->wallet   = $user->wallet - $add->total;

        if(!$user->rcode)
        {
            $user->rcode = $user->name[0].rand(11111,99999);
        }

        $user->save(); 

        $trans = new Trans;
        $trans->addNew(['user_id' => $add->user_id,'amount' => $add->total,'notes' => 'Order placed amount'],1);
        
        return ['done' => true];
    }

    public function getAll($id)
    {
        return Order::leftjoin('plan','orders.plan_id','=','plan.id')
                    ->join('app_user','orders.user_id','=','app_user.id')
                    ->join('address','orders.address_id','=','address.id')
                    ->select('plan.title as plan','orders.*','app_user.name as user_name','app_user.phone as user_phone','address.address as address','address.landmark','address.floor','address.type as address_type','address.lat','address.lng')
                    ->where('orders.store_id',$id)
                    ->orderBy('orders.id','DESC')
                    ->get();
    }

    public function getSingle($id)
    {
        $res = Order::find($id);

        return Order::leftjoin('plan','orders.plan_id','=','plan.id')
                    ->join('app_user','orders.user_id','=','app_user.id')
                    ->join('address','orders.address_id','=','address.id')
                    ->select('plan.title as plan','orders.*','app_user.name as user_name','app_user.phone as user_phone','address.address as address','address.landmark','address.floor','address.type as address_type','address.lat','address.lng')
                    ->where('orders.id',$id)
                    ->where('orders.store_id',$res->store_id)
                    ->first();
    }

    public function getItem($id)
    {
        return OrderDetail::where('order_id',$id)->get();
    }

    public function getDeliveryDate($id)
    {
        return OrderDates::where('detail_id',$id)->orderBy('delivery_date','ASC')->get();
    }

    public function getAppData()
    {
        $data = [];

        foreach($this->getAll($_GET['store_id']) as $row)
        {
            $data[] = [
            
            'order'         => $row,
            'start_date'    => date('d-M-Y',strtotime($row->start_date)),
            'end_date'      => date('d-M-Y',strtotime($row->end_date)),
            'item'          => $this->getAppDataItem($row->id)
            ];
        }

        return $data;
    }

    public function getAppDataItem($id)
    {
        $data = [];

        foreach($this->getItem($id) as $row)
        {
            $data[] = [

            'item'  => $row,
            'days'  => explode(",",$row->days)

            ];
        }

        return $data;
    }

    public function manualOrder($data)
    {
        $cart = new Cart;
        $user = AppUser::where('email',$data['email'])->first();
        $total = $cart->getManualAmount($data);

        if(!isset($user->id))
        {
          $user             = new AppUser;
          $user->id         = rand(111,999).Str::uuid();
          $user->name       = $data['name'];
          $user->email      = $data['email'];
          $user->phone      = $data['phone'];
          $user->status     = 1;
          $user->password   = "google123";
          $user->save();  
        }

       if(isset($data['ad']))
       {
            $address            = new Address;
            $address->user_id   = $user->id;
            $address->address   = $data['ad'];
            $address->type      = "Home";
            $address->lat       = $data['lat'];
            $address->lng       = $data['lng'];
            $address->save();
            $address_id          = $address->id;
       }
       else
       {
           $address_id          = 0;
       }

        $add                = new Order;
        $add->id            = rand(111,999).Str::uuid();
        $add->store_id      = Auth::guard('store')->user()->id;
        $add->user_id       = $user->id;
        $add->address_id    = $address_id;
        $add->total         = $total['total_price'];
        $add->discount      = 0;
        $add->start_date    = $data['start_date'];
        $add->end_date      = $data['valid_till'];
        $add->notes         = isset($data['notes']) ? $data['notes'] : null;
        $add->plan_id       = 0;
        $add->save();

        //order detail
        $item                     = Tifin::find($data['item_id']);
        $detail                   = new OrderDetail;
        $detail->order_id         = $add->id;
        $detail->item_id          = $data['item_id'];
        $detail->qty              = 1;
        $detail->price             = $total['price'];
        $detail->price_total       = $total['total_price'];
        $detail->name              = $item->name;
        $detail->description       = $item->text;
        $detail->type              = $total['type'];
        $detail->days              = $total['days'];
        $detail->day_count         = $total['dayCount'];
        $detail->start_date        = $data['start_date'];
        $detail->end_date          = $data['valid_till'];
        $detail->plan_id           = 0;
        $detail->Save();

        foreach($total['dates'] as $date)
        {
            $day                    = new OrderDates;
            $day->order_id          = $add->id;
            $day->detail_id         = $detail->id;
            $day->delivery_date     = $date;
            $day->save();
        }

        $user->wallet   = $user->wallet - $add->total;
        $user->save(); 

        $trans = new Trans;
        $trans->addNew(['user_id' => $add->user_id,'amount' => $add->total,'notes' => 'Order placed amount'],1);
        
        return ['done' => true];
    }
}
