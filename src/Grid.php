<?php

namespace ChurakovMike\EasyGrid;

use ChurakovMike\EasyGrid\Columns\ActionColumn;
use ChurakovMike\EasyGrid\Columns\BaseColumn;
use ChurakovMike\EasyGrid\Columns\CallbackColumn;
use ChurakovMike\EasyGrid\Columns\DefaultColumn;
use ChurakovMike\EasyGrid\DataProviders\BaseDataProvider;
use ChurakovMike\EasyGrid\DataProviders\EloquentDataProvider;
use ChurakovMike\EasyGrid\Traits\Configurable;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class Grid.
 * @package ChurakovMike\EasyGrid
 *
 * @property array $config
 * @property BaseDataProvider @dataProvider
 * @property array|mixed $columns
 * @property Request $request
 * @property LengthAwarePaginator $paginator
 * @property int $rowPerPage
 * @property int $page
 * @property string $title
 */
class Grid
{
    use Configurable;

    const
        DEFAULT_ROW_PER_PAGE = 10,
        DEFAULT_PAGE_NUMBER = 1;

    /**
     * @var array
     */
    public $config;

    /**
     * @var EloquentDataProvider $dataProvider
     */
    public $dataProvider;

    /**
     * @var array $columns
     */
    public $columns;

    /**
     * @var array|\Illuminate\Http\Request|string
     */
    public $request;

    /**
     * @var LengthAwarePaginator $paginator
     */
    public $paginator;

    /**
     * @var int $rowPerPage
     */
    public $rowPerPage = self::DEFAULT_ROW_PER_PAGE;

    /**
     * @var int
     */
    public $page;

    /**
     * @var string
     */
    public $title;

    /**
     * Grid constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->loadConfig($config);
        $this->request = request();
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function render(): string
    {
        $this->buildColumns();
        $this->dataProvider->prepareQuery($this->request);
        $this->page = $this->request->get('page', self::DEFAULT_PAGE_NUMBER);

        if (is_null($this->request->get('perPage'))) {
            $this->request->perPage = self::DEFAULT_ROW_PER_PAGE;
        }

        $dataProviderCount = $this->dataProvider->getCount();
        $this->paginator = new LengthAwarePaginator(
            $this->dataProvider->get($this->request),
            $dataProviderCount,
            $this->rowPerPage,
            $this->page
        );

        return view('churakovmike_easygrid::grid', [
            'columns' => $this->columns,
            'paginator' => $this->paginator,
            'title' => $this->title,
        ])->render();
    }

    /**
     * @throws \Exception
     */
    protected function buildColumns()
    {
        foreach ($this->columns as $key => &$column) {

            //simple column
            if (is_string($column)) {
                $column = new DefaultColumn([
                    'attribute' => $column,
                ]);

                continue;
            }

            if (is_array($column)) {
                if (isset($column['class']) && class_exists($column['class']) ) {
                    $column = new $column['class']($column);
                    if (!is_a($column, ActionColumn::class)) {
                        throw new \Exception('Column class must inherit from BaseColumn class');
                    }

                    continue;
                }

                if (isset($column['value']) && $column['value'] instanceof Closure) {
                    $column = new CallbackColumn($column);
                    continue;
                }

                $column = new DefaultColumn($column);
            }
        }
    }
}
