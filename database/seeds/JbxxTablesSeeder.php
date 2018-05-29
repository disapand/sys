<?php

use Illuminate\Database\Seeder;

class JbxxTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jbxxs = factory(\App\Models\jbxx::class)->times(50)->make();
        \App\Models\jbxx::insert($jbxxs->toArray());
    }
}
