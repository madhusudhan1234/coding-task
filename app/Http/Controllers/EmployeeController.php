<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    private $employees;

    /**
     * EmployeeController constructor.
     * @param EmployeeRepository $employees
     */
    public function __construct(EmployeeRepository $employees)
    {
        $this->employees = $employees;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employees->all();

        return view('employees.index',compact('employees'))->with('i',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeStoreRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $this->employees->create($request);

        return redirect(route('employees.index'))->with('status','Employee Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->employees->find($id);

        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employees->find($id);

        return view('employees.edit', compact('employee','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeStoreRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest  $request, $id)
    {
        $this->employees->update($request,$id);

        return redirect(route('employees.index'))->with('status','Employee Record Updated Successfully');
    }

    public function confirm($id)
    {
        $employee = $this->employees->find($id);

        return view('employees.confirm',compact('employee','id'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employees->delete($id);

        return redirect(route('employees.index'))->with('status','Employee Deleted Successfully');
    }
}
