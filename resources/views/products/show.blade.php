@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>

                <div class="card-body">
                	<p><strong>Nombre</strong><br>{{ $product->name }}</p>
                	<p><strong>Descripcion</strong><br>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection