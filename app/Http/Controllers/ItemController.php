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
        $items = Item::orderBy('id','desc')->get();
        return view('backend.items.index',compact('items'));
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
        // dd($request);
        // $request->validate([
        //     "name" => "required|min:3",
        //     "photo" => "required|mimes:jpg,jpeg,bmp,png"
        // ]);

        // upload
        if($request->file()) {
            $images = [];
            foreach ($request->photos as $photo) {
                
            // 624872374523_a.jpg
            $fileName = time().'_'.$photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $photo->storeAs('itemimg', $fileName, 'public');

            $path = '/storage/'.$filePath;

            array_push($images, $path);
            }

            $json_image=json_encode($images,JSON_PRETTY_PRINT);

            // var_dump($json_image);
        }

        // store
        $item = new Item;
        $item->name = $request->name;
        $item->photo = $json_image;
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
        return view('backend.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('backend.items.edit',compact('item'),['brands' => $brands,'subcategories' => $subcategories]);
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


         $request->validate([
            "name" => "required|min:3",
            "photo" => "sometimes|mimes:jpg,jpeg,bmp,png",
            "oldphoto" => "required"
        ]);

        // upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('brandimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto;
        }

        // update
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
       $item->delete();
       return redirect()->route('items.index');
    }
}
