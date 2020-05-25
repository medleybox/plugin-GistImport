<?php

namespace MedleyBox\Plugins\GistImport\Command;

use MedleyBox\Plugins\GistImport\Service\Github;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputArgument, InputInterface};
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GistImportCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'medleybox:gist-import';

    /**
     * @var \App\Service\Github
     */
    private $service;

    public function __construct(Github $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Import URLS into medleybox from a Github Gist');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        dump('Here!');
        $this->service->scrape();

        return 0;
    }
}
