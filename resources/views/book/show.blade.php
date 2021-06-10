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
                            <li class="breadcrumb-item"><a href="{{ route('book.show', $book->id) }}">Ver</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('book.show', $book->id) }}">{{ $book->name }}</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    <ul>
                        <li>
                            <b>Nome: </b> {{ $book->name }}
                        </li>
                        <li>
                            <b>Autor: </b> {{ $book->author }}
                        </li>
                        <li>
                            <b>Data de Publicação: </b> {{ date('d/m/Y', strtotime($book->date)) }}
                        </li>
                    </ul>

                    {!!Form::open()->method('delete')->route('book.destroy', [$book->id])!!}
                        {!!Form::submit("Deleta <b>$book->name</b>", "danger")!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
