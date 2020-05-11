<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomersController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        $data['customers'] = $customer;
        return view('customer.index', $data);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('customer_create')) {
            return abort(401);
        }
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'transport' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        Customer::storeCustomer($request->first_name, $request->last_name, $request->fathers_name, $request->transport, $request->phone, $request->email);
        return redirect()->route('customers');
    }

    public function delete($customer_id, Request $request)
    {
        Customer::destroy($customer_id);
        return redirect()->route('customers');
    }

    public function edit($customer_id)
    {
        $data['customer'] = Customer::find($customer_id);
        return view('customer.edit', $data);
    }

    public function update($customer_id, Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'transport' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        Customer::find($customer_id)->update($request->all());
        return redirect()->route('customers');
    }
}
