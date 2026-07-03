<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypeSeeder extends Seeder
{
    public function run(): void
    {
        LeaveType::insert([
            ['name' => 'Annual Leave', 'days_allowed' => 14],
            ['name' => 'Unpaid Leave', 'days_allowed' => 0],
            ['name' => 'Emergency Leave', 'days_allowed' => 3],
            ['name' => 'Sick Leave', 'days_allowed' => 7],
        ]);
    }
}