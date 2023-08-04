<?php
include "app/repositories/UserRepository.php";
class EmployeesController {
    public function index(){
        $EmployeeRepo = new EmployeesRepository();
        $Employees = $EmployeeRepo->getAllEmployees();
        include "app/views/admin/users/index.php";
    }
}
