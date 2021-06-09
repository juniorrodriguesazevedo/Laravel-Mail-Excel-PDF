@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>Você não tem permissão para acessa essa página</h2>
                    <img src="{{ asset('img/access-denied.png') }}" alt="Você não tem permissão para acessa essa página" width="400px">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
