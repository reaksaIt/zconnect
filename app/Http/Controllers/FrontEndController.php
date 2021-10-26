<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;
class FrontEndController extends Controller
{
    function about(){
        return view('pages.about_us');
    }
    function contact(){
        return view('pages.contact_us');
    }









    // Send Mail 
    public function SendMail(Request $req){
        $details = [
            'title'=>'Get In Touch',
            'from'=>$req->email,
            'phone'=>$req->phone,
            'name'=>$req->name,
            'message'=>$req->message,
        ];
        $mail = Mail::to('reaksa1639@gmail.com')->send(new SendMail($details));

        echo json_encode(array('sended'=>'Success'));
        
    }


    public function RequestQuote(Request $req){
        $pex = $req->input('pexelCamera');

        $cameraAmount = $req->cameraAmount;
        $cableLength = $req->cableLength;
        $remark = $req->remark;

        $combineAmount = array_combine($pex,$cameraAmount);
        $combineLength = array_combine($pex,$cableLength);
        $combinerRemark = array_combine($pex,$remark);
        $recuresive = array_merge_recursive($combineAmount,$combineLength,$combinerRemark);
        
        echo json_encode(array('data'=>$recuresive));
    }
}
