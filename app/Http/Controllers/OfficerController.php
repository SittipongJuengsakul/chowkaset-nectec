<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\farmercommunities;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
class OfficerController extends Controller
{
    //หน้าหลักการจัดการของเจ้าหน้าที่
    public function index()
    {
    	return view('officer.home');
    }
    public function officerPostAddCommunity(Request $request){
        $fmcm = new farmercommunities;
        $fmcm->fmcm_name = $request->input('com_name');
        $fmcm->dpm_id = $request->input('com_dpm');
        $fmcm->address = $request->input('com_address');
        $fmcm->tel = $request->input('phone');
        $fmcm->facebook = $request->input('facebook');
        $fmcm->email = $request->input('email');
        $fmcm->province_id = $request->input('com_province');
        $fmcm->aumphur_id = $request->input('com_aumphur');
        $fmcm->district_id = $request->input('com_district');
        $fmcm->save();
        return Redirect::to('/officer');
     }
     public function officerPostEditCommunity(Request $request){
         $fmcm = new farmercommunities;
         $fmcm::find($request->input('com_editarea_id'));
         $fmcm->fmcm_name = $request->input('com_editarea_name');
         $fmcm->dpm_id = $request->input('com_editarea_dpm');
         $fmcm->address = $request->input('com_editarea_address');
         $fmcm->tel = $request->input('com_editarea_phone');
         $fmcm->facebook = $request->input('com_editarea_facebook');
         $fmcm->email = $request->input('com_editarea_email');
         $fmcm->province_id = $request->input('com_editarea_province');
         $fmcm->aumphur_id = $request->input('com_editarea_aumphur');
         $fmcm->district_id = $request->input('com_editarea_district');
         $fmcm->save();
         return Redirect::to('/officer');
      }
      public function officerPostDeleteCommunity(Request $request){
          $fmcm = new farmercommunities;
          $fmcm::find($request->input('com_editarea_id'));
          $fmcm->delete();
          return Redirect::to('/officer');
       }
}
