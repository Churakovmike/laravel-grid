<?php

namespace ChurakovMike\EasyGrid\Traits;

/**
 * Use this trait to configurate your object.
 *
 * Trait Configurable
 */
trait Configurable
{
    /**
     * @param array $config
     */
    public function loadConfig(array $config)
    {
        foreach ($config as $property => $value) {
            $this->$property = $value;
        }
    }
}
