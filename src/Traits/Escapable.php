<?php


namespace MyBot\Traits;


trait Escapable
{
    public function htmlEscape(){
        foreach ($this->getAttributes() as $key => $value){
            if (is_int($value)) continue;
            $this->attributes[$key] = htmlspecialchars($value);
        }
    }
}