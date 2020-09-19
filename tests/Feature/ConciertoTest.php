<?php

namespace Tests\Feature;

use App\Models\Concierto;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConciertoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/concierto');

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $response = $this->post('/concierto');

        $response->assertStatus(302);
    }

    public function testFailDataConcert()
    {
        $this->expectException(QueryException::class);
        $concierto = new Concierto();

        $concierto->id_promotor = 'pacos';
        $concierto->id_recinto = 'a';
        $concierto->nombre = 'pacos';
        $concierto->fecha = new \DateTime();
        $concierto->numero_espectadores = 200;
        $concierto->rentabilidad = 15.09;

        $concierto->save();
    }

    public function testSuccessDataConcert()
    {
        $concierto = new Concierto();

        $concierto->id_promotor = 1;
        $concierto->id_recinto = 1;
        $concierto->nombre = 'pacos';
        $concierto->fecha = new \DateTime();
        $concierto->numero_espectadores = 200;
        $concierto->rentabilidad = 15.09;

        $concierto->save();

        $this->assertIsInt($concierto->id);
    }


}
