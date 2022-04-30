<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tables = Table::all();
        $dishes = Dish::all();
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        $orders = Order::where('status',[4])->get();
        return view('orderform',compact('dishes','tables','orders','status'));
    }
    public function submit(Request $request){
        $data =  array_filter($request->except('_token','table'));
        //$request->table = (int)$request->table;
        $orderId = rand();
        foreach ($data as $key=>$value){
            if($value > 1){
                for ($i=0;$i<$value;$i++){
                    $this->saveOrder($orderId,$key,$request);

                }
            }else{
                $this->saveOrder($orderId,$key,$request);
            }
        }
        return redirect('/')->with('message','Order Submited');
    }
    public function saveOrder( $orderId,$dish_id,$request){

        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status= config('res.order_status.new');
        $order->save();
    }
    public function serve($id){
        $order = Order::findorFail($id);
        $order->status = config('res.order_status.done');
        $order->save();

        return redirect('/')->with('message','Order Serve');
    }
}
