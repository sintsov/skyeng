<?php
declare(strict_types=1);

namespace App\Contract;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface LessionInterface
 * @package App\Contract
 */
interface LessonProviderInterface
{
    public function getResponse(Request $request): Response;
}