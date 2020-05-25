@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Role ID: {{ $role->id }}
                </div>

                <div class="card-body">
                	<p><strong>Nombre</strong><br>{{ $role->name }}</p>
                	<p><strong>Slug</strong><br>{{ $role->slug }}</p>
                	<p><strong>Descripcion</strong><br>{{ $role->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection