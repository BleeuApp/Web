<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;
use Str;
use DB;

class Professional extends Authenticatable
{
    protected $table = 'professionals';

    public $incrementing = false;

    public function getKeyName()
    {
        return 'id';
    }

    public function login($data)
    {
        $chk = Professional::where('email', $data['email'])
            ->where('password', md5($data['password']))
            ->first();

        // You can add language/settings logic as needed
        if (isset($chk->id)) {
            return [
                'msg' => 'done',
                'user' => $chk,
                // 'setting' => User::find(1), // Uncomment if you have a settings model
                // 'lang' => (new Language)->getEnglish("professional") // Uncomment if you have language logic
            ];
        } else {
            return [
                'msg' => 'error',
                'error' => 'Invalid login details'
            ];
        }
    }
}
