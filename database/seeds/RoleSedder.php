<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administartor',
            'level' => 1
        ]);

        DB::table('roles')->insert([
            'name' => 'Polres',
            'level' => 2
        ]);

        DB::table('roles')->insert([
            'name' => 'Polsek',
            'level' => 3
        ]);
    }
}
