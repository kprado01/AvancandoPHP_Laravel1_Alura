<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" autofocus value="">
            </div>
            <div class="col-2">
                <label for="seasonQty" class="form-label">Nº Temporadas:</label>
                <input type="text" id="seasonQty" name="seasonQty" class="form-control" value="">
            </div>
            <div class="col-2">
                <label for="episodesQty" class="form-label">Nº Episodios:</label>
                <input type="text" id="episodesQty" name="episodesQty" class="form-control" value="">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
