<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $data = [
        // 	"nama_lomba" => "Web Design",
        // 	"id_bidang" => 1,
        // 	"tgl_perlombaan" => "2016/04/18",
        // 	"deskripsi" => "Test 123",
        // 	"link" => "google.com",
        // 	"poster" => "jdks"
        // ];
        // DB::table('perlombaan')->insert($data);

        $data = [
        	"nama_bidang" => "Atletik"
        ];
        DB::table('bidang')->insert($data);
    }
}
