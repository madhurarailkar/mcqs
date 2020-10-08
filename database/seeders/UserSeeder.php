<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
    	$admin = new User();
    	$admin->name = 'madhura1';
    	$admin->email = 'madhura1@gmail.com';
        $admin->password = bcrypt('admin123');
        $admin->is_admin=1;
        $admin->save();
    }
}
