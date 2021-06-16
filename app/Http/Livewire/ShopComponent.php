<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $clasificacion;
    public $tpagina;
    
    public function mount(){
        $this->clasificacion = "default";
        $this->tpagina = 10;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item añadido en el carrito');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if ($this->clasificacion=='date'){
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->tpagina);
        }
        else if($this->clasificacion=='price'){
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->tpagina);
        }
        else if($this->clasificacion=='price-desc'){
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->tpagina);
        }
        else{
            $products = Product::paginate($this->tpagina);            
        }

        $categories = Category::all();
        return view('livewire.shop-component', ['products'=>$products, 'categories'=>$categories])->layout("layouts.base");
    }
}
