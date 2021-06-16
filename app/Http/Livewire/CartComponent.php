<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $discount;
    public $subtotal_;
    public $tax_;
    public $total_;

    public function aumentar($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty+1;
        Cart::instance('cart')->update($rowId, $qty );
    }

    public function disminuir($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty  = $product->qty-1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function borrar($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Se ha eliminado el elemento');
    }

    public function borrarTodo(){
        Cart::instance('cart')->destroy();
    }

    public function descuento(){
        $this->subtotal_=Cart::instance('cart')->subtotal() - $this->discount;
        $this->tax_=($this->subtotal_*config('cart.tax'))/100;
        $this->total_=$this->subtotal_+$this->tax_;
    }
    
    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function cuenta(){
        session()->put('checkout',[
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total()
        ]);
    }

    public function render()
    {
        $this->cuenta();
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
