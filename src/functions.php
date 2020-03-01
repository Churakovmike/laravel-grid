<?php
/**
 * @param array $config
 * @return string
 * @throws Throwable
 */
function easy_grid(array $config)
{
    return (new \ChurakovMike\EasyGrid\Grid($config))->render();
}
