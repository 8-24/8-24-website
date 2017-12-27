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

    public function testBlogPost(){
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/blog/premier-post');
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/api/blog/premier-post-innexistant');
        $this->assertEquals(404, $response->status());
    }

    public function testWorksItem()
    {
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/works/premier-work');
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/api/works/premier-work-innexistant');
        $this->assertEquals(404, $response->status());

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

        $this->assertTrue(true);
        $response = $this->call('GET', '/api/labs/categories/categorie-innexistante');
        $this->assertEquals(404, $response->status());
    }

    public function testLabPost(){
        
        $this->assertTrue(true);
        $response = $this->call('GET', '/api/labs/posts/creative-1');
        $this->assertEquals(200, $response->status());

        $this->assertTrue(true);
        $response = $this->call('GET', '/api/labs/posts/creative-1-innexistant');
        $this->assertEquals(404, $response->status());
    }

    public function testAddContactMessage(){

        $this->assertTrue(true);
        $response = $this->post('/api/add-contact-message', []);
        $this->assertEquals(400, $response->status());

        $this->assertTrue(true);
        $response = $this->post('/api/add-contact-message', ['content' => '', 'email' => '']);
        $this->assertEquals(400, $response->status());

        $this->assertTrue(true);
        $response = $this->post('/api/add-contact-message', ['content' => 'content', 'email' => '']);
        $this->assertEquals(400, $response->status());

        $this->assertTrue(true);
        $response = $this->post('/api/add-contact-message', ['content' => '', 'email' => 'content']);
        $this->assertEquals(400, $response->status());
        $this->assertEquals(400, $response->status());

        $this->assertTrue(true);
        $response = $this->post('/api/add-contact-message', ['content' => 'content', 'email' => 'content']);
        $this->assertEquals(200, $response->status());
    }
}
