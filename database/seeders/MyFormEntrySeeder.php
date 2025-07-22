<?php

namespace Niharb\MyForm\Database\Seeders;

use Illuminate\Database\Seeder;
use Niharb\MyForm\Models\MyFormEntry;

class MyFormEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyFormEntry::create([
            'field1' => 'Sample Data 1',
            'field2' => 'sample1@example.com',
            'field3' => 'This is a sample description for field 3.',
            'field4' => 123,
        ]);

        MyFormEntry::create([
            'field1' => 'Another Entry',
            'field2' => 'another@example.com',
            'field3' => 'More sample data here.',
            'field4' => 456,
        ]);
    }
}