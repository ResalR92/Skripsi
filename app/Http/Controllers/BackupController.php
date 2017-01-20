<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class BackupController extends Controller
{
    public function index()
    {
    	return view('admin.backup.index');
    }
}
