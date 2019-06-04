<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::All();
        return view('items.index',['categories'=>$categories]);
        // return $categories;

    }
    public function apiIndex(){
        $id_user = Auth::id();
        $items = Item::where('id_user', $id_user)->orderBy('id', 'desc')->get();
        
        $data = [];
        $number = 1;
        foreach ($items as $key) {
            # code...
            $data[] = [
                'number' => $key->id,
                'nama' => $key->item_name,
                'code' => $key->custom_input,
                'photo' => $key->photo,
                'action' => '<a class="btn btn-outline-success btn-sm btn-edit" data-toggle="modal" style="border-radius:24px" data-target="#myModal">Edit/Show</a><a class="btn btn-outline-warning btn-sm btn-found" style="border-radius:24px">Hilang!</a><a class="btn btn-outline-danger btn-sm btn-destroy" style="border-radius:24px">Hapus</a>'
            ];
        }

        return response()->json($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $new_item = new Item();
            $new_item->item_name = $request->get('nama');
            $new_item->custom_input = $request->get('custom_input');
            $new_item->id_user = Auth::id();
            if ($request->file('avatar')) {             
                $file = $request->file('avatar')->store('avatars','public');
                $new_item->photo = $file;         
            }      
            $new_item->save();
            $new_item->category()->attach($request->get('id_category'));
            $message = [
                'status' => 200,
                'message' => 'data berhasil disimpan',
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 500,
                'message' => 'data gagal disimpan',
            ];
        }

        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $data = $request->all();
            // Item::create($data);
            $update_item = Item::findOrFail($request->get('id'));
            $update_item->item_name = $request->get('nama');
            $update_item->custom_input = $request->get('custom_input');
            if ($request->file('avatar')) {             
                $file = $request->file('avatar')->store('avatars','public');
                $update_item->photo = $file;         
            }
            $update_item->save();
            $update_item->category()->sync($request->get('id_category'));
            $message = [
                'status' => 200,
                'message' => 'data berhasil disimpan',
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 500,
                'message' => 'data gagal disimpan',
            ];
        }
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            
            $item = Item::findOrFail($request->get('id'));
            $item->delete();
            $message = [
                'status' => 200,
                'message' => 'data berhasil dihapus',
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 500,
                'message' => 'data gagal dihapus',
            ];
        }
        return response()->json($message);
    }
}
