<?php

namespace Tests\Setup;

use Illuminate\Support\Facades\DB;
use Orchestra\Testbench\Concerns\WithLoadMigrationsFrom;

trait Setup {

    use WithLoadMigrationsFrom;

    protected $connectionsToTransact = ['testing'];

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(realpath(__DIR__ . '/../database/migrations'));
        $this->artisan('migrate', [
            '--path' => realpath(__DIR__ . '/../database/migrations'),
            '--realpath' => true,
            '--database' => 'testing'
        ]);
        $this->loadData();
    }

    protected function loadData()
    {
        $postBuilder = DB::table('posts');
        $usersBuilder = DB::table('users');
        $postBuilder->insert([
            'id' => 1,
            'name' => 'Пост',
            'description' => 'Описание поста',
            'content' => 'Контент поста',
            'user_id' => 1,
        ]);
        
        $usersBuilder->insert([
            'id' => 1,
            'name' => 'Mike',
            'email' => 'churakovmike@mail.ru',
        ]);

    }
}
