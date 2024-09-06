<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Usuários - User Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <h2>Tabela de Usuários Simplificada</h2>
    <h4>Data: {{ $dataAtual }}</h4>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>CEP</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            <hr>
            @foreach ($usuarios as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->cep }}</td>
                    <td>{{ $item->estado }}</td>
                    <td>{{ $item->cidade }}</td>
                    <td>{{ $item->bairro }}</td>
                    <td>{{ $item->endereco }}</td>
                </tr>
                <hr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
