<?php
declare(strict_types=1);

namespace App\Http\Middleware;

/**
 * Class ResponseFormatter
 * @package App\Http\Middleware
 */
class ResponseFormatter implements Middleware
{
    /**
     * This is middleware not need, use for example
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $acceptHeader = $request->headers->get('Accept'); // 'application/json' or 'application/xml'
        $request->headers->set('Accept', $acceptHeader ?? 'application/json');

        return $next($request);
    }
}