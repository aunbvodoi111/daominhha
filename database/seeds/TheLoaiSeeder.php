<?php

use Illuminate\Database\Seeder;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [['Name' => 'Thế giới mở', 'TenKhongDau' => str_slug('Thế giới mở')], ['Name' => 'FPS', 'TenKhongDau' => str_slug('FPS')], ['Name' => 'Thể thao', 'TenKhongDau' => str_slug('Thể thao')], ['Name' => 'Phiêu lưu', 'TenKhongDau' => str_slug('Phiêu lưu')], ['Name' => 'Kinh dị', 'TenKhongDau' => str_slug('Kinh dị')]];
        DB::table('theloai')->insert($data);
    }
}
