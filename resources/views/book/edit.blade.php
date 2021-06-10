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
                            <li class="breadcrumb-item"><a href="{{ route('book.edit', $book->id) }}">Editar</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('book.show', $book->id) }}">{{ $book->name }}</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    {!!Form::open()->method('put')->route('book.update', [$book->id])->fill($book)!!}
                        @include('book._form')
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
