<?php

namespace ChurakovMike\EasyGrid;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class GridViewServiceProvider extends ServiceProvider
{
    /**
     * Service provider for grid.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'churakovmike_easygrid');

        require_once __DIR__ . '/functions.php';
        Blade::directive('easy_grid', function ($config) {
            return "<?php echo grid($config) ?>";
        });
    }

    public function register()
    {
        //
    }
}
