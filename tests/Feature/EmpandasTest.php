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

        $response = $this->get('api/v1/empanada/1001');
        $response->assertStatus(200);
        $response->assertJsonCount(7); 
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "id" => 1001,
            "nombre" => "ruperta",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1
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
            "nombre" => "ruperta",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1
        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(7);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "nombre" => "ruperta",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1
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

        $response = $this->put('/api/v1/empanada/1002', [
            "nombre" => "ruperta2",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(7);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "nombre" => "ruperta2",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1

        ]);
        $this->assertDatabaseHas('empanadas', [
            "id" => 1002,
            "nombre" => "ruperta2",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1


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

        $response = $this->delete('/api/v1/empanada/1003');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            'Message' => 'Deleted'
        ]);

        $this->assertDatabaseMissing('empanadas', [
            "id" => 1003
        ]);

 

    }
       


    
    public function test_DeleteOneEmpanadaThatDoesNotExists(){
        $response = $this->delete('/api/v1/empanada/50001');
        $response->assertStatus(404);

    }


     

        
    
}
