<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Order;
use Auth;

class FrontendController extends Controller
{
    public function home($value='')
    {
        $items = DB::table('items')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('items.*', 'categories.name as cname')
            ->limit(10)
            ->get();
        $discounts = DB::table('items')
            ->where('discount','>',0)
            ->limit(10)
            ->get();
        $categories = Category::orderBy('id','asc')->limit(6)->get();
        return view('frontend.home', ['categories' => $categories,'items' => $items,'discounts' => $discounts]);
    }
    public function about($value='')
    {
    	return view('frontend.about');
    }
    public function cart($value='')
    {
    	return view('frontend.cart');
    }
    public function contact($value='')
    {
    	return view('frontend.contact');
    }
     public function detail($id)
    {
        $categories=Category::all();
        $related_items=Item::all();
        $item=Item::find($id);
        return view('frontend.detail',compact('item','related_items','categories'));
    }

     public function success($value='')
    {
     
        return view('frontend.ordersuccess');
    }
     public function history($value='')
    {
    
    $orders = Order::select("*")->where('user_id',Auth::id())->orderByDesc('orderdate')->get();
    return view('frontend.orderhistory',compact('orders'));
    }

     public function orderdetail($id)
    {
        $orders=Order::find($id);
        return view('frontend.orderdetail',compact('orders'));
    }

     public function allitem($value='')
    {
        
        $items=Item::orderBy('created_at','desc')->limit(12)->get();
        return view('frontend.allitem',compact('items'));
    }

     public function itemcategory($id)
    {
        
        $category=Category::find($id);
        return view('frontend.itemcategory',compact('category'));
    }
}
