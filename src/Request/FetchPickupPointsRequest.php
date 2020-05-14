<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\Request;

use Answear\PocztaPolskaBundle\DTO\PickupPoint;
use Answear\PocztaPolskaBundle\Factory\PickupPointFactory;
use Answear\PocztaPolskaBundle\Service\ConfigProvider;
use ZipArchive;

class FetchPickupPointsRequest
{
    private const ZIP_URL = 'https://odbiorwpunkcie.poczta-polska.pl/pliki.php?t=xmlK48S';
    private const ZIP_LOCAL_FILENAME = 'poczta-polska-pickup-points.zip';

    /**
     * @var ConfigProvider
     */
    private $configProvider;
    /**
     * @var PickupPointFactory
     */
    private $pickupPointFactory;

    public function __construct(ConfigProvider $configProvider, PickupPointFactory $pickupPointFactory)
    {
        $this->configProvider = $configProvider;
        $this->pickupPointFactory = $pickupPointFactory;
    }

    /**
     * @return PickupPoint[]
     */
    public function request(): array
    {
        $zipPath = $this->downloadZip();

        $xmlPath = $this->extractFile($zipPath);

        return $this->pickupPointFactory->createArrayFromXml($xmlPath);
    }

    private function downloadZip(): string
    {
        $zipFilePath = $this->configProvider->getTempDir() . self::ZIP_LOCAL_FILENAME;
        file_put_contents($zipFilePath, fopen(self::ZIP_URL, 'b'));

        return $zipFilePath;
    }

    private function extractFile(string $zipFilePath): string
    {
        $zipFile = new ZipArchive();
        $zipFile->open($zipFilePath);
        $xmlFilename = $this->configProvider->getTempDir() . '/' . $zipFile->getNameIndex(0);

        $zipFile->extractTo($this->configProvider->getTempDir());
        unlink($zipFilePath);

        return $xmlFilename;
    }
}
