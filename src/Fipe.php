<?php

namespace DouglasMaia\Fipe;

abstract class Fipe
{
    const URL = 'http://fipeapi.appspot.com/api/1/';

    /**
     * @var
     */
    protected static $tipo;

    /**
     * @var array
     */
    private static $defaultCurlOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_SSL_VERIFYPEER => 0,
    ];

    /**
     * @param string $uri
     *
     * @return mixed|false
     */
    protected static function request($uri)
    {
        $ch = curl_init($uri);
        curl_setopt_array($ch, self::$defaultCurlOptions);
        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($responseCode >= 200 && $responseCode <= 300) ? json_decode($response, true) : false;
    }

    /**
     * @return bool|false|mixed
     */
    public static function getMarcas()
    {
        $uri = self::URL.static::$tipo.'/marcas.json';

        return self::request($uri);
    }

    /**
     * @param $codMarca
     * @return bool|false|mixed
     */
    public static function getModelos($codMarca)
    {
        $uri = self::URL.static::$tipo.'/veiculos/'.$codMarca. '.json';

        return self::request($uri);
    }

    /**
     * @param $codMarca
     * @param $codModelo
     * @return bool|false|mixed
     */
    public static function getAnos($codMarca, $codModelo)
    {
        $uri = self::URL.static::$tipo.'/veiculo/'.$codMarca .'/'.$codModelo. '.json';

        return self::request($uri);
    }

    /**
     * @param $codMarca
     * @param $codModelo
     * @param $codAno
     * @return bool|false|mixed
     */
    public static function getVeiculo($codMarca, $codModelo, $codAno)
    {
        $uri = self::URL.static::$tipo.'/veiculo/'.$codMarca .'/'.$codModelo. '/'.$codAno.'.json';

        return self::request($uri);
    }


}
