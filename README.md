# Easy Laravel Grid

[![Latest Stable Version](https://poser.pugx.org/churakovmike/laravel-grid/v/stable)](https://packagist.org/packages/churakovmike/laravel-grid)
[![Build Status](https://travis-ci.com/Churakovmike/laravel-grid.svg?branch=master)](https://travis-ci.com/Churakovmike/laravel-grid)
[![License](https://poser.pugx.org/churakovmike/laravel-grid/license)](https://packagist.org/packages/churakovmike/laravel-grid)
[![Maintainability](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability)](https://codeclimate.com/github/codeclimate/codeclimate/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/test_coverage)](https://codeclimate.com/github/codeclimate/codeclimate/test_coverage)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Churakovmike/laravel-grid/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Churakovmike/laravel-grid/?branch=master)
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

#### Render grid simple example
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
#### Render grid custom field and callbacks
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
#### If you need column without model attribute, you can use callback
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'label' => 'There are no model attribute',
            'value' => function($data) {
                return 'example string';
            }
        ],
        'email',
        'status',
        'created_at',
    ],
]) !!}
``` 
#### The grid support column fomatter, default is a text filter and it cuts out all html code (strip_tags()), you can change this formatter to html formatter
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'label' => 'Avatar',
            'attribute' => 'avatar',
            'format' => 'html,
        ],
    ],
]) !!}
```
#### There are default action buttons in the grid,
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'email',
        'status',
        'created_at',
        [
            'class' => \ChurakovMike\EasyGrid\Columns\ActionColumn::class,
            'buttons' => [
                'show',
                'update',
                'destroy',
            ],
        ],
    ],
]) !!}
```

Buttons urls

Button | Url
--- | --- 
Show | /{id}
Update | /{id}/edit
Destroy | /{id}/delete

If you need another urls, just do like this
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'email',
        'status',
        'created_at',
        [
            'class' => \ChurakovMike\EasyGrid\Columns\ActionColumn::class,
            'buttons' => [
                'show' => function($data) {
                    return route('your-route-name', [
                        'id' => $data->id,
                    ])
                },
                'update' => function($data) {
                    return '/edit/' . $data->id,
                },
                'destroy',
            ],
        ],
    ],
]) !!}
```
#### To change the width of the cell you can pass the value of the width
```php
{!! easy_grid([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'label' => 'Users name',
            'attribute' => 'name',
            'width' => '15%',
        ],
        [
            'label' => 'Custom label',
            'attribute' => 'id',
            'width' => '100px',
        ],
        'email',
        'status',
        'created_at',
    ],
]) !!}
```