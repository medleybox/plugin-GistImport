<?php

namespace MedleyBox\Plugins\GistImport\Service;

use Xigen\Bundle\GuzzleBundle\Service\GuzzleClient;
use Exception;

class Github
{
    /**
     * @var \Xigen\Bundle\GuzzleBundle\Service\GuzzleClient
     */
    private $client;

    private $content = [];

    private $gist;

    public function __construct(GuzzleClient $client, string $gist)
    {
        $this->client = $client;
        $this->gist = $gist;
    }

    public function scrape()
    {
        $this->fetchGist();
        $this->checkForImports();
    }

    private function fetchGist()
    {
        $response = $this->client->request(
            'GET',
            "https://gist.githubusercontent.com/{$this->gist}/raw/import.txt"
        );

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Unable to fetch gist');
        }

        dump($response, $response->getBody());
        exit();

        return true;
    }

    private function checkForImports()
    {

    }
}