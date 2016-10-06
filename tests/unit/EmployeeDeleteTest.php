<?php

class EmployeesDeleteTest extends TestCase
{

    /**
     * My test implementation
     */
    public function testDeleteEmployee()
    {
        $this->visit('/employees/');
        $this->visit('/employees/7/confirm');
        $this->press('');
        $this->seePageIs('/employees');
    }
}