# Easy Laravel Grid

[![Latest Stable Version](https://poser.pugx.org/churakovmike/laravel-grid/v/stable)](https://packagist.org/packages/churakovmike/laravel-grid)
[![Build Status](https://travis-ci.com/Churakovmike/laravel-grid.svg?branch=master)](https://travis-ci.com/Churakovmike/laravel-grid)
[![License](https://poser.pugx.org/churakovmike/laravel-grid/license)](https://packagist.org/packages/churakovmike/laravel-grid)
[![Maintainability](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability)](https://codeclimate.com/github/codeclimate/codeclimate/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/test_coverage)](https://codeclimate.com/github/codeclimate/codeclimate/test_coverage)

## Requirements
+ laravel 5.5+
+ Bootstrap 3/4 for styling

# Getting started

## install
The package is available on packagist.
```php
composer require churakovmike/laravel-grid
```
Register service provider in config/app.php
```php
    ChurakovMike\EasyGrid\GridViewServiceProvider::class,       
```
## Grid example
```php
<?php

namespace App\Http\Controllers;

use ChurakovMike\EasyGrid\DataProviders\EloquentDataProvider;

class ExampleController extends Controller
{
    public function example()
    {
        $dataProvider = new EloquentDataProvider(ExampleModel::query());
        return view('example-view', [
            'dataProvider' => $dataProvider,
        ]);
    }
}

```

#### render grid simple example
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'email',
        'status',
        'created_at',
    ],
]) !!}
```
#### render grid custom field and callbacks
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'label' => 'Users name',
            'attribute' => 'name',
        ],
        [
            'label' => 'Custom label',
            'attribute' => 'id'
        ],
        [
            'label' => 'Example callbacks',
            'value' => function($data) {
                return $data->relatedModel->attribute;
            }
        ],
        'email',
        'status',
        'created_at',
    ],
]) !!}
```