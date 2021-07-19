@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <form method="POST" action="/users/{{ $user->id }}">
                @csrf
                @method('PUT')
                @if(Session::has('message'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header"><strong>{{ __('Editar Usuário') }}: </strong>
                                <small>{{ $user->name }}</small><br>
                                <small>Campos com asterísco * são obrigatórios.</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome</label><small><b> *</b></small>
                                        <input class="form-control" type="text" placeholder="{{ __('Nome') }}" maxlength="255"
                                               name="name" id="name" value="{{ $user->name }}" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="datanasc">Data de Nascimento</label>
                                        <input type="date" class="form-control" name="datanasc" id="datanasc"
                                               value="{{ $user->datanasc }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label><small><b> *</b></small>
                                        <input class="form-control" type="text" name="email" id="email" maxlength="255"
                                               placeholder="email@email.com" required autofocus
                                               value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telefone">Celular</label><small><b> *</b></small>
                                        <input type="tel" class="form-control telefone" name="telefone" id="telefone"
                                               placeholder="00 00000-0000" required autofocus
                                               value="{{ $user->celular }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cpf">CPF</label><small><b> *</b></small>
                                        <input type="text" class="form-control cpf" name="cpf" id="cpf"
                                               placeholder="000.000.000-00" required autofocus value="{{ $user->cpf }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" name="rg" id="rg" maxlength="15"
                                               value="{{ $user->rg }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="sexo_option" for="sexo">Sexo</label>
                                        <select class="form-control" name="sexo_option" id="sexo_option">
                                            @if( $user->sexo == 'mas' )
                                                <option selected value="mas">Masculino</option>
                                                <option value="fem">Feminino</option>
                                            @else
                                                <option value="mas">Masculino</option>
                                                <option selected value="fem">Feminino</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="instrutor_option" for="instrutor_option">Instrutor?</label><small><b> *</b></small>
                                        <select class="form-control" name="instrutor_option" id="instrutor_option"
                                                required autofocus value="{{ $user->flinstrutor }}">
                                            @if( $user->flinstrutor == 'sim' )
                                                <option selected value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            @else
                                                <option value="sim">Sim</option>
                                                <option selected value="nao">Não</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="menuroles_option">Papel de Acesso</label><small><b> *</b></small>
                                        <select class="form-control" name="menuroles_option" id="menuroles_option"
                                                required autofocus value="{{ $user->menuroles }}">
                                            @foreach($roles as $role)
                                                @if($user->menuroles == $role->name)
                                                    <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                                @else
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Senha</label><small><b> *</b></small>
                                        <input type="password" class="form-control" name="password" id="password"
                                               maxlength="255" required autofocus>
                                        <span class="help-block"><small>Mínimo de 6 caracteres.</small></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">Confirmar Senha</label><small><b> *</b></small>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               maxlength="255" id="password_confirmation" required autofocus>
                                    </div>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Salvar') }}</button>
                                <a href="{{ route('admin.usersList') }}"
                                   class="btn btn-block btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header"><strong>Endereço</strong> <small>Usuário</small></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="cep">CEP</label><small><b> *</b></small>
                                        <input type="text" class="form-control cep" name="cep" id="cep"
                                               value="{{ $user->cep }}" placeholder="00000-000" required autofocus>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label for="cidade_option">Cidade</label><small><b> *</b></small>
                                        <select class="form-control" name="cidade_option" id="cidade_option" required autofocus>
                                            <option selected="" value="">Selecione...</option>
                                            @foreach($cidades as $cidade)
                                                @if($user->idcidade == $cidade->idcidade)
                                                    <option selected value="{{ $cidade->idcidade }}">{{ $cidade->nmcidade }}</option>
                                                @else
                                                    <option value="{{ $cidade->idcidade }}">{{ $cidade->nmcidade }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="logradouro">Logradouro</label><small><b> *</b></small>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{ $user->logradouro }}" maxlength="100" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro</label><small><b> *</b></small>
                                    <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $user->bairro }}" maxlength="50" required autofocus>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-8">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento" maxlength="50" {{ $user->complemento }}>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="numero">Número</label><small><b> *</b></small>
                                        <input type="text" class="form-control" name="numero" id="numero" maxlength="5" value="{{ $user->numero }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
