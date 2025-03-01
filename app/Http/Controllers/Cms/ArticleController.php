<?php

namespace App\Http\Controllers\Cms;

use DateTime;
use DateTimeZone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Articles as Articles;

class ArticleController extends Controller
{
    public function index()
    {
        parent::chkSessionAuthen();
        
        $data = array();
        $results = Articles::orderBy('order_no', 'asc')->get();
        foreach($results as $key => $items) {
            $title      = unserialize($items->title);
            $slugTH     = parent::make_slug($title['th']);
            $slugEN     = parent::make_slug($title['en']);

            $data[$key]['id']           = $items->id;
            $data[$key]['title']        = $title;
            $data[$key]['thumbnail']    = unserialize($items->thumbnail);
            $data[$key]['slug']         = array(
                                                'th'    => 'articles/'.$items->id.'/'.$slugTH,
                                                'en'    => 'articles/'.$items->id.'/'.$slugEN,
                                            );
            $data[$key]['status']       = $items->is_active;
        }

        return view('cms.articles', ['article' => $data ]);
    }

    public function actionAdd()
    {
        return view('cms.articles_modify');
    }

    public function actionEdit()
    {
        //return view('cms.articles_modify', ['article' => $article ]);
    }

    public function actionDelete()
    {
        
    }

    public function actionSave(Request $request)
    {
        /*$rules = [
                    'title_th'          => 'required|string|min:3|max:255',
                    'title_en'          => 'required|string|min:3|max:255',
                    'detailArticleThai' => 'required|string|min:3',
                    'detailArticleEng'  => 'required|string|min:3'
                ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
        }
        else {
            
        }*/

        $title = array(
                        'th'    => $_POST['title_th'],
                        'en'    => $_POST['title_en']
                    );
        $detail = array(
                        'th'    => $_POST['detailArticleThai'],
                        'en'    => $_POST['detailArticleThai']
                    );
        $thumbnailPic = array('th' => '', 'en' => '');

        if ($request->hasFile('picture_thai')) {
            if ($request->file('picture_thai')->isValid()) {
                $validated = $request->validate([
                                                    'name'  => 'string|max:40',
                                                    'image' => 'mimes:jpeg,png|max:2048',
                                                ]);
                $path = getcwd().'/images/article/thumbnail';
                $extension = $request->file('picture_thai')->extension();
                $thumbnailPic['th'] = $this->random_string(64).".".$extension;
                $request->file('picture_thai')->move($path, $thumbnailPic['th']);
                $thumbnailPic['th'] = '/images/article/thumbnail/' . $this->random_string(64).".".$extension;
            }
        }
        if ($request->hasFile('picture_eng')) {
            if ($request->file('picture_eng')->isValid()) {
                $validated = $request->validate([
                                                    'name'  => 'string|max:40',
                                                    'image' => 'mimes:jpeg,png|max:2048',
                                                ]);
                $path = getcwd().'/images/article/thumbnail';
                $extension = $request->file('picture_eng')->extension();
                $thumbnailPic['en'] = $this->random_string(64).".".$extension;
                $request->file('picture_eng')->move($path, $thumbnailPic['en']);
                $thumbnailPic['en'] = '/images/article/thumbnail/'.$this->random_string(64).".".$extension;
            }
        }

        try{
            $date = new \DateTime("now", new \DateTimeZone("Asia/Bangkok"));
            $article = new Articles;
            $article->order_no      = 1;
            $article->title         = serialize($title);
            $article->detail        = serialize($detail);
            $article->thumbnail     = serialize($thumbnailPic);
            $article->create_date   = $date->format('Y-m-d H:i:s');
            $article->create_by     = 'ADMIN';
            $article->update_date   = $date->format('Y-m-d H:i:s');
            $article->update_by     = 'ADMIN';

            $article->save();
            return redirect('/cms/article');
        }
        catch(Exception $e){
            return redirect('insert')->with('failed',"operation failed");
        }

        exit;
    }

    protected function random_string($length) 
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) 
            $key .= $keys[array_rand($keys)];

        return $key;
    }

}
