<?php
require_once "VideoStore.php";
require_once "Video.php";


class Application
{
    private VideoStore $videoStore;

    public function __construct(VideoStore $videoStore)
    {
        $this->videoStore = $videoStore;
    }

    public function run()
    {
        while (true) {
            echo "Choose the operation you want to perform".PHP_EOL;
            echo "Choose 0 for EXIT".PHP_EOL;
            echo "Choose 1 to fill video store".PHP_EOL;
            echo "Choose 2 to rent video (as user)".PHP_EOL;
            echo "Choose 3 to return video (as user)".PHP_EOL;
            echo "Choose 4 to list inventory".PHP_EOL;
            echo "Choose 5 to rate a movie".PHP_EOL;

            $option = (int)readline();

            switch ($option) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $movie = new Video(readline("Movie title: "));
                    $this->videoStore->add($movie);
                    break;
                case 2:
                    $movieTitle = readline("Movie title to rent: ");
                    $this->videoStore->rent($movieTitle);
                    break;
                case 3:
                    $movieTitle = readline("Movie title to return: ");
                    $this->videoStore->return($movieTitle);
                    break;
                case 4:
                    echo "Available movies:" .PHP_EOL;
                    echo $this->videoStore->listInventory().PHP_EOL;
                    break;
                case 5:
                    $movieTitle = readline("Movie title to rate: ");
                    $rating = (int)readline("Rating: ");
                    $this->videoStore->rate($rating, $movieTitle);
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }
}
$app = new Application(new VideoStore([
    new Video("One"),
    new Video("Two"),
    new Video("Three")
]));
$app->run();


