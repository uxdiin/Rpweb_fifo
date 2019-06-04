<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notification;
use App\Item;
class NotificationController extends Controller
{
    public function index(){
        return view('Notifications.notification');
    }
    public function apiIndex(){
        $id = Auth::id();
        $notifications = Notification::where('id_penerima',$id)->orderBy('id','desc')->get();
        $data=[];
        foreach($notifications as $notification){
            $item = DB::select("select * from items join notifications on (items.id=notifications.id_item) where items.id='$notification->id_item'");
            $pengirim = DB::select("select * from users join notifications on (users.id=notifications.id_pengirim) where users.id='$notification->id_pengirim'");
            $id_peng=$pengirim[0]->id;
            // $route = "/user/{".$id_peng."}/about";
            $data[] = [
                'pengirim'=>'<a href="/users/user/'.$pengirim[0]->id_pengirim.'/about">'.$pengirim[0]->name.'</a>',
                'item_name'=>$item[0]->item_name,
                'item_photo'=>$item[0]->photo,
                'message'=>'Barang anda telah ditemukan ',
                ''
                // 'pegirim'=>$notification->id_pengirim,
            ];
        }
        // $count = DB::select("select * from notifications where id_penerima='$id'");
        return response()->json($data);  
    }
    public function checkNotifications(){
        $id = Auth::id();
        $count = DB::select("select count(id) as count from notifications where id_penerima='$id'");
        return response()->json($count);  
    }
    
}
