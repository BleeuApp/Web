<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;
use DB;

class OrderDates extends Authenticatable
{
    protected $table = 'order_dates';
    
    public function today($store_id,$type,$status = "all")
    {
        $store = Store::find($store_id);
        $date  = isset($_GET['date']) && $_GET['date'] != "" ? $_GET['date'] : date("Y-m-d");
        $lat   = isset($_GET['current_lat']) ? $_GET['current_lat'] : $store->lat;
        $lng   = isset($_GET['current_lng']) ? $_GET['current_lng'] : $store->lng;

        return OrderDates::where(function($query) use($type,$status){

                         if($type != "all")
                         {
                            $query->where('order_detail.type',$type);
                         }

                         if(isset($_GET['delivery_id']))
                         {
                            $query->where('order_dates.delivery_id',$_GET['delivery_id']);
                         }

                         if($status != "all")
                         {
                            if($status == "pending")
                            {
                                $query->whereIn('order_dates.status',[0,1]);
                            }
                            elseif($status == "complete")
                            {
                                $query->where('order_dates.status',2);
                            }
                         }

                         })->join('order_detail','order_dates.detail_id','=','order_detail.id')
                         ->join('orders','order_detail.order_id','=','orders.id')
                         ->join('app_user','orders.user_id','=','app_user.id')
                         ->join('address','orders.address_id','=','address.id')
                         ->leftjoin('delivery','order_dates.delivery_id','=','delivery.id')
                         ->select('orders.notes','delivery.name as dboy','order_dates.status_time','order_dates.status as order_status','order_detail.type as food_type','order_dates.id as date_id','order_dates.delivery_id','order_detail.*','app_user.name as user_name','app_user.phone as user_phone','address.address as address','address.landmark','address.floor','address.type as address_type','address.lat','address.lng','order_dates.delivery_date',DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                         * cos(radians(address.lat)) 
                         * cos(radians(address.lng) - radians(" . $lng . ")) 
                         + sin(radians(" .$lat. ")) 
                         * sin(radians(address.lat))) AS distance"))
                         ->where('order_dates.delivery_date',$date)
                         ->where('orders.store_id',$store_id)
                         ->orderBy('distance','ASC')
                         ->get();
    }

    public function complete($store_id,$date = [])
    {
        $store = Store::find($store_id);

        $res = OrderDates::where(function($query) use($date)
        {
            if(isset($_GET['delivery_id']))
            {
                $query->where('order_dates.delivery_id',$_GET['delivery_id']);
            }

            $query->where('order_dates.status',2);

            if(count($date) == 0)
            {
                $query->where('order_dates.delivery_date',date("Y-m-d"));
            }
            else
            {
                $query->where('order_dates.delivery_date','>=',$date[0])->where('order_dates.delivery_date','<=',$date[1]);
            }

        })->join('order_detail','order_dates.detail_id','=','order_detail.id')
                ->join('orders','order_detail.order_id','=','orders.id')
                ->join('app_user','orders.user_id','=','app_user.id')
                ->join('address','orders.address_id','=','address.id')
                ->select('order_dates.img','order_dates.status_time','order_dates.status as order_status','order_detail.type as food_type','order_dates.id as date_id','order_dates.delivery_id','order_detail.*','app_user.name as user_name','app_user.phone as user_phone','address.address as address','address.landmark','address.floor','address.type as address_type','address.lat','address.lng','order_dates.delivery_date',DB::raw("6371 * acos(cos(radians(order_dates.complete_lat)) 
                * cos(radians(order_dates.d_lat)) 
                * cos(radians(order_dates.d_lng) - radians(order_dates.complete_lng)) 
                + sin(radians(order_dates.complete_lat)) 
                * sin(radians(order_dates.d_lat))) AS distance"))
                ->where('orders.store_id',$store_id)
                ->orderBy('distance','ASC')
                ->get();
        
        $data  = [];
        $admin = User::find(1);

        foreach($res as $row)
        {
            $data[] = [
            
            'row'       => $row,
            'earn'      => $this->getEarning($row->delivery_id,$row->distance),
            'currency'  => $admin->currency,
            'img'       => $row->img ? Asset('upload/order/'.$row->img) : null

            ];
        }

        return $data;
    }

    public function getEarning($id,$distance)
    {
        $delivery = Delivery::find($id);

        if($delivery->type == 0)
        {
            return $delivery->per_delivery;
        }
        else
        {
            return number_format($delivery->per_km * $distance,1);
        }
    }

    public function getItemCount($store_id)
    {
        $data = [];

        foreach(Tifin::where('store_id',$store_id)->get() as $item)
        {
            $b      = $this->getCount($item->id,"Breakfast");
            $l      = $this->getCount($item->id,"Lunch");
            $d      = $this->getCount($item->id,"Dinner");

            if($b > 0 || $l > 0 || $d > 0)
            {
                $data[] = ['name' => $item->name,'img' => Asset('upload/tifin/'.$item->img),'breakfast' => $b,'lunch' => $l,'dinner' => $d];
            }
        }

        return $data;
    }

    public function getCount($id,$type)
    {   
        $date  = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");

        return OrderDates::join('order_detail','order_dates.detail_id','=','order_detail.id')
                        ->where('order_dates.delivery_date',$date)
                        ->where('order_detail.type',$type)
                        ->where('order_detail.item_id',$id)
                        ->count();
    }

    public function getDateWise()
    {
        $date1      = new \DateTime($_GET['from']);
        $date2      = new \DateTime($_GET['to']);
        $interval   = $date1->diff($date2);
        $data       = [];

        for($i=0;$i<=$interval->days;$i++)
        {
            $date   = date('Y-m-d',strtotime($_GET['from'].' + '.$i.' day'));

            $data[] = [
            
            'date'          => $date,
            'breakfast'     => $this->countDate($date,'Breakfast'),
            'lunch'         => $this->countDate($date,'Lunch'),
            'dinner'        => $this->countDate($date,'Dinner')

            ];
        }

        return $data;
    }

    public function countDate($date,$type)
    {
        return OrderDates::join('order_detail','order_dates.detail_id','=','order_detail.id')
                         ->join('orders','order_detail.order_id','=','orders.id')
                         ->where('orders.store_id',Auth::guard('store')->user()->id)
                         ->where('order_dates.delivery_date',$date)
                         ->where('order_detail.type',$type)
                         ->count();
    }

    public function mark($data)
    {
        $total = [];
        $id    = $data['id'];

        for($i=0;$i<count($id);$i++)
        {
            $update             = OrderDates::find($id[$i]);
            $update->status     = 3;
            $update->save();

            $detail              = OrderDetail::find($update->detail_id);
            $user                = AppUser::find($data['user_id']);
            $user->wallet        = $user->wallet + $detail->price;
            $user->save();

            $trans               = new Trans;
            $trans->addNew(['amount' => $detail->price,'user_id' => $data['user_id'],'notes' => 'Delivery removed'],0);

            $total[] = $detail->price;
        }

        return User::find(1)->currency.array_sum($total);
    }

    public function undo()
    {
        $date   = OrderDates::find($_GET['id']);
        $detail = OrderDetail::find($date->detail_id);
        $user   = AppUser::find(Order::find($detail->order_id)->user_id);
        
        if($detail->price > $user->wallet)
        {
            return ['msg' => 'error','error' => "Sorry! You don't have sufficient balance in your wallet. Recharge your wallet and try again."];
        }
        else
        {
            $date->status = 0;
            $date->save();

            $user->wallet = $user->wallet - $detail->price;
            $user->save();

            $trans = new Trans;
            $trans->addNew(['amount' => $detail->price,'user_id' => $user->id],1);

            return ['msg' => 'done','data' => User::find(1)->currency.$detail->price];
        }
    }

    public function stop()
    {
        $count   = OrderDates::where('delivery_date','>',date("Y-m-d"))->where('detail_id',$_GET['detail_id'])->where('status',0)->count();
        $detail  = OrderDetail::find($_GET['detail_id']);
        $amount  = round($detail->price * $count);
        $order   = Order::find($detail->order_id);

       OrderDates::where('delivery_date','>',date("Y-m-d"))->where('detail_id',$_GET['detail_id'])->where('status',0)->update(['status' => 3]);

    
       $detail->status = 1;
       $detail->save(); 

       $user            = AppUser::find($order->user_id);
       $user->wallet    = $user->wallet + $amount;
       $user->save();

       if($amount > 0)
       {
         $trans               = new Trans;
         $trans->addNew(['amount' => $amount,'user_id' => $user->id,'notes' => 'Subscription refund'],0);
       }
    }

    public function countDelivery($id,$date)
    {
        return OrderDates::join('orders','order_dates.order_id','=','orders.id')
                           ->select('orders.*')
                           ->where('orders.store_id',$id)
                           ->where('order_dates.delivery_date',$date)
                           ->count();
    }

    public function getPrint()
    {
        return OrderDates::join('orders','order_dates.order_id','=','orders.id')
                         ->leftjoin('address','orders.address_id','=','address.id')
                         ->join('app_user','orders.user_id','=','app_user.id')
                         ->join('order_detail','order_dates.detail_id','=','order_detail.id')
                         ->select('app_user.*','order_detail.name as item','order_detail.description','order_dates.delivery_date','address.address','orders.notes')
                         ->where('order_dates.delivery_date',$_GET['date'])
                         ->get();
    }
}
