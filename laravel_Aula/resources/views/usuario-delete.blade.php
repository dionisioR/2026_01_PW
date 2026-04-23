@extends('template.main_template')
@section('content')

<div class="p-5">
    <h1 class="text-danger mb-3">
        <i class="bi bi-exclamation-triangle"></i>
        Delete
    </h1>
    <hr>
    <p class="h3">
        Tem certeza que deseja deletar este usuário? <br>
        <span class="text-warning">
            {{ $usuario->usu_nome }} - 
            {{ $usuario->usu_email }}
        </span>
    </p>

    <p class="h5">
        Esta ação é irreversível. 
    </p>

    <a href="{{route('usuario-lista')}}" class="btn btn-secondary me-3">Cancelar</a>
    
    <a href="{{route('usuario-delete-submit', ['id' => Crypt::encrypt($usuario->usu_id)])}}" class="btn btn-danger">Deletar usuário</a>
        
</div>
@endsection