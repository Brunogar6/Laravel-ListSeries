<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $series = Serie::all();

        $menssagemSucesso = session('menssagem.sucesso');

        return view('series.index')->with('series', $series)->with('menssagemSucesso', $menssagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);

        return to_route('series.index')->with('menssagem.sucesso', "Série {$serie->nome} adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')->with('menssagem.sucesso', "Série {$series->nome} removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('menssagem.sucesso', "Série {$series->nome} atualizada com sucesso");
    }
}
