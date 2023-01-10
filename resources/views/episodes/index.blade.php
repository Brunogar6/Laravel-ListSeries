<x-layout title="Episodes" :mensagem-sucesso="$mensagemSucesso">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        Episode {{ $episode->number }}

                        <span class="badge bg-dark">@if($episode->watched) Watched @endif</span>
                    </div>

                    <input type="checkbox"
                           name="episodes[]"
                           value="{{ $episode->id }}"
                           @if ($episode->watched) checked @endif />
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2">Save</button>
    </form>
</x-layout>
