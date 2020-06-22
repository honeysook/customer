<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Get a listing of the resource.
     *
     * @return Customer[]
     */
    public function getAll()
    {
        return Customer::orderBy('Name', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function weblist(){
        $customers = $this->getAll();

        return view('customers',['customers'=>$customers]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apilist()
    {
        
        $customers = $this->getAll();
 
        return response()->json($customers);
    }

}