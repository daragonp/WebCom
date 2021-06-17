<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Productos de la orden
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.orders')}}" class="btn btn-success pull-right">Ver órdenes</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach($order->orderItems as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->image}}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price">{{$item->price}}</p></div>
                                        <div class="quantity">
                                            <h5>{{$item->quantity}}</h5>
                                        </div>
                                        <div class="price-field total"><p class="price">{{$item->price * $item->quantity}}</p></div>
                                    </li>
                                @endforeach												
                            </ul>	 
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Detalles de la cuenta</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">IVA</span><b class="index">${{$order->tax}}</b></p>
                                <p class="summary-info"><span class="title">Envío</span><b class="index">Envío gratis</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">${{$order->total}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de facturación
                    </div>
                    <div class="panel-body">
                        <table class="table table-light">
                            <tr>
                                <th>Nombre completo</th>
                                <td>{{$order->firstname}}</td>
                                <th>Apellidos</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Correo electrónico</th>
                                <td>{{$order->email}}</td>
                                <th>Celular</th>
                                <td>{{$order->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{$order->line1}}</td>
                                <th>Line 2</th>
                                <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                                <th>Ciudad</th>
                                <td>{{$order->city}}</td>
                                <th>Provincia</th>
                                <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                                <th>País</th>
                                <td>{{$order->country}}</td>
                                <th>Código postal</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($order->is_shipping_different)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos de envío
                        </div>
                        <div class="panel-body">
                            <table class="table table-light">
                                <tr>
                                    <th>Nombre completo</th>
                                    <td>{{$order->shipping->firstname}}</td>
                                    <th>Apellidos</th>
                                    <td>{{$order->shipping->lastname}}</td>
                                </tr>
                                <tr>
                                    <th>Correo electrónico</th>
                                    <td>{{$order->shipping->email}}</td>
                                    <th>Celular</th>
                                    <td>{{$order->shipping->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>{{$order->shipping->line1}}</td>
                                    <th>Line 2</th>
                                    <td>{{$order->shipping->line2}}</td>
                                </tr>
                                <tr>
                                    <th>Ciudad</th>
                                    <td>{{$order->shipping->city}}</td>
                                    <th>Provincia</th>
                                    <td>{{$order->shipping->province}}</td>
                                </tr>
                                <tr>
                                    <th>País</th>
                                    <td>{{$order->shipping->country}}</td>
                                    <th>Código postal</th>
                                    <td>{{$order->shipping->zipcode}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalles de transacción
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Tipo de transacción</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>