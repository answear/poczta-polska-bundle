<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\Service;

class ConfigProvider
{
    /**
     * @var string
     */
    private $tempDir;

    public function __construct(string $tempDir)
    {
        $this->tempDir = $tempDir;
    }

    public function getTempDir(): string
    {
        return $this->tempDir;
    }
}
