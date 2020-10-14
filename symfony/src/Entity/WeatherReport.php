<?php

namespace App\Entity;

use App\Repository\WeatherReportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherReportRepository::class)
 */
class WeatherReport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $timezone;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     */
    private $lon;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $date_time;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $sunrise;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $sunset;

    /**
     * @ORM\Column(type="float")
     */
    private $temp;

    /**
     * @ORM\Column(type="float")
     */
    private $real_feel;

    /**
     * @ORM\Column(type="integer")
     */
    private $humidity;

    /**
     * @ORM\Column(type="integer")
     */
    private $clouds;

    /**
     * @ORM\Column(type="float")
     */
    private $winds;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $conditions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getDateTime(): ?string
    {
        return $this->date_time;
    }

    public function setDateTime(string $date_time): self
    {
        $this->date_time = $date_time;

        return $this;
    }

    public function getSunrise(): ?string
    {
        return $this->sunrise;
    }

    public function setSunrise(string $sunrise): self
    {
        $this->sunrise = $sunrise;

        return $this;
    }

    public function getSunset(): ?string
    {
        return $this->sunset;
    }

    public function setSunset(string $sunset): self
    {
        $this->sunset = $sunset;

        return $this;
    }

    public function getTemp(): ?float
    {
        return $this->temp;
    }

    public function setTemp(float $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getRealFeel(): ?float
    {
        return $this->real_feel;
    }

    public function setRealFeel(float $real_feel): self
    {
        $this->real_feel = $real_feel;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(int $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getClouds(): ?int
    {
        return $this->clouds;
    }

    public function setClouds(int $clouds): self
    {
        $this->clouds = $clouds;

        return $this;
    }

    public function getWinds(): ?float
    {
        return $this->winds;
    }

    public function setWinds(float $winds): self
    {
        $this->winds = $winds;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }
}
