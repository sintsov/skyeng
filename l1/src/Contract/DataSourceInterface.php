<?php
declare(strict_types=1);

namespace src\Contract;

/**
 * Interface DataSourceInterface
 * @package src\Contract
 */
interface DataSourceInterface
{
    /**
     * @param array $request
     * @return array
     */
    public function get(array $request): array;
}