<?php

namespace Tests\Feature;

use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente(): void
    {
        // Arrange: el material no existe todavia.
        $this->assertDatabaseCount('materiales', 0);

        $payload = [
            'unidadMedida' => 'unidad',
            'descripcion' => 'Jabon liquido',
            'ubicacion' => 'Bodega A1',
            'categoria' => ['nombre' => 'Limpieza'],
        ];

        // Act: se inserta el material con su categoria asociada.
        $response = $this->postJson('/api/materiales', $payload);

        // Assert: respuesta 201 y persistencia correcta.
        $response->assertCreated()
            ->assertJsonPath('descripcion', 'Jabon liquido')
            ->assertJsonPath('categoria.nombre', 'Limpieza');

        $this->assertDatabaseHas('materiales', [
            'descripcion' => 'Jabon liquido',
            'ubicacion' => 'Bodega A1',
        ]);
        $this->assertDatabaseHas('categorias', ['nombre' => 'Limpieza']);
        $this->assertSame(1, Material::query()->count());
    }
}
