<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors as Doctors;

class DoctorController extends Controller
{
    public function index()
    {
        // Get Banner
        $banner = parent::getBanner('doctor');

        // Get Doctor
        $doctor = parent::getListOfDoctor();

        // Get Services
        $services = parent::getListOfServices();

        $seo = parent::getSEO(  'Doctor', 
                                'ยามที่เกิดปัญหารุมเร้า ทุกคนต่างอยากมีใครสักคนที่คอยรับฟัง เข้าใจถึงความทุกข์ที่มีอยู่และช่วยกันคิดหาทางแก้ไข เราได้เล็งเห็นถึงความสำคัญของปัญหานี้จึงเป็นที่มาของ คลินิก JOY OF MINDS ซึ่งเป็นการรวมตัวของแพทย์ที่เชี่ยวชาญด้านจิตเวช คอยเป็นเพื่อนร่วมรับฟังและแก้ไขปัญหาไปพร้อมกันเคียงข้างคุณ', 
                                'คลินิก JOY OF MINDS, แพทย์ที่เชี่ยวชาญด้านจิตเวช', 
                                config('global.sitename').$banner[0]['image']['th'],
                                config('global.sitename').'doctor'    );

        return view('pages.doctor', [   'seo'       => $seo,
                                        'banner'    => $banner,
                                        'services'  => $services, 
                                        'doctor'    => $doctor        ]);
    }

    public function profile($id, $name)
    {
        // Get Banner
        $banner = parent::getBanner('doctor');

        // Get Doctor
        $doctor = parent::getListOfDoctor();

        // Get Services
        $services = parent::getListOfServices();

        // Get Infomation of Doctor
        $data = array();
        $result = Doctors::where('id', $id)->get();
        foreach($result as $key => $person) {
            $data[$key]['id']           = $person->id;
            $data[$key]['name']         = unserialize($person->name);
            $data[$key]['nickname']     = $person->nickname;
            $data[$key]['license']      = $person->license;
            $data[$key]['position']     = unserialize($person->description);
            $data[$key]['department']   = unserialize($person->department);
            $data[$key]['education']    = unserialize($person->education);
            $data[$key]['work']         = unserialize($person->work);
            $data[$key]['extended']     = unserialize($person->extended);
            $data[$key]['picture']      = $person->picture;
        }

        $seo = parent::getSEO(  $data[0]['name']['th'], 
                                'คุณจะได้พูดคุยเล่าเรื่องราวต่างๆ หรือปรึกษาปัญหาที่มีอยู่ในบรรยากาศที่อบอุ่น โดยแพทย์ผู้เชี่ยวชาญด้านสุขภาพจิตที่พร้อมเป็นเพื่อนที่รับฟังไปกับคุณ เน้นการพูดคุย ทำความเข้าใจ และหาทางแก้ปัญหาไปพร้อมกัน สถานที่ตั้งอยู่ใจกลางเมือง ศูนย์กลางการทำงานของชาวกรุงเทพ เดินทางมาพูดคุยกันได้อย่างสะดวกสบาย', 
                                'คลินิก JOY OF MINDS, แพทย์ที่เชี่ยวชาญด้านจิตเวช, '. $data[0]['name']['th'], 
                                config('global.sitename').$data[0]['picture'],
                                config('global.sitename').'doctor/'.$data[0]['id'].'/'.$this->make_slug($data[0]['name']['th'])    );

        return view('pages.doctorProfile', [    'seo'       => $seo,
                                                'banner'    => $banner, 
                                                'data'      => $data[0],
                                                'services'  => $services,
                                                'doctor'    => $doctor      ]);
    }

    public function indexPsychiatrist()
    {
        // Get Banner
        $banner = parent::getBanner('doctor');

        // Get Doctor
        $doctor = parent::getListOfDoctor();
        $psychiatrist = parent::getListOfPsychiatrist();

        // Get Services
        $services = parent::getListOfServices();

        $seo = parent::getSEO(  'Psychiatrist', 
                                'ยามที่เกิดปัญหารุมเร้า ทุกคนต่างอยากมีใครสักคนที่คอยรับฟัง เข้าใจถึงความทุกข์ที่มีอยู่และช่วยกันคิดหาทางแก้ไข เราได้เล็งเห็นถึงความสำคัญของปัญหานี้จึงเป็นที่มาของ คลินิก JOY OF MINDS ซึ่งเป็นการรวมตัวของแพทย์ที่เชี่ยวชาญด้านจิตเวช คอยเป็นเพื่อนร่วมรับฟังและแก้ไขปัญหาไปพร้อมกันเคียงข้างคุณ', 
                                'คลินิก JOY OF MINDS, แพทย์ที่เชี่ยวชาญด้านจิตเวช', 
                                config('global.sitename').$banner[0]['image']['th'],
                                config('global.sitename').'psychologist'    );

        return view('pages.psychiatrist', [ 'seo'       => $seo,
                                            'banner'    => $banner,
                                            'services'  => $services, 
                                            'doctor'    => $doctor,
                                            'psychiatrist'  => $psychiatrist      
                                        ]);
    }

    public function profilePsychiatrist($id, $name)
    {
        // Get Banner
        $banner = parent::getBanner('doctor');

        // Get Doctor
        $doctor = parent::getListOfDoctor();

        // Get Services
        $services = parent::getListOfServices();

        // Get Infomation of Doctor
        $data = array();
        $result = Doctors::where('id', $id)->get();
        foreach($result as $key => $person) {
            $data[$key]['id']           = $person->id;
            $data[$key]['name']         = unserialize($person->name);
            $data[$key]['nickname']     = $person->nickname;
            $data[$key]['license']      = $person->license;
            $data[$key]['position']     = unserialize($person->description);
            $data[$key]['department']   = unserialize($person->department);
            $data[$key]['education']    = unserialize($person->education);
            $data[$key]['work']         = unserialize($person->work);
            $data[$key]['extended']     = unserialize($person->extended);
            $data[$key]['picture']      = $person->picture;
        }

        $seo = parent::getSEO(  $data[0]['name']['th'], 
                                'คุณจะได้พูดคุยเล่าเรื่องราวต่างๆ หรือปรึกษาปัญหาที่มีอยู่ในบรรยากาศที่อบอุ่น โดยแพทย์ผู้เชี่ยวชาญด้านสุขภาพจิตที่พร้อมเป็นเพื่อนที่รับฟังไปกับคุณ เน้นการพูดคุย ทำความเข้าใจ และหาทางแก้ปัญหาไปพร้อมกัน สถานที่ตั้งอยู่ใจกลางเมือง ศูนย์กลางการทำงานของชาวกรุงเทพ เดินทางมาพูดคุยกันได้อย่างสะดวกสบาย', 
                                'คลินิก JOY OF MINDS, แพทย์ที่เชี่ยวชาญด้านจิตเวช, '. $data[0]['name']['th'], 
                                config('global.sitename').$data[0]['picture'],
                                config('global.sitename').'psychologist/'.$data[0]['id'].'/'.$this->make_slug($data[0]['name']['th'])    );

        return view('pages.psychiatristProfile', [  'seo'       => $seo,
                                                    'banner'    => $banner, 
                                                    'data'      => $data[0],
                                                    'services'  => $services,
                                                    'doctor'    => $doctor      ]);
    }

    public function indexOccupational()
    {
        // Get Banner
        $banner = parent::getBanner('doctor');

        // Get Doctor
        $doctor = parent::getListOfDoctor();
        $occupational = parent::getListOfOccupational();

        // Get Services
        $services = parent::getListOfServices();

        $seo = parent::getSEO(  'Occupational Therapist', 
                                'ยามที่เกิดปัญหารุมเร้า ทุกคนต่างอยากมีใครสักคนที่คอยรับฟัง เข้าใจถึงความทุกข์ที่มีอยู่และช่วยกันคิดหาทางแก้ไข เราได้เล็งเห็นถึงความสำคัญของปัญหานี้จึงเป็นที่มาของ คลินิก JOY OF MINDS ซึ่งเป็นการรวมตัวของแพทย์ที่เชี่ยวชาญด้านจิตเวช คอยเป็นเพื่อนร่วมรับฟังและแก้ไขปัญหาไปพร้อมกันเคียงข้างคุณ', 
                                'คลินิก JOY OF MINDS, แพทย์ที่เชี่ยวชาญด้านจิตเวช', 
                                config('global.sitename').$banner[0]['image']['th'],
                                config('global.sitename').'occupational-therapist'    );

        return view('pages.occupationalTherapist', [   'seo'           => $seo,
                                                        'banner'        => $banner,
                                                        'services'      => $services, 
                                                        'doctor'        => $doctor,
                                                        'occupational'  => $occupational      
                                                    ]);
    }

    public function profileOccupational($id, $name)
    {
        // Get Banner
        $banner = parent::getBanner('doctor');

        // Get Doctor
        $doctor = parent::getListOfDoctor();

        // Get Services
        $services = parent::getListOfServices();

        // Get Infomation of Doctor
        $data = array();
        $result = Doctors::where('id', $id)->get();
        foreach($result as $key => $person) {
            $data[$key]['id']           = $person->id;
            $data[$key]['name']         = unserialize($person->name);
            $data[$key]['nickname']     = $person->nickname;
            $data[$key]['license']      = $person->license;
            $data[$key]['position']     = unserialize($person->description);
            $data[$key]['department']   = unserialize($person->department);
            $data[$key]['education']    = unserialize($person->education);
            $data[$key]['work']         = unserialize($person->work);
            $data[$key]['extended']     = unserialize($person->extended);
            $data[$key]['picture']      = $person->picture;
        }

        $seo = parent::getSEO(  $data[0]['name']['th'], 
                                'คุณจะได้พูดคุยเล่าเรื่องราวต่างๆ หรือปรึกษาปัญหาที่มีอยู่ในบรรยากาศที่อบอุ่น โดยแพทย์ผู้เชี่ยวชาญด้านสุขภาพจิตที่พร้อมเป็นเพื่อนที่รับฟังไปกับคุณ เน้นการพูดคุย ทำความเข้าใจ และหาทางแก้ปัญหาไปพร้อมกัน สถานที่ตั้งอยู่ใจกลางเมือง ศูนย์กลางการทำงานของชาวกรุงเทพ เดินทางมาพูดคุยกันได้อย่างสะดวกสบาย', 
                                'คลินิก JOY OF MINDS, แพทย์ที่เชี่ยวชาญด้านจิตเวช, '. $data[0]['name']['th'], 
                                config('global.sitename').$data[0]['picture'],
                                config('global.sitename').'occupational-therapist/'.$data[0]['id'].'/'.$this->make_slug($data[0]['name']['th'])    );

        return view('pages.occupationalTherapistProfile', [  'seo'       => $seo,
                                                    'banner'    => $banner, 
                                                    'data'      => $data[0],
                                                    'services'  => $services,
                                                    'doctor'    => $doctor      ]);
    }

    public function make_slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
