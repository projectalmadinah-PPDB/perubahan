<?php

namespace App\Http\Controllers;

use App\DataTables\usersDataTable;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(usersDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.dashboard.coba');
    }
}
