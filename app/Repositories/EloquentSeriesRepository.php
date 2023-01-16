<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements  SeriesRepository
{
    public function add(SeriesFormRequest $request) : Serie
    {
        return DB::transaction(function () use ($request) {
            $serie = Serie::create([
                'nome' => $request->nome,
                'cover' => $request->coverPath,
            ]);
            $seasons=[];

            for($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = ([
                    'number' => $i,
                    'series_id' => $serie->id,
                ]);
            }

            Season::insert($seasons);

            foreach ($serie->temporadas as $season) {
                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] = ([
                        'number' => $j,
                        'season_id' => $season->id,
                    ]);
                }
            }
            Episode::insert($episodes);

            return $serie;
        });
    }
}
