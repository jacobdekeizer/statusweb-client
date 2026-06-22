<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class Address implements Request
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $toTheAttentionOf;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $houseNumber;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var int
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @param string $name
     * @return Address
     */
    public function setName(string $name): Address
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $toTheAttentionOf
     * @return Address
     */
    public function setToTheAttentionOf(?string $toTheAttentionOf): Address
    {
        $this->toTheAttentionOf = $toTheAttentionOf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToTheAttentionOf(): ?string
    {
        return $this->toTheAttentionOf;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $houseNumber
     * @return Address
     */
    public function setHouseNumber(string $houseNumber): Address
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode(string $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param int $countryCode
     * @return Address
     */
    public function setCountryCode(int $countryCode): Address
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryCode(): int
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $phoneNumber
     * @return Address
     */
    public function setPhoneNumber(?string $phoneNumber): Address
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $email
     * @return Address
     */
    public function setEmail(?string $email): Address
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function toRequest(): array
    {
        return [
            'Naam' => $this->getName(),
            'Tav' => $this->getToTheAttentionOf(),
            'Adres' => $this->getStreet(),
            'Huisnr' => $this->getHouseNumber(),
            'Postcode' => $this->getPostalCode(),
            'Plaats' => $this->getCity(),
            'Landcode' => $this->getCountryCode(),
            'Telnr' => $this->getPhoneNumber(),
            'Email' => $this->getEmail(),
        ];
    }
}