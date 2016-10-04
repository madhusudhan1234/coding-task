<?php

namespace App\Repositories;

use App\Employee;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 */
class EmployeeRepository
{
    /**
     * @var Employee
     */
    private $employees;

    /**
     * EmployeeRepository constructor.
     * @param Employee $employees
     */
    public function __construct(Employee $employees)
    {
        $this->employees = $employees;
    }
    /**
     * return all the values of file.csv file
     * into the controller, that is useful to show in the index page
     * and make them listing
     *
     * @return array
     */
    public function all()
    {
        $file = storage_path('/app/employees/file.csv');

        $employee_array = $this->csvToArray($file);

        return $employee_array;
    }

    /**
     * @param string $filename
     * @param string $delimiter
     * @return array|bool
     */
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;

        $data = array();

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;

                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    /**
     * Store the Form Values to the csv File
     *
     * @param $request
     */
    public function create($request)
    {
        $input = $request->except('_token');

        $fp = fopen(storage_path().'/app/employees/file.csv', 'a');

        fputcsv($fp, $input);

        fclose($fp);

        return;
    }

}