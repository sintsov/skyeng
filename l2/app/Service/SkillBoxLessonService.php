<?php
declare(strict_types=1);

namespace App\Service;

use App\Contract\LessonProviderInterface;
use App\Provider\SkillBoxLessonProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * Class SkillBoxLessonService
 * @package App\Service
 */
class SkillBoxLessonService
{
    /**
     * @var LessonProviderInterface
     */
    private $provider;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SkillBoxLessonService constructor.
     * @param LessonProviderInterface $provider
     * @param CacheInterface $cache
     * @param LoggerInterface $logger
     */
    public function __construct(LessonProviderInterface $provider, CacheInterface $cache, LoggerInterface $logger)
    {
        $this->provider = $provider;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        try {
            return $this->cache->get($request->get('catId'), function () use ($request) {
                return (new SkillBoxLessonProvider())->getResponse($request);
            });
        } catch (\Exception $e) {
            $this->logger->info($e->getMessage());
            return new Response([
                "message" => $e->getMessage()
            ], 400);
        }
    }

}