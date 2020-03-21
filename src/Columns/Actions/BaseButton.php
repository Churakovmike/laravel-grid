<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

use App\Models\ImageCheck;
use App\User;
use ChurakovMike\EasyGrid\Traits\Configurable;
use Closure;

/**
 * Class BaseButton.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 *
 * @property string $url
 */
abstract class BaseButton
{
    use Configurable;

    /**
     * @var string $url
     */
    public $url;

    /**
     * BaseButton constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->loadConfig($config);
    }

    /**
     * @param $row
     * Render action button.
     */
    public function render($row)
    {
    }

    /**
     * @param $row
     * @return Closure|string
     */
    public function getUrl($row)
    {
        if ($this->url instanceof Closure) {
            return call_user_func($this->url, $row);
        }

        return $this->buildUrl($row);
    }

    /**
     * Build url for some actions.
     * @param $row
     */
    abstract public function buildUrl($row);

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        return url()->current();
    }
}
