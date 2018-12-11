<?php

use App\Game;
use App\Genre;
use App\Platform;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    protected $platforms = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Load all the platforms for mapping
        $platforms = Platform::all();

        foreach ($platforms as $platform) {
            $this->platforms[substr($platform->name, 0, 1)] = $platform->id;
        }

        // Maps Chris' SQL data to a seeder
        $games = file_get_contents(database_path('games.txt'));
        $games = explode("\n", $games);

        foreach ($games as $game) {
            // Skip empty lines
            if (! trim($game))
                continue;

            $fields = explode("\t", $game);
            $game = Game::create([
                'name' => array_get($fields, '0'),
                'price' => array_get($fields, '1'),
                'score' => array_get($fields, '2'),
                'votes' => 20,
                'publisher' => array_get($fields, '3'),
                'genre_id' => $this->mapGenre(array_get($fields, '5')),
                'image_url' => array_get($fields, '6'),
                'description' => array_get($fields, '7'),
            ]);

            $platforms = array_get($fields, '4');

            /** @var Game $game */
            $game->platforms()->sync($this->mapPlatforms($platforms));

            // Load the images from the store page
            $this->scrapeImages($game, array_get($fields, '8'));
        }
    }

    public function scrapeImages(Game $game, $url)
    {
        if (! $url)
            return;

        echo "Extracting images from $url...";
        /** @var \Symfony\Component\DomCrawler\Crawler $crawler */
        $crawler = Goutte::request('GET', $url);
        $cookie = new \Symfony\Component\BrowserKit\Cookie(
            'birthtime',
            189331201,
            null
        );
        Goutte::getCookieJar()->set($cookie);

        // Check for age restriction on this game
        if ($crawler->filter('#app_agegate')->count() > 0) {
            echo 'Age Restriction Found' ."\n";
            $ageUrl = str_replace('agecheck', 'agecheckset', $crawler->getUri());
            $sid = Goutte::getCookieJar()
                ->get('sessionid')
                ->getValue();

            echo 'Attempting to bypass for session '. $sid .'...';

            $crawler = Goutte::request('POST', $ageUrl, [
                'session' => $sid,
                'ageDay' => '13',
                'ageMonth' => '11',
                'ageYear' => '1991',
            ]);

            // Retry
            $crawler = Goutte::request('GET', $url);
        }

        $images = $crawler->filter('.highlight_screenshot_link')
            ->extract('href');

        echo 'Found ' . count($images) . "\n";

        // Add a fallback
        if (count($images) <= 0) {
            $images = ['http://placehold.it/480x270&text=Age+Restriction+Placeholder'];
        }

        foreach ($images as $image) {
            $game->images()->create([
                'url' => $image,
            ]);
        }
    }

    /**
     * Maps platform from letters to names.
     * Fist character should match Chris' data.
     *
     * @param $string
     * @return array
     */
    public function mapPlatforms($string)
    {
        $mapped = [];

        foreach (str_split($string) as $platform) {
            if ($value = array_get($this->platforms, $platform)) {
                $mapped[] = $value;
            }
        }

        return $mapped;
    }

    /**
     * Maps genre from the name to an ID
     *
     * @param $name
     * @return mixed
     */
    public function mapGenre($name)
    {
        $genre = Genre::where('name', $name)
            ->firstOrFail();

        return $genre->id;
    }
}
