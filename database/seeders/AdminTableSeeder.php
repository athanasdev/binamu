<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>"Admin",
            'email'=>'admin@gmail.com',
            'email'=>'admin@trade.com',
            'password' => bcrypt('Trade@2025'),
            'role_id'=>1,
            'image'=>'null',
            'status'=>1
        ]);
    }
}
