<?php

namespace Tests\Unit;

use App\Services\NumerologyService;
use PHPUnit\Framework\TestCase;

class NumerologyServiceTest extends TestCase
{
    protected NumerologyService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new NumerologyService;
    }

    public function test_it_calculates_core_number_accurately_from_birth_date(): void
    {
        // 1990-01-01: (1+9+9+0) + (0+1) + (0+1) = 19 + 1 + 1 = 21 -> 2+1 = 3
        $this->assertEquals(3, $this->service->calculateFromBirthDate('1990-01-01'));

        // 1995-12-31: (1+9+9+5) + (1+2) + (3+1) = 24 + 3 + 4 = 31 -> 3+1 = 4
        $this->assertEquals(4, $this->service->calculateFromBirthDate('1995-12-31'));

        // 2000-01-01: 2 + 1 + 1 = 4
        $this->assertEquals(4, $this->service->calculateFromBirthDate('2000-01-01'));

        // 1988-08-08: (1+9+8+8) + (0+8) + (0+8) = 26 + 8 + 8 = 42 -> 4+2 = 6
        $this->assertEquals(6, $this->service->calculateFromBirthDate('1988-08-08'));
    }

    public function test_it_throws_exception_on_invalid_date_format(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->service->calculateFromBirthDate('invalid-date-format');
    }

    public function test_it_returns_all_nine_archetypes_with_complete_schema(): void
    {
        $archetypes = $this->service->getAllArchetypes();

        $this->assertCount(9, $archetypes);

        for ($i = 1; $i <= 9; $i++) {
            $this->assertArrayHasKey($i, $archetypes);
            $arch = $archetypes[$i];

            $this->assertEquals($i, $arch['number']);
            $this->assertNotEmpty($arch['name']);
            $this->assertNotEmpty($arch['slug']);
            $this->assertIsArray($arch['traits']);
            $this->assertNotEmpty($arch['description']);
            $this->assertNotEmpty($arch['essence_name']);
            $this->assertIsArray($arch['notes']);
            $this->assertArrayHasKey('top', $arch['notes']);
            $this->assertArrayHasKey('middle', $arch['notes']);
            $this->assertArrayHasKey('base', $arch['notes']);
            $this->assertNotEmpty($arch['ajian']);
            $this->assertNotEmpty($arch['sugesti']);
            $this->assertNotEmpty($arch['element']);
            $this->assertGreaterThan(0, $arch['price']);
        }
    }

    public function test_it_retrieves_archetype_by_slug(): void
    {
        $seeker = $this->service->getArchetypeBySlug('the-seeker');

        $this->assertNotNull($seeker);
        $this->assertEquals(7, $seeker['number']);
        $this->assertEquals('The Seeker', $seeker['name']);

        $invalid = $this->service->getArchetypeBySlug('non-existent-archetype');
        $this->assertNull($invalid);
    }

    public function test_it_generates_full_reading(): void
    {
        $reading = $this->service->getReading('1990-01-01', 'Raden Bayu');

        $this->assertEquals('Raden Bayu', $reading['name']);
        $this->assertEquals('1990-01-01', $reading['birth_date']);
        $this->assertEquals(3, $reading['core_number']);
        $this->assertEquals('The Creator', $reading['archetype']['name']);
    }
}
