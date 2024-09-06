<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - User Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">User Manager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">By Bruno Brasil Weiber</a>
                </div>
            </div>
        </nav>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="com-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Usuários
                            <a href="{{ url('usuarios/export') }}" class="btn btn-secondary float-end">Exportar
                                Usuários</a>
                            <a href="{{ url('usuarios/create') }}" class="btn btn-primary float-end">Add Usuários</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Nascimento</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>CEP</th>
                                    <th>Estado</th>
                                    <th>Cidade</th>
                                    <th>Bairro</th>
                                    <th>Endereço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->cpf }}</td>
                                        <td>{{ $item->data_nascimento }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ $item->cep }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td>{{ $item->cidade }}</td>
                                        <td>{{ $item->bairro }}</td>
                                        <td>{{ $item->endereco }}</td>
                                        <td>
                                            <a href="{{ url('usuarios/' . $item->id . '/edit') }}"
                                                class="btn btn-success mx-2">Editar</a>
                                            <a href="{{ url('usuarios/' . $item->id . '/delete') }}"
                                                onclick="return confirm('Está certo disso?')"
                                                class="btn btn-danger mx-2">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
