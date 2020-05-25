@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Productos

                    @can('products.create')
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>

                    @endcan

                </div>

                <div class="card-body">
                    
                    <table class="table table-striped table-hover">
                        
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td width="10px">
                                    
                                        @can('products.show')
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-light btn-sm float-right">Ver</a>

                                        @endcan

                                    </td>
                                    <td width="10px">
                                    
                                        @can('products.edit')
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm float-right">Editar</a>

                                        @endcan
                                        
                                    </td>
                                    <td width="10px">
                                    
                                        @can('products.destroy')
                                        {!! Form::open(['route' => ['products.destroy', $product->id],
                                        'method' => 'DELETE'])!!}

                                            <button class="btn btn-sm btn-danger">Eliminar</button>

                                        {!! Form::close() !!}
                                        @endcan
                                        
                                    </td>
                                    
                                </tr>

                            @endforeach
                        </tbody>

                    </table>

                    <center>
                    <div>
                        {{ $products->render()}} 
                    </div>
                    </center>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
