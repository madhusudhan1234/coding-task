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

        $this->filename = storage_path('app/employees/file.csv');
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
        $employee_array = $this->csvToArray($this->filename);

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

        if (($handle = fopen($filename, 'r')) !== false) {

            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {

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

        $fp = fopen($this->filename, 'a');

        fputcsv($fp, $input);

        fclose($fp);

        return;
    }

    /**
     * @param $id
     * @param string $delimiter
     * @return array
     */
    public function find($id, $delimiter = ',')
    {
        $header = null;

        $i = 0;

        if (($handle = fopen($this->filename, 'r')) !== false) {

            while ($row = fgetcsv($handle, 1000, $delimiter)) {

                if (!$header)
                    $header = $row;

                else {
                    $data = array_combine($header, $row);

                    if ($i == $id) {
                        return $data;
                        break;
                    };
                }
                ++$i;
            }
            fclose($handle);
        }
    }

    /**
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $i = 0;

        $tempfile = tempnam(".", "tmp");

        if(!$input = fopen($this->filename,'r')){
            die('could not open existing csv file');
        }

        if(!$output = fopen($tempfile,'w')){
            die('could not open temporary output file');
        }

        while(($data = fgetcsv($input)) !== FALSE){
            if ($i == $id) {
                $data = $request->except('_token', '_method');
            }
            fputcsv($output,$data);
            $i++;
        }
        fclose($input);
        fclose($output);

        unlink($this->filename);
        rename($tempfile,$this->filename);
        return ;
    }

    /**
     * Delete the specific line from the csv file
     *
     * @param $id
     */
    public function delete($id)
    {
        $i = 0;

        $tempfile = tempnam(".", "tmp");

        if(!$input = fopen($this->filename,'r')){
            die('could not open existing csv file');
        }

        if(!$output = fopen($tempfile,'w')){
            die('could not open temporary output file');
        }

        while(($data = fgetcsv($input)) !== FALSE){
            if ($i == $id) {
                $data = [];
            }
            fputcsv($output,$data);
            $i++;
        }
        fclose($input);
        fclose($output);

        unlink($this->filename);
        rename($tempfile,$this->filename);
        return ;
    }

}