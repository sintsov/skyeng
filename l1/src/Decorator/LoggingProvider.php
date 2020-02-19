<?php
declare(strict_types=1);

namespace src\Decorator;

use src\Contract\DataProviderInterface;
use Exception;
use Psr\Log\LoggerInterface;

/**
 * Class LoggingProvider
 * @package src\Decorator
 */
class LoggingProvider implements  DataProviderInterface
{

    /**
     * @var DataProviderInterface
     */
    private $provider;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * LoggingProvider constructor.
     * @param DataProviderInterface $provider
     * @param LoggerInterface $logger
     */
    public function __construct(DataProviderInterface $provider, LoggerInterface $logger)
    {
        $this->provider = $provider;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getResponse(array $input): array
    {
        try {
            return $this->provider->getResponse($input);
        } catch (Exception $e) {
            $this->logger->critical('Error: ' . $e->getMessage());
            throw $e;
        }
    }
}