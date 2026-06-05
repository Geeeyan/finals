<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('music')->insert([
            ['title'=>'Anong Oras Na','artist'=>'Blaster','album'=>'Last Fool Show','duration'=>'05:39','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Who Knows','artist'=>'Daniel Caesar','album'=>'Son of Spergy','duration'=>'03:46','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Karma','artist'=>'IV of Spades','album'=>'Andalucia','duration'=>'04:06','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Lumang Kanta','artist'=>'Zild','album'=>'Medisina','duration'=>'03:50','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Mundo','artist'=>'IV Of Spades','album'=>'Single','duration'=>'5:49','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Dilim','artist'=>'Zild','album'=>'Superpower','duration'=>'4:31','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Ibang Planeta','artist'=>'Zild','album'=>'Single','duration'=>'4:17','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Slow Dancing In The Dark','artist'=>'Joji','album'=>'Ballads 1','duration'=>'3:31','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Konsensya','artist'=>'IV Of Spades','album'=>'Andalucia','duration'=>'3:33','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Kalapastangan','artist'=>'Fitterkarma','album'=>'Single','duration'=>'4:36','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Glimpse of Us','artist'=>'Joji','album'=>'SMITHEREENS','duration'=>'3:53','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Aswang Sa Maynila','artist'=>'Fitterkarma','album'=>'Single','duration'=>'2:43','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Pwede Ka Ba','artist'=>'Frank Ely','album'=>'Single','duration'=>'3:19','created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Dulo Ng Hangganan','artist'=>'IV Of Spades','album'=>'CLAPCLAP!','duration'=>'5:28','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
