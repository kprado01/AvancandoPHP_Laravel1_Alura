<x-layout title="Séries">

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
    <a href="{{route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center ">
                <a href="{{route('seasons.index', $serie)}}">{{ $serie->nome }}</a>

                <span class="d-flex">
                    <a href="{{route('series.edit', $serie)}}" class="btn btn-info">Editar</a>
                    <form action="{{route('series.destroy', $serie->id)}}" method="post" class="ms-3">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </span>
            </li>

        @endforeach


    </ul>
</x-layout>
