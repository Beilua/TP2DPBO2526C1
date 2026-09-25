<?php

require_once __DIR__ . '/Film.php';

// class to represent a cinema film inheriting from Film class
class CinemaFilm extends Film
{
    // private attributes
    private $distributor;
    private $ageRating;
    private $baseTicketPrice;

    // empty constructor
    public function __construct($filmCode = '', $title = '', $genre = '', $duration = 0, $averageRating = 0.0, $distributor = '', $ageRating = '', $baseTicketPrice = 0, $image = '')
    {
        parent::__construct($filmCode, $title, $genre, $duration, $averageRating, $image);
        $this->distributor = $distributor;
        $this->ageRating = $ageRating;
        $this->baseTicketPrice = $baseTicketPrice;
    }

    // distributor getter and setter
    public function getDistributor()
    {
        return $this->distributor;
    }

    public function setDistributor($distributor)
    {
        $this->distributor = $distributor;
    }

    // ageRating getter and setter
    public function getAgeRating()
    {
        return $this->ageRating;
    }

    public function setAgeRating($ageRating)
    {
        $this->ageRating = $ageRating;
    }

    // baseTicketPrice getter and setter
    public function getBaseTicketPrice()
    {
        return $this->baseTicketPrice;
    }

    public function setBaseTicketPrice($baseTicketPrice)
    {
        $this->baseTicketPrice = $baseTicketPrice;
    }

    // destructor
    public function __destruct()
    {
    }
}