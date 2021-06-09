<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <main>
        <h2 class="title">Livraria Laravel</h2>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Autor</th>
                <th scope="col">Data de publicação</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                  <td>{{ $book->id }}</td>
                  <td>{{ $book->name }}</td>
                  <td>{{ $book->author }}</td>
                  <td>{{ date('d/m/Y', strtotime($book->date)) }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </main>

    <style>
        .title {
            border: 1px;
            width: 100%;
            background-color: #c2c2c2;
            text-align: center;
            font-weight: bold;
        }

        .table th {
            text-align: left;
        }
    </style>
</body>
</html>