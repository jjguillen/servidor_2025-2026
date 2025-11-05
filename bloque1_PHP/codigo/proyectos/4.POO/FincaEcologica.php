<?php

class FincaEcologica extends Finca
{


    private $identEcologico;

    public function __construct(String $id, String $nombre, $tipoC, $identEcologico, $geo = "lat-lon")
    {
        parent::__construct($id, $nombre, $tipoC, $geo);
        $this->identEcologico = $identEcologico;
    }



    /**
     * Get the value of identEcologico
     */
    public function getIdentEcologico()
    {
        return $this->identEcologico;
    }

    /**
     * Set the value of identEcologico
     *
     * @return  self
     */
    public function setIdentEcologico($identEcologico)
    {
        $this->identEcologico = $identEcologico;

        return $this;
    }
}
