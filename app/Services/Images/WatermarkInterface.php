<?php

namespace App\Services\Images;

interface WatermarkInterface
{
    function make(string $path): void;
}
