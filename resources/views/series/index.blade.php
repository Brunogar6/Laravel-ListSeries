<x-layout title="Series" :mensagem-sucesso="$mensagemSucesso" >

    @auth
        <div class="text-center">
            <a href="/series/create" class="btn btn-dark mb-3">Add</a>
        </div>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('storage/' . $serie->cover) }}" width="100" class="img-thumbnail me-3" alt="">
                @auth <a class="btn btn-outline-dark" href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{ $serie->nome }}
                @auth </a> @endauth
            </div>
            
            @auth
            <span class="d-flex">
                <a href=" {{ route('series.edit', $serie->id) }} " class="btn btn-primary btn-sm">
                    E
                </a>
                <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
            @endauth
        </li>
        @endforeach
    </ul>

</x-layout>
