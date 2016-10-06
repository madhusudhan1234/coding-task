<?php

class EmployeesEditTest extends TestCase
{

    /**
     * My test implementation
     */
    public function testEditEmployee()
    {
        $this->visit('/employees/2/edit');
        $this->type('Alina Shrestha', 'name');
        $this->select('female', 'gender');
        $this->type('9847789441', 'phone');
        $this->type('alina@acd.edu.com', 'email');
        $this->type('Toukhel Nepal', 'address');
        $this->type('Nepalii', 'nationality');
        $this->type('2051-01-01', 'date_of_birth');
        $this->select('master', 'education');
        $this->select('none', 'contact_from');
        $this->press('');
        $this->seePageIs('/employees');
    }
}