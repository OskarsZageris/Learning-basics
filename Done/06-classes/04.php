<?php

//Exercise #4
//The class Movie is started below. An instance of class Movie represents a film.
// This class has the following three class variables:
//
//title, which is a string representing the title of the movie
//studio, which is a string representing the studio that made the movie
//rating, which is a string representing the rating of the movie (i.e. PG­13, R, etc)
//Write a constructor for the class Movie, which takes the title of the movie, studio, and rating as its arguments,
// and sets the respective class variables to these values.
//Write a method GetPG, which takes an array of base type Movie as its argument, and returns a new array of only
// those movies in the input array with a rating of "PG". You may assume the input array is full of Movie instances.
// The returned array may be empty.
//Write a piece of code that creates an instance of the class Movie:
//with the title “Casino Royale”, the studio “Eon Productions” and the rating “PG­13”;
//with the title “Glass”, the studio “Buena Vista International” and the rating “PG­13”;
//with the title “Spider-Man: Into the Spider-Verse”, the studio “Columbia Pictures” and the rating “PG”.



class Movie{
    public string $title;
    public string $studio;
    public string $rating;
    public array $listOfMovies=[];
    public function __construct(string $title,string $studio, string $rating)
    {
        $this->title=$title;
        $this->studio=$studio;
        $this->rating=$rating;
        $this->listOfMovies[]="$title, $studio, $rating";
    }
    public function getPG(){
        if(strpos($this->rating, "PG") !== false){
            return true;
        }else{
            return false;
        }
    }
}
$movies[]= new Movie("Casino Royale","Eon Productions", "PG13");
$movies[]= new Movie("Glass","Buena Vista Internationa", "PG13");
$movies[]= new Movie("Spider-Man","Columbia Pictures", "gg");
foreach ($movies as $movie){
    if($movie->getPG()){
        echo $movie->title." ".$movie->title." ".$movie->rating.PHP_EOL;
    }
}

