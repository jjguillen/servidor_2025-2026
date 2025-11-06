<?php

namespace Agrotech\MiApp;

class Finca
{

    public static $cooperativa = "Troops";

    public $identificador;
    public $nombre;
    protected $tipoCultivo;
    protected $geolocalizacion;


    public function __construct(String $id, String $nombre, $tipoC, $geo = "lat-lon")
    {
        $this->identificador = $id;
        $this->nombre = self::$cooperativa . "_" . $nombre;
        $this->tipoCultivo = $tipoC;
        $this->geolocalizacion = $geo;
    }


    public function getIdentificador()
    {
        return $this->identificador;
    }

    public function setIdentificador($id)
    {
        $this->identificador = $id;
    }


    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }



    /**
     * Get the value of tipoCultivo
     */
    public function getTipoCultivo()
    {
        return $this->tipoCultivo;
    }

    /**
     * Set the value of tipoCultivo
     *
     * @return  self
     */
    public function setTipoCultivo($tipoCultivo)
    {
        $this->tipoCultivo = $tipoCultivo;

        return $this;
    }



    /**
     * Get the value of geolocalizacion
     */
    public function getGeolocalizacion()
    {
        return $this->geolocalizacion;
    }

    /**
     * Set the value of geolocalizacion
     *
     * @return  self
     */
    public function setGeolocalizacion($geolocalizacion)
    {
        $this->geolocalizacion = $geolocalizacion;

        return $this;
    }

    final public function regar()
    {
        echo "Estoy regando ... <br>";
    }

    public function __toString()
    {
        return "Finca: " . $this->identificador . " - " . $this->nombre . " - Tipo Cultivo: " . $this->tipoCultivo . " - Geo: " . $this->geolocalizacion . "<br>";
    }
}
