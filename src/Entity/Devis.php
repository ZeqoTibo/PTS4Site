<?php


namespace App\Entity;


class Devis
{

    /**
     * @var etape
     */
    private $etape;


    /**
     * Devis constructor.
     * @param $etape
     */
    public function __construct ($etape){
        $this->etape = $etape;
    }

    /**
     * @return etape
     */
    public function getEtape(){
        return $this->etape;
    }

}