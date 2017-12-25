<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicPages()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/login');

        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/blog');
        $this->assertEquals(200, $response->status());
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/labs');
        $this->assertEquals(200, $response->status());
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/works');
        $this->assertEquals(200, $response->status());
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/contact');
        $this->assertEquals(200, $response->status());
    }
}
