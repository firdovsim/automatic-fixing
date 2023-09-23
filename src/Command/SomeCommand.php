<?php

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpKernel\UriSigner;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[AsCommand(
    name: 'command:run',
    description: 'Add a short description for your command',
)]
class SomeCommand extends Command
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly UriSigner $signer,
        #[Autowire(service: 'monolog.logger.request')]
        private readonly LoggerInterface $logger
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $documentUrl = $this->urlGenerator->generate('app_document', [], UrlGeneratorInterface::ABSOLUTE_URL);

            $signedUrl = $this->signer->sign($documentUrl);
            $isValidUrl = $this->signer->check($signedUrl);

            $io->info("Document Signed URL: $signedUrl");
            $io->info("Document URL is Valid: $isValidUrl");

            $this->logger->info('Again!');
            $io->success($documentUrl);
        } catch (RouteNotFoundException) {
            $io->error('Route not found');
        }

        return Command::SUCCESS;
    }
}
