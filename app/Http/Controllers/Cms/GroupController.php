<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Roles as Roles;
use App\Models\Authorization as Authorize;
use App\Models\AuthorizationPage as AuthorizePage;

class GroupController extends Controller
{
    public function index()
    {
        parent::chkSessionAuthen();
        
        $getRoles = Roles::where([['is_active', '=', 'Y'], ['is_delete', '=', 'N']])->orderBy('updated_at', 'DESC')->get();
        $header = array(
            'no'            => 'NO.',
            'name'          => 'NAME',
            'display'       => 'display',
            'update_date'   => 'UPDATE DATE',
            'tools'         => 'TOOLS',
        );

        return view('cms.users_groups', [   'header'        => $header, 
                                            'grouproles'    => $getRoles 
                                        ]);
    }

    public function modify(Request $request)
    {
        $rolesId = $request->get("id");
        $authrizeType = ['NONE', 'VIEW', 'MODIFY', 'FULL'];
        $getLoginInfo = Session::get('loginProfile');
        $authPage = [];

        $getAuthrizationPages = AuthorizePage::where([['is_active', '=', 'Y'], ['is_delete', '=', 'N']])
                                                ->orderBy('update_date', 'DESC')
                                                ->orderBy('id', 'ASC')
                                                ->get()
                                                ->toArray();


        if(!empty($rolesId)) {
            foreach($getAuthrizationPages as $key => $items) {
                foreach($getLoginInfo['auth'] as $key2 => $items2) {
                    if($items['id'] == $items2['id']) {
                        $authPage[$key] = array(
                            'id'        => $items['id'],
                            'name'      => $items['pagename'],
                            'ustatus'   => $items2['status']
                        );
                    }
                }
            }
        }

        return view('cms.users_groups_modify', [ 
                                                'type'          => $authrizeType, 
                                                'pageall'       => $getAuthrizationPages,
                                                'authpage'      => $authPage
                                            ]);
    }

    // public function actionEdit()
    // {
    //     return view('cms.groups_modify', ['groups' => $article ]);
    // }

    // public function actionDelete()
    // {
    // }

    // public function actionSave()
    // {
    // }
}
