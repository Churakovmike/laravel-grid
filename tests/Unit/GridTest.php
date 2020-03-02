<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Tests\Setup\Setup;

class GridTest extends \Orchestra\Testbench\TestCase
{
    use Setup;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testGridInit()
    {
        $user = DB::table('users')->where('id', '=', 1)->first();
        $this->assertEquals('churakovmike@mail.ru', $user->email);
        var_dump($user);
        $this->assertEquals(true, true);
    }
}
