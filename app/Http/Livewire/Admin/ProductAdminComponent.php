<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductAdminComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'El producto ha sido eliminado');
    }

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.product-admin-component', ['products'=>$products])->layout('layouts.base');;
    }
}
