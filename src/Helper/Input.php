<?php
namespace Humanrizki\Helper;
class Input{
    public function __construct(private string $placeholder)
    {}
    public function put(){
        echo $this->placeholder.PHP_EOL;
        return trim(fgets(STDIN));
    }
}