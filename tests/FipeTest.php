<?php

namespace DouglasMaia\Fipe\Tests;

use DouglasMaia\Fipe\Caminhoes;
use DouglasMaia\Fipe\Carros;
use DouglasMaia\Fipe\Motos;
use DouglasMaia\Fipe\Fipe;
use PHPUnit\Framework\TestCase;

class FipeTest extends TestCase
{
    public function testGetMarcas()
    {
        $marcasDeCaminhoes = Caminhoes::getMarcas();
        $marcasDeCarros = Carros::getMarcas();
        $marcasDeMotos = Motos::getMarcas();

        $this->assertEquals(true, is_array($marcasDeCaminhoes));
        $this->assertEquals(true, is_array($marcasDeCarros));
        $this->assertEquals(true, is_array($marcasDeMotos));
    }

    public function testGetModelos()
    {
        $modelos = Motos::getModelos(80);
        $this->assertEquals(true, is_array($modelos));
    }

    public function testGetAnos()
    {
        $anos = Motos::getAnos(80, 3841);
        $this->assertEquals(true, is_array($anos));
    }

    public function testGetAnosInvalido()
    {
        $anos = Motos::getAnos(0, 0);
        $this->assertEquals(false, is_array($anos));
    }

    public function testGetVeiculo()
    {
        $veiculo = Motos::getVeiculo(80, 3841, '2015-1');
        $this->assertEquals(true, is_array($veiculo));
    }

    public function testGetVeiculoInvalido()
    {
        $veiculo = Motos::getVeiculo(0, 0, 0);
        $this->assertEquals(false, is_array($veiculo));
    }

    public function basicUrlIsValid()
    {
        $this->assertEquals('http://fipeapi.appspot.com/api/1/', Fipe::URL);
    }
}