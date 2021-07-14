@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Adicionar Usuário</div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('admin.userStore') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <svg class="c-icon c-icon-sm">
                                          <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                      </svg>
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Nome') }}" name="name" required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('E-mail') }}" name="email" required>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Salvar') }}</button>
                                <a href="{{ route('admin.usersList') }}" class="btn btn-block btn-primary">{{ __('Voltar') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
