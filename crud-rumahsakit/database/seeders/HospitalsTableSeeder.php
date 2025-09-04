<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HospitalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hospitals')->insert([
            ['name'=>'RS Sentot','address'=>'Bandung','email'=>'sentot@example.com','phone'=>'081234567890','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'RS Ali','address'=>'Jakarta','email'=>'ali@example.com','phone'=>'08111111111','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'RS Mahmud','address'=>'Bali','email'=>'mahmud@example.com','phone'=>'08222222222','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}