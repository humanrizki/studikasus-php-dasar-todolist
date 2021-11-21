<?php
namespace Humanrizki\Helper;
class Input{
    public function __construct(private string $placeholder)
    {
        echo $this->placeholder.PHP_EOL;
    }
    public function put(){
        return trim(fgets(STDIN));
    }
}