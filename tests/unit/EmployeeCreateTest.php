<?php

class EmployeesCreateTest extends TestCase
{

    /**
     * My test implementation
     */
    public function testCreateEmployee()
    {
        $this->visit('/employees/create');
        $this->type('hello user', 'name');
        $this->select('female', 'gender');
        $this->type('9843360551', 'phone');
        $this->type('hellouser@acd.edu.np', 'email');
        $this->type('Kathmandu Nepal', 'address');
        $this->type('Nepali', 'nationality');
        $this->type('2051-01-05', 'date_of_birth');
        $this->select('bachelor', 'education');
        $this->select('phone', 'contact_from');
        $this->press('');
        $this->seePageIs('/employees');
    }
}