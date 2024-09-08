<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class OrderDetail extends Authenticatable
{
    protected $table = 'order_detail';	

    public function addNew($data,$id)
    {
        foreach($data['cal']['summery'] as $sum)
        {   
            $item                   = Tifin::find($sum['item_id']);
            $add                    = new OrderDetail;
            $add->order_id          = $id;
            $add->item_id           = $sum['item_id'];
            $add->qty               = 1;
            $add->price             = $sum['price'];
            $add->price_total       = $sum['total_price'];
            $add->name              = $item->name;
            $add->description       = $item->text;
            $add->type              = $sum['type'];
            $add->days              = implode(",",$sum['days']);
            $add->day_count         = $sum['dayCount'];
            $add->start_date        = $data['cal']['start'];
            $add->end_date          = $data['cal']['end'];
            $add->plan_id           = $data['plan'];

            $add->Save();

            foreach($sum['dates'] as $date)
            {
                $day                    = new OrderDates;
                $day->order_id          = $id;
                $day->detail_id         = $add->id;
                $day->delivery_date     = $date;
                $day->save();
            }
        }

        Cart::where('cart_no',$data['cart_no'])->delete();
    }

    public function getAppData()
    {
        $data   = [];
        $admin  = User::find(1);
        $rating = new Rating; 
        $res    = OrderDetail::join('orders','order_detail.order_id','=','orders.id')
                             ->join('store','orders.store_id','=','store.id')
                           ->select('order_detail.*','orders.store_id','store.name as store','orders.store_id')
                           ->where('orders.user_id',$_GET['user_id'])
                           ->where('order_detail.status',0)
                           ->get();

        foreach($res as $row)
        {
            $data[] = [
            
            'order_id'   => $row->order_id,
            'detail_id'  => $row->id,
            'item_id'    => $row->item_id,
            'item'       => $row->name,
            'desc'       => $row->description,
            'type'       => $row->type,
            'days'       => explode(",",$row->days),
            'price'      => $row->price,
            'total'      => $row->price_total,
            'currency'   => $admin->currency,
            'start_date' => date('d-M-Y',strtotime($row->start_date)),
            'end_date'   => date('d-M-Y',strtotime($row->end_date)),
            'dates'      => $this->getDate($row->id),
            'pending'    => $this->getPendingDate($row->id,$row->price),
            'canRate'    => $rating->canRate($_GET['user_id'],$row->item_id,$row->store_id),
            'store_name' => $row->store,
            'store_id'   => $row->store_id


            ];
        }

        return $data;
    }
    
    public function getDate($id)
    {
        $data = [];

        foreach(OrderDates::where('detail_id',$id)->get() as $row)
        {
            $data[] = [
            
            'date'        => date('D,d F',strtotime($row->delivery_date)),
            'status'      => $row->status,
            'status_time' => $row->status_time,
            'not'         => date("Y-m-d") > $row->delivery_date && $row->status != 2 ? true : false,
            'mark'        => date("Y-m-d") < $row->delivery_date ? true : false,
            'id'          => $row->id
            ];
        }

        return $data;
    }

    public function getPendingDate($id,$price)
    {
        $count = OrderDates::where('detail_id',$id)->where('delivery_date','>',date('Y-m-d'))->count();

        return ['amount' => round($count * $price),'count' => $count];
    }

    public function renew()
    {
        $res  = OrderDetail::where('end_date',date('Y-m-d'))->where('status',0)->get();
        $cart = new Cart;

        foreach($res as $row)
        {
            $order      = Order::find($row->order_id);
            $store      = Store::find($order->store_id);
            $plan       = Plan::find($row->plan_id);
            $start_date = date("Y-m-d");
            $end_date   = $cart->getEndDate($plan,$start_date);
            $totalDays  = $cart->getDayDiff($start_date,$end_date);

            //Delivery Dates
            $dates           = [];
            $sdate           = date("Y-m-d",strtotime($start_date));
            $start_date      = date("Y-m-d",strtotime($start_date));
            $store_days      = explode(",",$store->working_day);
            $summery         = [];
            $total           = [];
            $cartArray       = explode(",",$row->days);
            $dates           = [];

            if(count($dates) == 0)
            {
                $d    = date('l',strtotime($start_date));

                if(in_array($d,$store_days) && in_array($d,$cartArray))
                {
                    array_push($dates,$start_date);
                }
            }

            for ($i = 1; $i < $totalDays; $i++) 
            {
                $start_date = date('Y-m-d', strtotime($start_date." +1 day"));
                $dayName    = date('l',strtotime($start_date));

                if(in_array($dayName,$store_days) && in_array($dayName,$cartArray))
                {
                    array_push($dates,$start_date);
                }
            }

            $this->updateRenew($start_date,$end_date,$row->id,$dates);

            $dates = [];
        }
    }

    public function updateRenew($start_date,$end_date,$detail_id,$dates)
    {
        $old                = OrderDetail::find($detail_id);
        $new                = $old->replicate();
        $new->start_date    = date("Y-m-d");
        $new->end_date      = $end_date;
        $new->save();

        foreach($dates as $date)
        {
            $day                    = new OrderDates;
            $day->order_id          = $new->order_id;
            $day->detail_id         = $new->id;
            $day->delivery_date     = $date;
            $day->save();
        }
        
        $user               = AppUser::find(Order::find($new->order_id)->user_id);
        $user->wallet       = $user->wallet - $new->price_total;
        $user->save();
    }
}
