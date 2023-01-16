<x-layout title="Seasons of {{ $series->nome }}">
    <div class="d-flex justify-content-center mb-4">
        <img src="{{ asset('storage/' . $series->cover) }}"
        style="height:400px" 
        alt="Capa da série" 
        class="img-fluid">
    </div>
   
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="btn btn-outline-dark" href="{{ route('episodes.index', $season->id) }}">
                    Season {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                  {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count()}}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
