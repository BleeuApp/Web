<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Illuminate\Support\Facades\File;

class Language extends Authenticatable
{
    protected $table = "language";

    public function addNew($data,$type)
    {
        $add                = $type === 'add' ? new Language : Language::find($type);
        $add->name          = isset($data['name']) ? $data['name'] : null;
        $add->type          = isset($data['type']) ? $data['type'] : 0;
        $add->sort_no       = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->status        = isset($data['status']) ? $data['status'] : 0;
        $add->file_name     = isset($data['file_name']) ? $data['file_name'] : 'en.php';

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/language/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll()
    {
        return Language::orderBy('sort_no','ASC')->get();
    }

    public function getWithEng($type)
    {
        if($type == "user")
        {
            $path = "lang";
        }
        elseif($type == "store")
        {
            $path = "lang/store";
        }
        elseif($type == "delivery")
        {
            $path = "lang/delivery";
        }

        $text   = include_once($path."/en.php");
        $data[] = [
        
        'id'    => 0,
        'name'  => 'English',
        'icon'  => Asset("upload/language/en.png"),
        'text'  => $text,
        'type'  => 0

        ];

        foreach(Language::where('status',0)->orderBy('sort_no','ASC')->get() as $row)
        {
            $text   = include_once($path."/".$row->file_name);
            $data[] = [
            
            'id'    => $row->id,
            'name'  => $row->name,
            'icon'  => Asset('upload/language/'.$row->img),
            'text'  => $text,
            'type'  => $row->type
            
            ];
        }

        return $data;
    }

    public function getLang()
    {
        if(isset($_GET['lid']) && $_GET['lid'] > 0)
        {
            $id = $_GET['lid'];
        }
        else
        {
            $id = User::find(1)->lang;
        }

        return $id;
    }

    public function getEnglish($type)
    {
        if($type == "user")
        {
            $path = "lang";
        }
        elseif($type == "store")
        {
            $path = "lang/store";
        }
        elseif($type == "delivery")
        {
            $path = "lang/delivery";
        }

        $text   = include_once($path."/en.php");
        
        return [
        
        'id'    => 0,
        'name'  => 'English',
        'icon'  => Asset("upload/language/en.png"),
        'text'  => $text,
        'type'  => 0

        ];
    }
}
