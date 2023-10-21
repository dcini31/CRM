<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCompanyCreation()
    {
        $response = $this->post('/companies', [
            'name' => 'Test Company',
            'email' => 'test@example.com',
            'logo' => 'test-logo.jpg',
            'website' => 'https://www.example.com',
        ]);

        $response->assertStatus(302);
    }
}
