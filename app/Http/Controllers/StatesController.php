<?php

namespace App\Http\Controllers;

use App\Imports\StatesImport;
use App\Models\State;
use Maatwebsite\Excel\Facades\Excel;


class StatesController extends Controller
{
    public function import() 
    {
        Excel::import(new StatesImport, storage_path('app/public/states.csv'));
    }
    
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return State::all();
    }

}
