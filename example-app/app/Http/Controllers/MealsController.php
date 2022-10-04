<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Factories\FakeDataGenerator;

class MealsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function addData()
    { 
        FakeDataGenerator::generateData();
        return back();
    }
}
