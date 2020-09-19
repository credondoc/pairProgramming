<?php

namespace App\Http\Controllers;

use App\Models\Concierto;
use App\Models\Grupo;
use App\Models\Recinto;
use App\traits\GruposTrait;
use App\traits\MediosTrait;
use App\traits\PromotoresTrait;
use App\traits\RecintosTrait;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ConciertoController extends Controller
{

    use RecintosTrait;
    use GruposTrait;
    use PromotoresTrait;
    use MediosTrait;

    public function show()
    {

        $recintos = $this->getPlaces();
        $grupos = $this->getGroups();
        $medios = $this->getadvertising();
        $promotores = $this->getSponsor();

        return view('pages.concierto', compact('recintos', 'grupos', 'medios', 'promotores'));
    }

    public function create(Request $request)
    {
        try {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'place' => 'required',
            'groups' => 'required',
            'spectators' => 'required|integer',
            'sponsor' => 'required',
            'advertising' => 'required'
        ]);

        $concierto = new Concierto();

        $concierto->id_promotor = $request->post('sponsor');
        $concierto->id_recinto = $request->post('place');
        $concierto->nombre = $request->post('name');
        $concierto->fecha = $request->post('date');
        $concierto->numero_espectadores = $request->post('spectators');
        $concierto->rentabilidad = $this->rentabilidad($request);

        $concierto->saveOrFail();

        foreach ($request->post('groups') as $group) {
            \DB::table('grupos_conciertos')->insert([
                'id_grupo' => intval($group),
                'id_concierto' => $concierto->id
            ]);
        }

        foreach ($request->post('advertising') as $medio) {
            \DB::table('medios_conciertos')->insert([
                'id_medio' => intval($medio),
                'id_concierto' => $concierto->id
            ]);
        }

        return redirect('concierto')->with('status', ['status' => 'success', 'message' => 'Cocierto creado correctamente!']);

        } catch (\Exception $e) {
            return redirect('concierto')->with('status', [
                'status' => 'danger',
                'message' => 'Error al crear el concieto',
                'sponsor' => $request->post('sponsor'),
                'place' => $request->post('place'),
                'name' => $request->post('name'),
                'date' => $request->post('date'),
                'spectators' => $request->post('spectators'),
                'groups' => $request->post('groups'),
                'advertising' => $request->post('advertising'),
            ]);
        }
    }

    private function rentabilidad(Request $request): int
    {
        $grupos = $request->post('groups');

        $cache = 0;

        // Calculamos el cache de los grupos
        foreach ($grupos as $grupo) {
            $group = Grupo::findOrFail($grupo);
            $cache = $cache + $group->cache;
        }

        // Calculamos el 10 de una entrada que es lo que perdemos
        $place = Recinto::findOrFail($request->post('place'));

        $entrada = $place->precio_entrada;
        $entrada = $place->precio_entrada-($place->precio_entrada*0.1);

        $dineroEntradas = $entrada*(intval($request->spectators));

        $retabilidad = $dineroEntradas - $cache - intval($place->coste_alquiler);
        return floatval($retabilidad);
    }

}
