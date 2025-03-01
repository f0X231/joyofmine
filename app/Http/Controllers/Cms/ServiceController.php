<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services as Services;
use App\Models\Gallery as Gallery;

class ServiceController extends Controller
{
    public function index()
    {
        parent::chkSessionAuthen();
        
        // Get list of Services
        $data = array();
        $services = Services::orderBy('order_no', 'asc')->get();
        foreach($services as $key => $items) {
            $title      = unserialize($items->title);
            $slugTH     = $this->make_slug($title['th']);
            $slugEN     = $this->make_slug($title['en']);

            $data[$key]['id']           = $items->id;
            $data[$key]['title']        = $title;
            $data[$key]['thumbnail']    = unserialize($items->thumbnail);
            $data[$key]['slug']         = array(
                                                'th'    => 'services/'.$items->id.'/'.$slugTH,
                                                'en'    => 'services/'.$items->id.'/'.$slugEN,
                                            );
            $data[$key]['status']       = $items->is_active;
        }

        return view('cms.services', ['services' => $data ]);
    }

    public function actionAdd()
    {
        //return view('cms.services_modify', ['services' => $article ]);
    }

    public function actionEdit()
    {
        //return view('cms.services_modify', ['services' => $article ]);
    }

    public function actionDelete()
    {
        
    }

    public function actionSave()
    {
        
    }
}
