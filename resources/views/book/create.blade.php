@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    mexe aqui depois
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
