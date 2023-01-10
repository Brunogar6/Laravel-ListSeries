<x-layout title="New Season">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Name:</label>
                <input type="text"
                    autofocus
                    id="nome"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº Seasons:</label>
                <input type="text"
                    id="seasonsQty"
                    name="seasonsQty"
                    class="form-control"
                    value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Seasons:</label>
                <input type="text"
                    id="episodesPerSeason"
                    name="episodesPerSeason"
                    class="form-control"
                    value="{{ old('episodesPerSeason') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</x-layout>
