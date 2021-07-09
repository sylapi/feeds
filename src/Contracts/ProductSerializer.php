<?php

namespace Sylapi\Feeds\Contracts;

interface ProductSerializer
{
    public function make(\Sylapi\Feeds\Models\Product $product): self;
}

