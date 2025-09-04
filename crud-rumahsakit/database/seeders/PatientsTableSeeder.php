<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->insert([
            ['name'=>'Siti','address'=>'Bandung','phone'=>'0812','hospital_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Budi','address'=>'Jakarta','phone'=>'0813','hospital_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Ani','address'=>'Bali','phone'=>'0814','hospital_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Roni','address'=>'Bandung','phone'=>'0815','hospital_id'=>3,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
