<?php
declare(strict_types=1);

namespace src;

use src\Contract\DataSourceInterface;

/**
 * Class AlibabaDataSource
 * @package src
 */
class AlibabaDataSource implements DataSourceInterface
{
    private $host;
    private $user;
    private $password;

    /**
     * AlibabaDataSource constructor.
     * @param $host
     * @param $user
     * @param $password
     */
    public function __construct($host, $user, $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function get(array $request): array
    {
        // returns a response from external service
    }
}