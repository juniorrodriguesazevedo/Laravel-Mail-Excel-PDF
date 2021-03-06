@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
                      </ol>
                    </nav>
                  </div>
                </div>

                <div class="card-body">
                  @include('includes.alerts')

                  <div class="container">
                    <div class="row">
                      <div class="col-md">
                        <form action="{{ route('book.search') }}" method="post" class="form-inline">
                          @csrf
                          <input type="text" name="filter" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                          <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </form>
                      </div>
                      <div class="col-md-7">
                        <a href="{{ route('book.create') }}" class="btn btn-primary">Cadastrar</a>
                        <a href="{{ route('book.export.excel') }}" class="btn btn-success">Baixar Excel</a>
                        <a href="{{ route('book.export.pdf') }}" target="_blank" class="btn btn-success">Baixar PDF</a>
                      </div>
                    </div>
                  </div>

                  <br>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Autor</th>
                            <th scope="col" width="140px">Data Lançamento</th>
                            <th scope="col" width="150px">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $book->id }}</th>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ date('d/m/Y', strtotime($book->date)) }}</td>
                                <td>
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Editar</a>
                                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-success">Ver</a>
                                </td>
                            </tr>
                          @endforeach  
                        </tbody>
                      </table>
                </div>

                <div>
                  @if (isset($filters))
                    {{ $books->appends($filters)->links() }}
                  @else
                    {{ $books->links() }}
                  @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
