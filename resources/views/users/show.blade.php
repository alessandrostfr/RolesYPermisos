@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Usuario ID: {{ $user->id }}
                </div>

                <div class="card-body">
                	<p><strong>Nombre</strong><br>{{ $user->name }}</p>
                	<p><strong>Email</strong><br>{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection