<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status){
        $order = Order::find($order_id);
        $order->status=$status;
        if($status=="delivered"){
            $order->delivered_date=DB::raw('CURRENT_DATE');
        }
        else if($status=="canceled"){
            $order->canceled_date=DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','La orden ha sido actualizada');
    }
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-order-component', ['orders'=>$orders])->layout('layouts.base');
    }
}
