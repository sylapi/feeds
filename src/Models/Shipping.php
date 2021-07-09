<?php
namespace Sylapi\Feeds\Models;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("shipping")
 * @Serializer\AccessType("public_method")
 */
class Shipping
{
    /**
     * @Serializer\Type("string")
     */
    private $country;

    /**
     * @Serializer\Type("string")
     */
    private $region;
    
    /**
     * @Serializer\Type("string")
     */
    private $service;

    /**
     * @Serializer\Type("string")
     */
    private $courier;    

    /**
     * @Serializer\Type("string")
     */
    private $currency;

    /**
     * @Serializer\Type("double")
     */
    private $price;

    /**
     * @Serializer\Type("double")
     */
    private $priceCod;    
    
    /**
     * @Serializer\Type("integer")
     */
    private $minHandlingTime;

    /**
     * @Serializer\Type("integer")
     */
    private $maxHandlingTime;

    /**
     * @Serializer\Type("integer")
     */
    private $minTransitTime;

        /**
     * @Serializer\Type("integer")
     */
    private $maxTransitTime;

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of region
     */ 
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set the value of region
     *
     * @return  self
     */ 
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get the value of service
     */ 
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of courier
     */ 
    public function getCourier()
    {
        return $this->courier;
    }

    /**
     * Set the value of courier
     *
     * @return  self
     */ 
    public function setCourier($courier)
    {
        $this->courier = $courier;

        return $this;
    }    

    /**
     * Get the value of currency
     */ 
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */ 
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of priceCod
     */ 
    public function getPriceCod()
    {
        return $this->priceCod;
    }

    /**
     * Set the value of priceCod
     *
     * @return  self
     */ 
    public function setPriceCod($priceCod)
    {
        $this->priceCod = $priceCod;

        return $this;
    }    

    /**
     * Get the value of minHandlingTime
     */ 
    public function getMinHandlingTime()
    {
        return $this->minHandlingTime;
    }

    /**
     * Set the value of minHandlingTime
     *
     * @return  self
     */ 
    public function setMinHandlingTime($minHandlingTime)
    {
        $this->minHandlingTime = $minHandlingTime;

        return $this;
    }

    /**
     * Get the value of maxHandlingTime
     */ 
    public function getMaxHandlingTime()
    {
        return $this->maxHandlingTime;
    }

    /**
     * Set the value of maxHandlingTime
     *
     * @return  self
     */ 
    public function setMaxHandlingTime($maxHandlingTime)
    {
        $this->maxHandlingTime = $maxHandlingTime;

        return $this;
    }    

    /**
     * Get the value of minTransitTime
     */ 
    public function getMinTransitTime()
    {
        return $this->minTransitTime;
    }

    /**
     * Set the value of minTransitTime
     *
     * @return  self
     */ 
    public function setMinTransitTime($minTransitTime)
    {
        $this->minTransitTime = $minTransitTime;

        return $this;
    }

    /**
     * Get the value of maxTransitTime
     */ 
    public function getMaxTransitTime()
    {
        return $this->maxTransitTime;
    }

    /**
     * Set the value of maxTransitTime
     *
     * @return  self
     */ 
    public function setMaxTransitTime($maxTransitTime)
    {
        $this->maxTransitTime = $maxTransitTime;

        return $this;
    }


}