<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Usuários - User Manager</title>
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

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">

                    <div class="card-header">
                        <h4>Add Usuários
                            <a href="{{ url('usuarios') }}" class="btn btn-primary float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('usuarios/create') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" />
                                @error('nome')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cpf">CPF</label>
                                <input type="number" name="cpf" class="form-control" value="{{ old('cpf') }}"
                                    maxlength="11" minlength="11" />
                                @error('cpf')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="data_nascimento">Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control"
                                    value="{{ old('data_nascimento') }}" />
                                @error('data_nascimento')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefone">Telefone</label>
                                <input type="number" name="telefone" class="form-control"
                                    value="{{ old('telefone') }}" />
                                @error('telefone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cep">CEP</label>
                                <input type="number" name="cep" id="cep" class="form-control"
                                    value="{{ old('cep') }}" maxlength="8" minlength="8" />
                                @error('cep')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control"
                                    value="{{ old('estado') }}" />
                                @error('estado')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" class="form-control"
                                    value="{{ old('cidade') }}" />
                                @error('cidade')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control"
                                    value="{{ old('bairro') }}" />
                                @error('bairro')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="endereco">Endereco</label>
                                <input type="text" name="endereco" id="endereco" class="form-control"
                                    value="{{ old('endereco') }}" />
                                @error('endereco')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const cepInput = document.querySelector("#cep");
        const enderecoInput = document.querySelector("#endereco");
        const cidadeInput = document.querySelector("#cidade");
        const bairroInput = document.querySelector("#bairro");
        const estadoInput = document.querySelector("#estado");

        // Validate CEP Input
        cepInput.addEventListener("keypress", (e) => {
            const onlyNumbers = /[0-9]|\./;
            const key = String.fromCharCode(e.keyCode);

            console.log(key);

            console.log(onlyNumbers.test(key));

            // permitindo apenas numeros
            if (!onlyNumbers.test(key)) {
                e.preventDefault();
                return;
            }
        });

        // Evento pra pegar endereço
        cepInput.addEventListener("keyup", (e) => {
            const inputValue = e.target.value;

            //   Checa se temos um cep
            if (inputValue.length === 8) {
                getAddress(inputValue);
            }
        });

        // Consome a API
        const getAddress = async (cep) => {

            cepInput.blur();

            const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

            const response = await fetch(apiUrl);

            const data = await response.json();

            if (data.erro) {
                enderecoInput.value = "";
                cidadeInput.value = "";
                bairroInput.value = "";
                estadoInput.value = "";

                alert("CEP Inválido!")
            }

            if (!data.erro) {
                enderecoInput.value = data.logradouro;
                cidadeInput.value = data.localidade;
                bairroInput.value = data.bairro;
                estadoInput.value = data.uf;
            }
        };
    </script>

</body>

</html>
