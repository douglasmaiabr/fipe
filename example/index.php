<?php

require_once '../vendor/autoload.php';

use DouglasMaia\Fipe\Carros;
use DouglasMaia\Fipe\Caminhoes;
use DouglasMaia\Fipe\Motos;

// Carros [Marcas]
$marcasCarros = Carros::getMarcas();
print_r($marcasCarros);

// Carros [Modelos]
$modelosCarros = Carros::getModelos(3);
print_r($modelosCarros);

// Carros [Anos]
$anosCarros = Carros::getAnos(3, 17);
print_r($anosCarros);

// Carros [Detalhes]
$detalhesCarro = Carros::getVeiculo(3,17,'1195-1');
print_r($detalhesCarro);