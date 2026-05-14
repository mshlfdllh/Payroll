<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    // DashboardController.php
public function index() {
    return view('admin.index', [
        'totalUsers'     => User::count(),
        'totalEmployees' => Employee::count(),
        'totalPositions' => Position::count(),
        'totalPayrolls'  => Payroll::count(),
        'totalNetSalary' => Payroll::sum('net_salary'),
    ]);
}
}
