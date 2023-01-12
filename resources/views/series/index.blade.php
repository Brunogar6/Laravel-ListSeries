<x-layout title="Series" :mensagem-sucesso="$mensagemSucesso" >

    @auth
        <a href="/series/create" class="btn btn-dark mb-2">Add</a>
    @endauth



    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth <a class="btn btn-outline-dark" href="{{ route('seasons.index', $serie->id) }}"> @endauth
                {{ $serie->nome }}
            @auth </a> @endauth

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
