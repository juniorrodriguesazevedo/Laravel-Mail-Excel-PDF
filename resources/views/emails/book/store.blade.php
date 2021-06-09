@component('mail::message')
# Olá {{ Auth::user()->name }}!

Livro <b>{{ $book->name }}</b> cadastrado com sucesso!

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

@component('mail::button', ['url' => $url])
Clique aqui para vizualizar
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
