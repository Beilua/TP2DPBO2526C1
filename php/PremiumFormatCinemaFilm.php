<?php

require_once __DIR__ . '/CinemaFilm.php';

// class to represent a premium format cinema film inheriting from CinemaFilm class
class PremiumFormatCinemaFilm extends CinemaFilm
{
    // private attributes
    private $screenFormat;
    private $priceSurcharge;
    private $requires3DGlasses;

    // empty constructor
    public function __construct($filmCode = '', $title = '', $genre = '', $duration = 0, $averageRating = 0.0, $distributor = '', $ageRating = '', $baseTicketPrice = 0, $screenFormat = '', $priceSurcharge = 0, $requires3DGlasses = false, $image = '')
    {
        parent::__construct($filmCode, $title, $genre, $duration, $averageRating, $distributor, $ageRating, $baseTicketPrice, $image);
        $this->screenFormat = $screenFormat;
        $this->priceSurcharge = $priceSurcharge;
        $this->requires3DGlasses = $requires3DGlasses;
    }

    // screenFormat getter and setter
    public function getScreenFormat()
    {
        return $this->screenFormat;
    }

    public function setScreenFormat($screenFormat)
    {
        $this->screenFormat = $screenFormat;
    }

    // priceSurcharge getter and setter
    public function getPriceSurcharge()
    {
        return $this->priceSurcharge;
    }

    public function setPriceSurcharge($priceSurcharge)
    {
        $this->priceSurcharge = $priceSurcharge;
    }

    // requires3DGlasses getter and setter
    public function getRequires3DGlasses()
    {
        return $this->requires3DGlasses;
    }

    public function setRequires3DGlasses($requires3DGlasses)
    {
        $this->requires3DGlasses = $requires3DGlasses;
    }

    // destructor
    public function __destruct()
    {
    }
}