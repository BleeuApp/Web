<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Slider;
use App\Models\User;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Store;
use App\Models\Tifin;
use App\Models\Cart;
use App\Models\AppUser;
use App\Models\Address;
use App\Models\Plan;
use DB;
use Validator;
use Redirect;
use Stripe;
class StripeController extends Controller {
	
    public function stripePayment(Request $Request)
    {
        $stripe      = new \Stripe\StripeClient(User::find(1)->stripe_sec_key);
        
        try{
        
        $user       = AppUser::find($Request->get('user'));
        $total      = $Request->get('total') * 100;
        
        if($user->stripe_client_id)
        {
            $client_id = $user->stripe_client_id;
        }
        else
        {
            $coust      =   $stripe->customers->create([
                        
                'name'  => $user->name,
                'phone' => $user->phone,
                'email' => $user->email

            ]);

            $client_id = $coust['id'];

            $user->stripe_client_id = $client_id;
            $user->save();
        }

        $ephemeral_key = $stripe->ephemeralKeys->create(
            ['customer'         => $client_id],
            ['stripe_version'   => "2022-11-15"]
        );

        $empKey = $ephemeral_key->secret;

        $payment = $stripe->paymentIntents->create([
            'amount'                    => $total,
            'currency'                  => User::find(1)->currency_code,
            'customer'                  => $client_id,
            'automatic_payment_methods' => [
              'enabled' => true,
            ],
          ]);

        $secKey = $payment['client_secret'];
 
		return response()->json([

        'paymentIntent' => $secKey,
        'ephemeralKey'  => $empKey,
        'customer'      => $client_id

        ]);

        }
        catch(\Exception $e)
        {
            //return response()->json(['error' => true]);

            echo $e->getMessage();
        }

    }
}
