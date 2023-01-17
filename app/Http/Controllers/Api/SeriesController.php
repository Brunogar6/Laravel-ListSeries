<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }
    public function index(Request $request)
    {
        $query = Serie::query();

        if($request->has('nome')) {

            $query->where('nome', $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(SeriesFormRequest $request)
    {
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {
        $seriesModel = Serie::with('temporadas.episodes')->find($series);

        if($seriesModel === null){
            return response()->json(['message' => "Series not found"], 404);
        }
        return $seriesModel;
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;

    }

    public function destroy(int $series, Request $request)
    {
        Serie::destroy($series);

        return response()->noContent();
    }
}
