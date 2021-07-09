<?php

namespace Sylapi\Feeds\Abstracts;

use Sylapi\Feeds\Contracts;
use Sylapi\Feeds\Parameters;
use Sylapi\Feeds\Contracts\ProductSerializer;

abstract class Feed implements Contracts\Feed
{
    private $parameters;
    private $doc;
    public $mainXml;

    public function __construct(Parameters $parameters)
    {
        $this->parameters = $parameters;
        $this->doc = new \DOMDocument();
    }

    public function getParameters(): Parameters
    {
        return $this->parameters;
    }

    public function getDocument(): \DOMDocument
    {
        return $this->doc;
    }

    public function setMainXmlElement(\DOMElement $mainXml): self
    {
        $this->mainXml = $mainXml;
        return $this;
    }

    abstract public function getProductInstance(): ProductSerializer;

    abstract public function getDefaultFileName(): string;

    public function getFileName():string
    {
        return ($this->parameters->hasProperty('fileName'))
            ? $this->parameters->fileName : $this-> getDefaultFileName();
    }

    abstract public function initXML(): \DOMElement;

    public function getMainXmlElement(): \DOMElement
    {
        if(!($this->mainXml instanceof \DOMElement)) {
            $this->initXML();
        }

        return $this->mainXml;
    }


}

