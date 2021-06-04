<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $clasificacion;
    public $tpagina;
    public $search;
    public $product_cat;
    public $product_cat_id;
    
    public function mount(){
        $this->clasificacion = "default";
        $this->tpagina = 10;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item añadido en el carrito');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if ($this->clasificacion=='date'){
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like','%'.$this->product_cat_id.'%')->orderBy('created_at', 'DESC')->paginate($this->tpagina);
        }
        else if($this->clasificacion=='price'){
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like','%'.$this->product_cat_id.'%')->orderBy('regular_price', 'ASC')->paginate($this->tpagina);
        }
        else if($this->clasificacion=='price-desc'){
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like','%'.$this->product_cat_id.'%')->orderBy('regular_price', 'DESC')->paginate($this->tpagina);
        }
        else{
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like','%'.$this->product_cat_id.'%')->paginate($this->tpagina);            
        }

        $categories = Category::all();
        return view('livewire.search-component', ['products'=>$products, 'categories'=>$categories])->layout("layouts.base");
    }
}
