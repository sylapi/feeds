<?php

namespace Sylapi\Feeds;
use JMS\Serializer\Expression\ExpressionEvaluator;
use Sylapi\Feeds\Models\Product;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class FeedReader
{
    private $streamer;
    private $filePath;
    private $serializer;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->streamer = \Prewk\XmlStringStreamer::createStringWalkerParser($this->filePath);
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()         
            ->setExpressionEvaluator(new ExpressionEvaluator(new ExpressionLanguage()))
            ->build();
    }

    public function getProduct(): ?Product
    {
        $node = $this->streamer->getNode();
        if($node === false) {
            return null;
        }

        return $this->serializer->deserialize($node, Product::class ,'xml');

    }

}