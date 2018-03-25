@extends('template.template')
@section('content')

            <div class="content">
                <div class="title m-b-md">
                    Bem vindo!
                <div>
                <div>
                    <a href="#{{$usuario->cdUsuario}}">
                        <img src="{{ asset($usuario->imgUsuario) }}" width="150px" height="150px">
                    </a>
                </div>
                <div style="font-size: 25px">
                    {{ $usuario->nmUsuario }}
                </div>
                <div style="font-size: 25px">{{ $usuario->nmTipo }}</div>
                <div style="font-size: 25px">{{ $usuario->cdCep }}</div>
            </div>        
                </div>
                <div class="links">
                    <a href="/cadastrar">Cadastrar Doador</a>
                    <a href="/galeria">Galeria</a>
                    <form method="post" action="/logout">
                        {{csrf_field()}}
                        <button type="submit" name="logout">Sair</button>
                    </form>
                </div>
            </div>
        </div>

@endsection