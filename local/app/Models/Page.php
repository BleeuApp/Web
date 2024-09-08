<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class Page extends Authenticatable
{
    protected $table = "page";

    public function addNew($data)
    {
        $a                  = isset($data['lid']) ? array_combine($data['lid'], $data['l_about_us']) : [];
        $b                  = isset($data['lid']) ? array_combine($data['lid'], $data['l_faq']) : [];

        $add                = Page::find(1);
        $add->about_us      = isset($data['about_us']) ? $data['about_us'] : null;
        $add->faq           = isset($data['faq']) ? $data['faq'] : null;
        $add->s_data        = serialize([$a,$b]);

        if(isset($data['about_img']))
        {
            $filename   = time().rand(111,699).'.' .$data['about_img']->getClientOriginalExtension(); 
            $data['about_img']->move("upload/page/", $filename);   
            $add->about_img = $filename;   
        }

        if(isset($data['faq_img']))
        {
            $filename2   = time().rand(111,699).'.' .$data['faq_img']->getClientOriginalExtension(); 
            $data['faq_img']->move("upload/page/", $filename2);   
            $add->faq_img = $filename2;   
        }

        $add->save();
    }

    public function getAppData()
    {
        $res  = Page::find(1);
        $lang = new Language;
        $lid  = $lang->getLang();

        $about          = $lid > 0 ? $this->getSData($res->s_data,$lid,0) : $res->about_us;
        $faq            = $lid > 0 ? $this->getSData($res->s_data,$lid,2) : $res->faq;
        
        $data = [

        'about_us'        => $about,
        'faq'             => $faq,
        'about_img'       => $res->about_img ? Asset('upload/page/'.$res->about_img) : null,
        'faq_img'         => $res->faq_img ? Asset('upload/page/'.$res->faq_img) : null

        ];

        return $data;
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);
 
        return isset($data[$field][$id]) ? $data[$field][$id] : null;
    }
}
