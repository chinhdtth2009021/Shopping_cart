<?php

namespace App\Http\Controllers;

use App\Models\Shopping_cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('.shopping.form');
    }


    public function store(Request $request)
    {
        $store = new Shopping_cart();
        $store->fill($request->all());
        $store->save();
        return redirect('/list');
    }

    public function show(Shopping_cart $shopping_cart)
    {
        //
    }
    public function list(){
        $list = Shopping_cart::all();
        return view('.shopping.list',[
            'list' => $list
        ]);
    }


    public function edit(Shopping_cart $shopping_cart, $id)
    {
//        $edit = Shopping_cart::find($id);
//        return view('.shopping.edit',[
//            'edit' => $edit
//        ]);
    }


    public function update(Request $request, Shopping_cart $shopping_cart, $id)
    {
//        $update = Shopping_cart::find($id);
//        $update->update($request->all());
//        $update->save();
//        return redirect('/list');
    }


    public function destroy(Shopping_cart $shopping_cart, $id)
    {
//        $delete = Shopping_cart::find($id);
//        $delete->delete();
//        return redirect('/list');
    }
}
