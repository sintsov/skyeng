<?php
declare(strict_types=1);

namespace src\Provider;

use src\Contract\DataProviderInterface;
use src\Contract\DataSourceInterface;

/**
 * Class AlibabaProvider
 * @package src\Provider
 */
class AlibabaProvider implements DataProviderInterface
{

    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * AlibabaProvider constructor.
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse(array $input): array
    {
        return $this->dataSource->get($input);
    }
}