<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' =>session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        foreach ($season->episodes as $episode){
            $list[] = $episode->id;
        }

        $result = $list;

        if (is_null($request->episodes) === false) {
            Episode::whereIn('id', $request->episodes)->update(['watched' => 1]);
            $result = array_diff($list, $request->episodes);
        }

        Episode::whereIn('id', $result) -> update(['watched' => 0] );

        return to_route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episódios marcados como assistidos');
    }
}
