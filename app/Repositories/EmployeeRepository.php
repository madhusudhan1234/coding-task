<?php

namespace App\Repositories;

use App\Employee;
use Psr\Log\LoggerInterface;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 */
class EmployeeRepository
{
    protected $logger;
    /**
     * @var Employee
     */
    private $employees;

    /**
     * EmployeeRepository constructor.
     * @param Employee $employees
     * @param LoggerInterface $logger
     */
    public function __construct(Employee $employees, LoggerInterface $logger)
    {
        $this->employees = $employees;

        $this->logger = $logger;

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

        $this->logger->info("Info logging", ['Visit' => "User Visited the employees index page"]);

        return $employee_array;
    }

    /**
     * return the array value from the csv file
     *
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
     * @return string
     */
    public function create($request)
    {
        try {
            $input = $request->except('_token');

            $fp = fopen($this->filename, 'a');

            fputcsv($fp, $input);

            fclose($fp);

            return $this->logger->info("Info logging", ['Insert' => "Employee Record Inserted"]);

        } catch (\Throwable $t) {
            return $this->logger->error("Error Logging", ['Insert' => "Employee Record is not Inserted" . $t]);
        }

    }

    /**
     * find the particular row of values by getting row number
     *
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
                    }
                }
                ++$i;
            }
            fclose($handle);
        }
    }

    /**
     * Update the particular line of row using the row number
     *
     * @param $request
     * @param $id
     * @return null
     */
    public function update($request, $id)
    {
        try {
            $i = 0;

            $tempfile = tempnam(".", "tmp");

            if (!$input = fopen($this->filename, 'r')) {
                die('could not open existing csv file');
            }

            if (!$output = fopen($tempfile, 'w')) {
                die('could not open temporary output file');
            }

            while (($data = fgetcsv($input)) !== FALSE) {
                if ($i == $id) {
                    $data = $request->except('_token', '_method');
                }
                fputcsv($output, $data);
                $i++;
            }
            fclose($input);
            fclose($output);

            unlink($this->filename);
            rename($tempfile, $this->filename);

            return $this->logger->warning("Warning logging", ['Edit' => "Employee Record Edited"]);

        } catch (\Throwable $t) {
            return $this->logger->error("Error Logging", ['Edit' => "Employee Record is not Edited" . $t]);
        }

    }

    /**
     * Delete the specific line from the csv file
     *
     * @param $id
     * @return null
     */
    public function delete($id)
    {
        try {
            $i = 0;

            $tempfile = tempnam(".", "tmp");

            if (!$input = fopen($this->filename, 'r')) {
                die('could not open existing csv file');
            }

            if (!$output = fopen($tempfile, 'w')) {
                die('could not open temporary output file');
            }

            while (($data = fgetcsv($input)) !== FALSE) {
                if ($i == $id) {
                    $data = [];
                }
                fputcsv($output, $data);
                $i++;
            }
            fclose($input);
            fclose($output);

            unlink($this->filename);
            rename($tempfile, $this->filename);

            return $this->logger->alert("Alert logging", ['Alert' => "Employee Record Deleted"]);

        } catch (\Throwable $t) {
            return $this->logger->error("Error logging", ['Error' => "Employee Record Not Deleted"]);
        }

    }

}