<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome'=>'Bob esponja', 'cargo'=>'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome'=>'Lula molusco', 'cargo'=>'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome'=>'Plancton', 'cargo'=>'Programador Jr']);
    }
}
