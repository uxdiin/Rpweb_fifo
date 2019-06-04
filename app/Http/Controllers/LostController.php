<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LostController extends Controller
{
    public function lost(Request $request){
        try{

            $new_lost = new Lost();
            $new_lost->id_item = $request->get('id');
            $new_lost->id_user = Auth::id();
            $new_lost->lost_date = date("Y-m-d");
            $new_lost->status = "LOST";
            $new_lost->save();
            $message=[
                'status'=>200,
                'message'=>'Berhasil',
            ];
        }catch(Exception $e){
            $message=[
                'status'=>500,
                'message'=>'gagal',
            ];
        }
        return response()->json($message);
        
    }
    public function found(Request $request){
        try{
            $id = $request->get('id');
            $lost = Lost::findOrFail(id);
            $lost->found_data = time();
            $lost->save();
        }catch(Excepetion $e){

        }
    }
}
