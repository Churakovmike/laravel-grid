<?php

namespace ChurakovMike\EasyGrid\Columns;

use ChurakovMike\EasyGrid\Columns\Actions\BaseButton;
use ChurakovMike\EasyGrid\Columns\Actions\Destroy;
use ChurakovMike\EasyGrid\Columns\Actions\Show;
use ChurakovMike\EasyGrid\Columns\Actions\Update;
use ChurakovMike\EasyGrid\Filters\StubFilter;
use ChurakovMike\EasyGrid\Traits\Configurable;
use Closure;

/**
 * Class ActionColumn.
 * @package ChurakovMike\EasyGrid\Columns
 *
 * @property StubFilter $filter
 * @property BaseButton[] $buttons
 * @property string $value
 */
class ActionColumn extends BaseColumn
{
    use Configurable;

    const
        ACTION_SHOW = 'show',
        ACTION_UPDATE = 'update',
        ACTION_DESTROY = 'destroy',
        ACTIONS = [
            self::ACTION_SHOW,
            self::ACTION_UPDATE,
            self::ACTION_DESTROY,
        ];

    const
        BASE_ACTIONS = [
            self::ACTION_SHOW => Show::class,
            self::ACTION_UPDATE => Update::class,
            self::ACTION_DESTROY => Destroy::class,
    ];

    /**
     * @var StubFilter $filter
     */
    public $filter;

    /**
     * @var array $buttons
     */
    public $buttons;

    /**
     * @var string $value
     */
    public $value;

    /**
     * ActionColumn constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->loadConfig($config);
        $this->buildButtons($config);
        if (is_null($this->width)) {
            $this->width = '10%';
        }

        $this->filter = new StubFilter(['name' => '']);
    }

    /**
     * Build action column buttons.
     *
     * @param $config
     */
    public function buildButtons($config)
    {
        foreach ($this->buttons as $key => &$button) {

            if ($button instanceof Closure) {
                $class = self::BASE_ACTIONS[$key];
                $button = new $class([
                    'url' => $button,
                ]);
                continue;
            }

            if(is_string($button)) {
                if (in_array($button, self::ACTIONS)) {
                    $class = self::BASE_ACTIONS[$button];
                    $button = new $class;
                    continue;
                }

                if (in_array($key, self::ACTIONS)) {
                    $class = self::BASE_ACTIONS[$key];
                    $button = new $class([
                        'url' => $button,
                    ]);
                    continue;
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return '';
    }

    /**
     * @param $row
     * @return string
     */
    public function render($row)
    {
        $value = '';
        foreach ($this->buttons as $button) {
            $value .= $button->render($row);
        }

        return '<div class="row">' . $value . '</div>';
    }
}
