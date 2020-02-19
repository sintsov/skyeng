<?php
declare(strict_types=1);

namespace src\Decorator;

use src\Contract\DataProviderInterface;
use Psr\Cache\CacheItemPoolInterface;
use DateTime;

/**
 * Class CachingProvider
 * @package src\Decorator
 */
class CachingProvider implements  DataProviderInterface
{

    /**
     * @var DataProviderInterface
     */
    private $provider;

    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * LoggingProvider constructor.
     * @param DataProviderInterface $provider
     * @param CacheItemPoolInterface $cache
     */
    public function __construct(DataProviderInterface $provider, CacheItemPoolInterface $cache)
    {
        $this->provider = $provider;
        $this->cache = $cache;
    }

    /**
     * @inheritDoc
     */
    public function getResponse(array $input): array
    {
        $cacheKey = $this->getCacheKey($input);
        $cacheItem = $this->cache->getItem($cacheKey);
        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        $result = $this->provider->getResponse($input);

        $cacheItem
            ->set($result)
            ->expiresAt(
                (new DateTime())->modify('+1 day')
            );

        return $result;
    }

    /**
     * улучшить ключ без контекста задачи к сожалению сложно, поэтому оставляю его в исходном состояние
     *
     * @param array $input
     * @return string
     */
    public function getCacheKey(array $input): string
    {
        return json_encode($input);
    }
}