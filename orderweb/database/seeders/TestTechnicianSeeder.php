<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTechnicianSeeder extends Seeder
{
    public function run(): void
    {
        $technician = new Technician();
        $technician->document= 989898;
        $technician->name = 'Arnulfo Archundia';
        $technician->especiality = 'Medicion de redes';
        $technician->phone = '315312';
        $technician->save(); 
    }
}
