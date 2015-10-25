<?php

use Illuminate\Database\Seeder;

use App\OrderedList;

class ListTableSeeder extends Seeder {

    public function run()
    {
        DB::table('list')->delete();

        OrderedList::create(array('name' => 'first name', 'order'=>1));
        OrderedList::create(array('name' => 'second name', 'order'=>2));
        OrderedList::create(array('name' => 'third name', 'order'=>3));
        OrderedList::create(array('name' => 'foth name', 'order'=>4));
        OrderedList::create(array('name' => '5th name', 'order'=>5));
    }

}