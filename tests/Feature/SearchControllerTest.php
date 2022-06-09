<?php

namespace Tests\Feature;

use Illuminate\Support\Arr;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function can_make_search()
    {
        $query = 'test';
        $url = 'api/search?q=' . $query;
        $response = $this->get($url);

        $this->assertContains($response->getStatusCode(), array(200, 204));
    }

    /**
     * @test
     * @return void
     */
    public function can_not_search_without_query_parameter()
    {
        $url = 'api/search';
        $response = $this->get($url);

        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function can_get_existing_institutions()
    {
        $query = 'test';
        $url = 'api/search?q=' . $query;
        $response = $this->get($url)->json();

        $this->assertIsArray($response);
        $this->assertTrue(intval(Arr::get($response, 'results', 0)) > 0);
    }

     /**
     * @test
     */
    public function can_not_get_inexistant_institutions()
    {
        $query = '00000xxxx999888';
        $url = 'api/search?q=' . $query;
        $response = $this->get($url);

        $response->assertStatus(204);
    }
}
