<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de órdenes existentes
                    </div>
                    <div class="panel-body">
                    @if(Session::has('order_message'))
                        <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                    @endif
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Subtotal</th>
                                    <th>Descuento</th>
                                    <th>IVA</th>
                                    <th>Total</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido(s)</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Código Postal</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th colspan="2" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>$ {{$order->subtotal}}</td>
                                        <td>$ {{$order->discount}}</td>
                                        <td>$ {{$order->tax}}</td>
                                        <td>$ {{$order->total}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->zipcode}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td><a href="{{route('admin.ordersdetails', ['order_id'=>$order->id])}}" class="btn btn-info">Detalles</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estado
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}}, 'delivered')">Entregado</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}}, 'canceled')">Cancelado</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>