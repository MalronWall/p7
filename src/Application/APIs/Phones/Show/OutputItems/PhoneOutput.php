<?php

namespace App\Application\APIs\Phones\Show\OutputItems;

use App\Application\APIs\Helpers\Hateoas\Link;
use App\Application\APIs\Interfaces\OutputItemInterface;
use App\Domain\Models\Interfaces\PhoneInterface;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Uuid;

class PhoneOutput implements PhoneInterface, OutputItemInterface
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $os;

    /**
     * @var Collection
     */
    private $memories;

    /**
     * @var int
     */
    private $ram;

    /**
     * @var int
     */
    private $battery;

    /**
     * @var string
     */
    private $sim;

    /**
     * @var int
     */
    private $screenResolutionH;

    /**
     * @var int
     */
    private $screenResolutionW;

    /**
     * @var float
     */
    private $screen;

    /**
     * @var int
     */
    private $cameraFront;

    /**
     * @var int
     */
    private $cameraBack;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $g4;

    /**
     * @var bool
     */
    private $g5;

    /**
     * @var bool
     */
    private $wifi;

    /**
     * @var bool
     */
    private $removableBattery;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var int
     */
    private $thickness;

    /**
     * @var Link[]|array
     */
    private $links;

    /**
     * PhoneOutput constructor.
     *
     * @param PhoneInterface $phone
     * @param Link[]|array $links
     */
    public function __construct(
        PhoneInterface $phone,
        array $links
    ) {
        $this->id = $phone->getId();
        $this->brand = $phone->getBrand();
        $this->os = $phone->getOs();
        $this->memories = $phone->getMemories();
        $this->ram = $phone->getRam();
        $this->battery = $phone->getBattery();
        $this->sim = $phone->getSim();
        $this->screenResolutionH = $phone->getScreenResolutionH();
        $this->screenResolutionW = $phone->getScreenResolutionW();
        $this->screen = $phone->getScreen();
        $this->cameraFront = $phone->getCameraFront();
        $this->cameraBack = $phone->getCameraBack();
        $this->name = $phone->getName();
        $this->g4 = $phone->hasG4();
        $this->g5 = $phone->hasG5();
        $this->wifi = $phone->hasWifi();
        $this->removableBattery = $phone->hasRemovableBattery();
        $this->width = $phone->getWidth();
        $this->height = $phone->getHeight();
        $this->weight = $phone->getWeight();
        $this->thickness = $phone->getThickness();
        $this->links = $links;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getOs(): string
    {
        return $this->os;
    }

    /**
     * @return Collection
     */
    public function getMemories(): Collection
    {
        return $this->memories;
    }

    /**
     * @return int
     */
    public function getRam(): int
    {
        return $this->ram;
    }

    /**
     * @return int
     */
    public function getBattery(): int
    {
        return $this->battery;
    }

    /**
     * @return string
     */
    public function getSim(): string
    {
        return $this->sim;
    }

    /**
     * @return int
     */
    public function getScreenResolutionH(): int
    {
        return $this->screenResolutionH;
    }

    /**
     * @return int
     */
    public function getScreenResolutionW(): int
    {
        return $this->screenResolutionW;
    }

    /**
     * @return float
     */
    public function getScreen(): float
    {
        return $this->screen;
    }

    /**
     * @return int
     */
    public function getCameraFront(): int
    {
        return $this->cameraFront;
    }

    /**
     * @return int
     */
    public function getCameraBack(): int
    {
        return $this->cameraBack;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasG4(): bool
    {
        return $this->g4;
    }

    /**
     * @return bool
     */
    public function hasG5(): bool
    {
        return $this->g5;
    }

    /**
     * @return bool
     */
    public function hasWifi(): bool
    {
        return $this->wifi;
    }

    /**
     * @return bool
     */
    public function hasRemovableBattery(): bool
    {
        return $this->removableBattery;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return int
     */
    public function getThickness(): int
    {
        return $this->thickness;
    }

    /**
     * @return Link[]|array
     */
    public function getLinks(): array
    {
        return $this->links;
    }
}