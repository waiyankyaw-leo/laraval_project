<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Brand;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = DB::table('items')
            ->join('brands', 'brands.id', '=', 'items.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->select('items.*', 'brands.name as bname','subcategories.name as sname')
            ->get();
        return view('backend.items.index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $subcategories = Subcategory::all();
         $brands = Brand::all();
        return view('backend.items.create',compact('subcategories'),compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3",
            "photo" => "required|mimes:jpg,jpeg,bmp,png"
        ]);

        // upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }

        // store
        $item = new Item;
        $item->name = $request->name;
        $item->photo = $path;
        $item->codeno = $request->code;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brandid;
        $item->subcategory_id = $request->subcategoryid;
        $item->save();

        // return
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('backend.items.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('backend.items.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
