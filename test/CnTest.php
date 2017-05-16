<?php

namespace Cn\test;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CnTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_carbon()
    {
        $today = \Carbon\Carbon::today()->diffForHumans();
        $this->assertContains('前', $today);
    }

    public function test_faker()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(mb_strlen($user->name) <= 4);
    }

    public function test_validate_phone()
    {
        $rule = ['phone' => 'required|phone'];
        $v_faile = \Validator::make(['phone'=>'12345678901'], $rule);
        $v_success = \Validator::make(['phone'=>'18888888888'], $rule);
        $this->assertTrue($v_faile->fails());
        $this->assertTrue($v_success->passes());
    }
}
