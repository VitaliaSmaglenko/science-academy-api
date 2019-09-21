<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(DepartmentSeeder::class);
    }
}
