<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    
    public function aumentar($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty+1;
        Cart::update($rowId, $qty );
    }

    public function disminuir($rowId){
        $product = Cart::get($rowId);
        $qty  = $product->qty-1;
        Cart::update($rowId, $qty);
    }

    public function borrar($rowId){
        Cart::remove($rowId);
        session()->flash('success_message', 'Se ha eliminado el elemento');
    }

    public function borrarTodo(){
        Cart::destroy();
    }


    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
