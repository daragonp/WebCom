<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'La categoría ha sido borrada');
    }

    public function render()
    {
        $categories = Category::paginate(20);
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
