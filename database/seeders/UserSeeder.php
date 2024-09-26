<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'firstname' => 'Dayan',
      'lastname' => 'Betancourt',
      'email' => 'dkbetancourt@gmail.com',
      'password' => Hash::make('dayan123'),
      'role_id' => 1
    ]);

    DB::table('users')->insert([
      'firstname' => 'Juan',
      'lastname' => 'Betancourt',
      'email' => 'juanbeta@gmail.com',
      'password' => Hash::make('juan1234'),
      'role_id' => 2
    ]);

    DB::table('users')->insert([
      'firstname' => 'Pedro',
      'lastname' => 'Perez',
      'email' => 'pedroperez@gmail.com',
      'password' => Hash::make('pedro1234'),
      'role_id' => 3
    ]);
  }
}
