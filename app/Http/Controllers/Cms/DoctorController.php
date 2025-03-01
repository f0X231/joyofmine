<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        parent::chkSessionAuthen();
        
        // Get Doctor
        $doctor = parent::getListOfDoctor();

        return view('cms.doctor', ['doctor' => $doctor ]);
    }
}
