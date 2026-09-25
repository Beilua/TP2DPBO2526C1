<?php

// class to represent a film
class Film
{
    // private attributes
    private $filmCode;
    private $title;
    private $genre;
    private $duration;
    private $averageRating;
    private $image = '';

    // empty constructor
    public function __construct($filmCode = '', $title = '', $genre = '', $duration = 0, $averageRating = 0.0, $image = '')
    {
        $this->filmCode = $filmCode;
        $this->title = $title;
        $this->genre = $genre;
        $this->duration = $duration;
        $this->averageRating = $averageRating;
        $this->image = $image;
    }

    // filmCode getter and setter
    public function getFilmCode()
    {
        return $this->filmCode;
    }

    public function setFilmCode($filmCode)
    {
        $this->filmCode = $filmCode;
    }

    // title getter and setter
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    // genre getter and setter
    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    // duration getter and setter
    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    // averageRating getter and setter
    public function getAverageRating()
    {
        return $this->averageRating;
    }

    public function setAverageRating($averageRating)
    {
        $this->averageRating = $averageRating;
    }

    // image getter and setter
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    // destructor
    public function __destruct()
    {
    }
}