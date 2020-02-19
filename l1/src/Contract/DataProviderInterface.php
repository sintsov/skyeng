<?php
declare(strict_types=1);

namespace src\Contract;

/**
 * Interface ServiceProviderInterface
 * @package src\Contract
 */
interface DataProviderInterface
{
    /**
     * @param array $input
     * @return mixed
     */
    public function getResponse(array $input): array;
}