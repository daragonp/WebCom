<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">TODAS LAS CATEGORÍAS</div
                        <div class="col-md-6">
                            <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Crear nueva categoría</a>
                        </div
                    </div>
                </div>
                <div class="panel-body">
                @if (Session::has('message'))
                    <div class="aler alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de categoría</th>
                                <th>Slug</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{route('admin.editcategory', ['category_slug'=>$category->slug])}}"><i  class="fa fa-edit fa-2x"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px;"><i  class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>