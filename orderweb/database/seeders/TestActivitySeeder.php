<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\TypeActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeActivity = TypeActivity::find(1); //find solo funciona con campos que sean ID
        $technician = Technician::where('document', '=' , 989898)->first(); // FIRSHT es para que salga el primer resultado que encuentre

        $activity = new Activity();
        $activity->description = 'Test Activity';
        $activity->hours = 10;
        $activity->technician_id = $technician->document;
        $activity->type_id = $typeActivity->id;
        $activity->save(); 
        
    }
}
