@extends('layout-store')

@section('title', 'Detalle de la compra')

@section('content')

    <section class="title-basic-section" xmlns="http://www.w3.org/1999/html">
        <article>
            <h3>
                Detalle de la orden
                <a href="{{ route('cliente.carrito.index') }}" class="btn btn-sm btn-border-yellow right">Volver al carrito</a>
            </h3>

        </article>
    </section>

    <section class="container-products">
        <article>

            @if( count($cart) === 0)
                <div>No hay Items</div>
            @else
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td width="120px"><img src="{{ asset('/media/photo-items/' . $item->img_name) }}" width="100"/></td>
                            <td style="text-align: left">
                                <ul style="list-style: none; padding: 0">
                                    <li class="cd-link">{{ $item->name }}</li>
                                    <li>${{ $item->price  . ' -' . $item->offert . '%'}}</li>
                                </ul>
                            </td>
                            <td>${{ number_format($item->final_price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->final_price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h3>Total</h3></td>
                            <td><h3>${{ number_format($total, 2) }}</h3></td>
                        </tr>
                </tbody>
            </table>
            @endif

        </article>
    </section>

    @if($pago == 1)
        <!-- TARJETA DE CREDITO -->
        {!! Form::open(['route' => ['payment.card', 1], 'method' => 'POST', 'id' => 'form-order-card-new']) !!}
    @endif

    @if($pago == 2)
        <!-- PAYPAL -->
        {!! Form::open(['route' => ['payment', 2], 'method' => 'GET', 'id' => 'form-oder-paypal-new']) !!}
        {!! Form::hidden('card', 1) !!}
    @endif

    <section class="form-basic-section">
        <article>

            <div class="row col-sm-6">
                <div class="col-sm-12">
                    <div class="form-group line-bottom">
                        <label for="unknow">Información del contacto</label>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="disabledTextInput">Nombre y apellido</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Nombre y Apellido" value="{{ $userContacto[0]->name . ' ' . $userContacto[0]->paterno . ' ' . $userContacto[0]->materno }}" required="required">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="disabledTextInput">Fecha de nacimiento</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Compañia" value="{{ $userContacto[0]->fecha_na  }}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="disabledTextInput">Correo</label>
                        <input type="text" name="mail_user" id="disabledTextInput" class="form-control" placeholder="Correo" value="{{ Auth::user()->email }}" required="required">
                    </div>
                </div>
            </div>

            <div class="row col-sm-6">
                <div class="col-sm-12">
                    <div class="form-group line-bottom">
                        <label for="unknow">Dirección</label>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="pais">País</label><br/>
                        <select name="pais" id="pais" required="required">
                            <option value="México">México</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="dir">Dirección</label>
                        <input type="text" name="dir" id="dir" class="form-control" placeholder="Dirección" required="required">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="disabledTextInput">Ciudad</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Ciudad" value="México" required="required">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="stateOrProvince">Estado</label>
                        <select id="stateOrProvince" name="stateOrProvince" class="form-control" required="required" aria-required="true">
                            <option value="AGS">Aguascalientes</option>
                            <option value="BC">Baja California</option>
                            <option value="BCS">Baja California Sur</option>
                            <option value="CAMP">Campeche</option>
                            <option value="CHIS">Chiapas</option>
                            <option value="CHIH">Chihuahua</option>
                            <option value="COAH">Coahuila</option>
                            <option value="COL">Colima</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="DGO">Durango</option>
                            <option value="MEX">Estado de México</option>
                            <option value="GTO">Guanajuato</option>
                            <option value="GRO">Guerrero</option>
                            <option value="HGO">Hidalgo</option>
                            <option value="JAL">Jalisco</option>
                            <option value="MICH">Michoacán</option>
                            <option value="MOR">Morelos</option>
                            <option value="NAY">Nayarit</option>
                            <option value="NL">Nuevo León</option>
                            <option value="OAX">Oaxaca</option>
                            <option value="PUE">Puebla</option>
                            <option value="QRO">Querétaro</option>
                            <option value="Q ROO">Quintana Roo</option>
                            <option value="SLP">San Luis Potosí</option>
                            <option value="SIN">Sinaloa</option>
                            <option value="SON">Sonora</option>
                            <option value="TAB">Tabasco</option>
                            <option value="TAMPS">Tamaulipas</option>
                            <option value="TLAX">Tlaxcala</option>
                            <option value="VER">Veracruz</option>
                            <option value="YUC">Yucatán</option>
                            <option value="ZAC">Zacatecas</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="cp">Código Postal</label>
                        <input type="number" id="cp" name="cp" class="form-control" placeholder="06060" required="required">
                    </div>
                </div>
            </div>
        </article>
    </section>

    @if($pago == 1)
    <section class="form-basic-section">
        <article>
            <div class="row col-sm-6">
                <div class="col-sm-12">
                    <div class="form-group line-bottom">
                        <label for="unknow">Detalle de la targeta de crédito o débito</label>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default active">
                                <input type="radio" name="card" id="card1" value="3" autocomplete="off" checked> Débito
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="card" id="card2" value="2" autocomplete="off"> Crédito
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="numCard">Número de la tarjeta</label>
                        {!! Form::number('numCard', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <img src="{{ asset('/media/icon/card-icon.png') }}">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="month">Fecha de vencimiento de la tarjeta</label><br>
                        {!! Form::selectRange('month', 01, 12, ['required' => 'required']) !!} /
                        {!! Form::selectRange('number', 2016, 2040, ['required' => 'required']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="lastNum">Número de validación</label>
                        {!! Form::number('lastNum', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>

            </div>
        </article>
    </section>
    @endif

    <section class="container-products">
        <article>
            @if($pago == 1)
                {!! Form::submit('Pagar con Tarjeta de crédito', ['class' => 'btn btn-default']) !!}
            @endif

            @if($pago == 2)
                {!! Form::submit('Pagar con Paypal', ['class' => 'btn']) !!}
            @endif
        </article>
    </section>

    {!! Form::close() !!}

@endsection


@section('modals')

@endsection

@section('extra-js')
@endsection