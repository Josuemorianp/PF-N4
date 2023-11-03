<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\bitacoras;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = new BitacorasSeeder();	
        $roles->run();

        $personas = new BitacorasSeeder();	
        $personas->run();

        $paginas = new BitacorasSeeder();	
        $paginas->run();

        $enlaces = new BitacorasSeeder();	
        $enlaces->run();

        $usuarios = new BitacorasSeeder();	
        $usuarios->run();
        
        $bitacoras = new BitacorasSeeder();	
        $bitacoras->run();
    }
}
