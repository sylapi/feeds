<?php

namespace Sylapi\Feeds\Contracts;

interface Feed
{
    public function getDocument(): \DOMDocument;
    public function getMainXmlElement(): \DOMElement;
    public function setMainXmlElement(\DOMElement $mainXmlElement): self;
    public function getProductInstance(): ProductSerializer;
    public function getDefaultFileName(): string;
    public function getFileName(): string;
}

