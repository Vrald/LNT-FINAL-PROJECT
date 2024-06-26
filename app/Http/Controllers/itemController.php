<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class itemController extends Controller
{
    public function createItem(){
        return view('createItem',[
            'title' => 'Create Item',
            'categories' => Category::all()
        ]);
    }
    public function storeItem(Request $request){
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|min:5|max:80|',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required|mimes:jpg,png',
            'description' => 'required|min:20'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->name . "." . $extension;
        $request->file('image')->storeAs('public/item_images', $filename);
        
        Item::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename,
            'description' => $request->description
        ]);
        return redirect('/');
    }

    public function index(){
        $items = Item::all();
        return view('myitems',[
            'title' => "Browse Items",
            'items' => $items
        ]);
    }

    public function showItem(Item $item){
        return view('showItem', [
            'title' => 'Show Item',
            'item' => $item,
        ]);   
    }

    public function delete(Item $item){
        $item->delete();
        return redirect('/myitems');
    }

    public function edit(Item $item){
        return view('editItem',[
            'title' => 'Editing Item',
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    public function update (Item $item, Request $request){
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|min:5|max:80|',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required|min:20'
        ]);

        $item->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description
        ]);
        return redirect('/myitems');
    }
}
