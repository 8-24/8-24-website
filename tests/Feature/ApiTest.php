<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeApi()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/home');
        $this->assertEquals(200, $response->status());

    }
    public function testWorksItem()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/works/premier-work');
        $this->assertEquals(200, $response->status());

    }
    
    public function testWorksLimit()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/works/limit/4');
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/api/works/limit/1000');
        $this->assertEquals(200, $response->status());
    }

    public function testLabCategories()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/labs/categories');
        $this->assertEquals(200, $response->status());
    }

    public function testLabCategoriesItem()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/labs/categories/creative-coding');
        $this->assertEquals(200, $response->status());
    }
}
