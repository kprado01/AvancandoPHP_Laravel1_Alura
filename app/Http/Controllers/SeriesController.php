<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::query()->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function edit(Series $series)
    {
        return view('series.update')->with('series', $series);
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());
        $seasons = [];
        for ($i=1; $i <= $request->seasonQty;  $i++) {

            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }

        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesQty; $j++) {
                $episodes[]=[
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }

        Episode::insert($episodes);

        $request->session()->flash('mensagem.sucesso', "Series '{$serie->nome}' adicionada com sucesso!");
        return to_route('series.index');
    }

    public function destroy(Request $request, Series $series)
    {
        $series->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Series '{$series->nome}' excluida com sucesso!");
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $nomeAntigo = $series->nome;
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Series '{$nomeAntigo}' editada para '{$series->nome}' com sucesso!");
    }
}
