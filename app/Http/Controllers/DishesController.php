<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('Kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Kitchen.dish_create',compact('categories'));
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
            "name"=>"required",
            "category"=>"required",
            "dish_image"=>"required|image",
        ]);

        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category;
        if($request->dish_image){
            $imageName = uniqid().".".request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'),$imageName);
            $dish->image = $imageName;
        }

        $dish->save();
        return redirect('dish')->with('message','Dish created successfully');


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
        $dish = Dish::findorFail($id);
        $categories = Category::all();
        return view('Kitchen.dish_edit',compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required",
            "category"=>"required",
        ]);
        $dish = Dish::findorFail($id);
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        if($request->dish_image){
            $imageName = uniqid().".".request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'),$imageName);
            $dish->image = $imageName;
        }

        $dish->update();

        return redirect('dish')->with('message','Dish updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findorFail($id);
        $dish->delete();
        return redirect('dish')->with('message','Dish removed successfully');
    }

    public function order(){
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        $orders = Order::whereIn('status',[1,2])->get();
        return view('Kitchen.order',compact('orders','status'));
    }
    public function approve($id){
        $order = Order::findorFail($id);
        $order->status = config('res.order_status.processing');
        $order->save();

        return redirect('order')->with('message','Order Approved');
    }
    public function cancel($id){
        $order = Order::findorFail($id);
        $order->status = config('res.order_status.cancel');
        $order->save();

        return redirect('order')->with('message','Order Canceled');
    }
    public function ready($id){
        $order = Order::findorFail($id);
        $order->status = config('res.order_status.ready');
        $order->save();

        return redirect('order')->with('message','Order Ready');
    }
}
