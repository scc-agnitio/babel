<?php

namespace Tests\Feature;

use App\Platform;
use App\Term;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportTermsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_imports_a_list_of_terms_for_a_valid_platform()
    {
        Platform::create([
            'key' => 'valid_platform',
            'name' => 'Foo Platform'
        ]);
        $termsToImport = [
            [
                'key'         => 'foo_login_key',
                'description' => 'Login prompt message',
            ],
            [
                'key'         => 'bar_logout_key',
                'description' => 'Logout prompt message',
            ],
        ];
        $response = $this->postJson('/terms/import', [
            'platform' => 'valid_platform',
            'terms' => $termsToImport
        ]);

        $response->assertStatus(200);
        $terms = Term::forPlatform('valid_platform');
        $this->assertCount(2, $terms);
        $this->assertArraySubset($termsToImport, $terms->toArray());
    }
}
