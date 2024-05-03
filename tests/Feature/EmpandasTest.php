<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpandasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_ListAllEmpandas(){

        $estructura = [
               "*" =>[
               "id",
               "nombre",
               "tipo",
               "precio",
               "cantidad",
               "created_at",
               "updated_at"
                
            ]
        ];

        $response = $this->get('/api/v1/empanada');
        $response->assertStatus(200);
       // $response->assertJsoonCount(501);
        $response->assertJsonStructure($estructura);
    }


    public function test_ListOneEmpanda() {


        $estructura = [ 
               "id",
               "nombre",
               "tipo",
               "precio",
               "cantidad",
               "created_at",
               "updated_at"
                
        ];

        $response = $this->get('api/v1/empanada/1101');
        $response->assertStatus(200);
        $response->assertJsonCount(7); 
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "id" => 1101,
            "nombre" => "reiciendis",
            "tipo" => "queso",
            "precio" => 144,
            "cantidad" => 22
        ]); //el assertJsonFragment lo que hace es testear un solo registro, es por eso que en la seed creamos un solo registro de este tipo
    }

    public function test_CreateOneEmpanada(){

        $estructura = [

            "id",
            "nombre",
            "tipo",
            "precio",
            "cantidad",
            "created_at",
            "updated_at"
        ];

        $response = $this->post('api/v1/empanada',[
            'nombre' => 'PepaPig',
            'tipo' => 'farlopaSana',  
            'precio' => 20,
            'cantidad' => 1
        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(7);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            'nombre' => 'PepaPig',
            'tipo' => 'farlopaSana', 
            'precio' => 20,
            'cantidad' => 1
        ]);

        $this->assertDatabaseHas('empanadas',[
            'nombre' => 'PepaPig',
            'tipo' => 'farlopaSana',
            'precio' => 20,
            'cantidad' => 1

           ]);


    }

    public function test_UpdateOneEmpanadaThatDoesExists(){
      
        $estructura = 

        $estructura = [

            "id",
            "nombre",
            "tipo",
            "precio",
            "cantidad",
            "created_at",
            "updated_at"
        ];

        $response = $this->put('/api/v1/empanada/1100', [
            'nombre' => 'commodi',
            'tipo' => 'pollo',
            'precio' => 109,
            'cantidad' => 15
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(7);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            'nombre' => 'commodi',
            'tipo' => 'pollo',
            'precio' => 109,
            'cantidad' => 15

        ]);
        $this->assertDatabaseHas('empanadas', [
            'id' => 1100,
            'nombre' => 'commodi',
            'tipo' => 'pollo',
            'precio' => 109,
            'cantidad' => 15


        ]);



    }

    public function test_UpdateOneEmpanadaThatDoesNotExists(){

        $response = $this->put('/api/v1/empanada/50000');
        $response->assertStatus(404);
    }

    public function test_DeleteOneEmpanadaThatDoesExists(){

         $estructura =[ 
           "Message" 
         ];

        $response = $this->delete('/api/v1/empanada/1095');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            'Message' => 'Deleted'
        ]);

        $this->assertDatabaseMissing('empanadas', [
            "id" => 1001
        ]);

 

    }
       


    
    public function test_DeleteOneEmpanadaThatDoesNotExists(){
        $response = $this->delete('/api/v1/empanada/50001');
        $response->assertStatus(404);

    }


     

        
    
}
