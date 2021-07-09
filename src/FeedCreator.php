<?php

namespace Sylapi\Feeds;
use JMS\Serializer\Expression\ExpressionEvaluator;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class FeedCreator
{
    const DEFAULT_STORAGE_PATH = 'storage/';

    private $storagePath = self::DEFAULT_STORAGE_PATH;
    private $feed;
    private $serializer;


    public function __construct()
    {
        $this->feed = new Feed(Parameters::create([]));
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()         
            ->setExpressionEvaluator(new ExpressionEvaluator(new ExpressionLanguage()))
            ->build();
    }

    /**
     * Get the value of storagePath
     */ 
    public function getStoragePath(): string
    {
        return $this->storagePath;
    }

    /**
     * Set the value of storagePath
     *
     * @return  self
     */ 
    public function setStoragePath($storagePath): self
    {
        $this->storagePath = $storagePath;

        return $this;
    }

    /**
     * Get the value of feed
     */ 
    public function getFeed(): ?Contracts\Feed
    {
        return $this->feed;
    }

    /**
     * Set the value of feed
     *
     * @return  self
     */ 
    public function setFeed(Contracts\Feed $feed)
    {
        $this->feed = $feed;

        return $this;
    }

    private function getSerializer(): \JMS\Serializer\Serializer
    {
        return $this->serializer;
    }

    public function filePath()
    {
        return $this->getStoragePath().$this->getFeed()->getFileName().'.xml';
    }

    private function createFile($path)
    {
        return fopen($path, 'w') or die("Can't create file");
    }

    public function create():self
    {
        $this->createFile($this->filePath());
        return $this;
    }
    

    public function appendProduct(Models\Product $product) :self
    {
        $serializer = $this->getSerializer();
        $item = ($this->getFeed()->getProductInstance())->make($product);
        $content = str_replace(
            '<?xml version="1.0" encoding="UTF-8"?>', 
            '', 
            $serializer->serialize($item, 'xml')
        );

        $doc = $this->getFeed()->getDocument();
        $f = $doc->createDocumentFragment();
        $f->appendXML($content);
        $mainXMLElement = $this->getFeed()->getMainXmlElement();
        $mainXMLElement->appendChild($f);
        $this->getFeed()->setMainXmlElement($mainXMLElement);
        return $this;
    }

    public function save()
    {
        $doc = $this->getFeed()->getDocument();
        $doc->appendChild($this->getFeed()->getMainXmlElement());
        
        return $doc->save($this->filePath());
    }
}
