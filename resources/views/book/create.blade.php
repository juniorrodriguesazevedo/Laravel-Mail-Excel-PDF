@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('book.create') }}">Cadastrar</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    {!!Form::open()->route('book.store')!!}
                        @include('book._form')
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
