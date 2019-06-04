<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notification;
class FoundController extends Controller
{
    public function index(){
        return view('users.found');
    }
    public function found(Request $request){
        
        $code = $request->get('code');
        $count = DB::select("select count(losts.id) as count from losts join items on (losts.id_item=items.id) where custom_input='$code'");
        $counta = $count[0]->count;
        if($counta!=0){
            $id_pene =  DB::select("select users.id from losts join items on (losts.id_item=items.id) join users on (users.id=items.id_user) where custom_input='$code'");
            $id_ite = DB::select("select items.id from losts join items on (losts.id_item=items.id) join users on (users.id=items.id_user) where custom_input='$code'");
            $new_notification = new Notification(); 
            $new_notification->id_pengirim = Auth::id();
            $new_notification->id_penerima = $id_pene[0]->id;
            $new_notification->id_item = $id_ite[0]->id;
            $new_notification->save();
            // $data=[
            //     'id_pengirim'=>Auth::id(),
            //     'id_penerima'=>(integer)$id_pene,
            //     'id_item'=>(integer)$id_ite,
            // ];
            // Notification::create($data);
            $message=[
                // 'status'=>200,
                'message'=>'Notifikasi telah dikirim ke pemilik. Terimakasih atas Kerjasamanya',
            ];
        }else{
            $message=[
                // 'status'=>500,
                'message'=>'Code yang anda masukan tidak dimiliki oleh barang hilang manapun',
            ];
        }
        return response()->json($message);    
        
    }
}
