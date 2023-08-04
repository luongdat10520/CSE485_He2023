<?php
class Employee {

    private $employees_id;
    private $employees_name;
    private $address;
    private $salary;



    public function __construct($employees_id, $employees_name,$address,$salary)
    {
        $this->employees_id = $employees_id;
        $this->employees_name = $employees_name;
        $this->address = $address;
        $this->salary = $salary;
    }

    /**
     * @param $employees_id
     * @param $employees_name
     * @param $address
     * @param $salary
     */


    /**
     * @return mixed
     */
    public function getEmployeesId()
    {
        return $this->$employees_id;
    }

    /**
     * @param mixed $employees_id
     */
    public function setEmployeesId($employees_id): void
    {
        $this->employees_id = $employees_id;
    }

    /**
     * @return mixed
     */
    public function getEmployeesname()
    {
        return $this->$employees_name;
    }

    /**
     * @param mixed $employees_name
     */
    public function setEmployeesname($employees_name): void
    {
        $this->employees_name = $employees_name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }


}
