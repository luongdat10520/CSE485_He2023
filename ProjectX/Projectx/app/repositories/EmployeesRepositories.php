<?php
include "lib/DBConnection.php";
include "app/models/Employees.php";
class EmployeesRepository{

    public function getAllEmployees(){
        try {
            $db = new DBConnection();
            $conn = $db->connect();

            $sql = "SELECT * FROM employees";
            $stmt = $conn->prepare($sql); 
            $stmt->execute(); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();

            $employees = [];
            foreach($result as $row) {
                $employee = new employee();
                $employee->setEmployeesId($row['employees_id']);
                $employee->setEmployeesname($row['employees_name']);
                $employee->setAddress($row['address']);
                $employee->setSalary($row['salary']);
                array_push($employees, $employee);
            }
            return $employees;
        } catch(PDOException $e) {
            return null;
        }
    }

//     public function getUserById($id){
//         //Mật khẩu lưu THÔ, chưa băm trong CSDL
//         //Kết nối tới CSDL: MySQLi procedural, MySQLi OOP, PDO*
//         //1. Kết nối DB Server
//         try {
//             $db = new DBConnection();
//             $conn = $db->connect();
//             //2. Thực hiện truy vấn
//             $sql = "SELECT * FROM users wHERE user_id=?";
// //            $sql = "SELECT username FROM users WHERE email=:e AND password=:p";
//             $stmt = $conn->prepare($sql); //Chuẩn bị thực hiện câu này
//             $stmt->bindParam(1,$id,PDO::PARAM_STR);
//             $stmt->execute(); //Thực thi đi >>> Nếu có kết quả trả về, nó sẽ lưu vào #stmt
//             //3. Xử lý kết quả (SELECT/INSERT-UPDATE-DELETE)
//             $stmt->setFetchMode(PDO::FETCH_ASSOC);
//             //            $result = $stmt->fetch(); >> Chỉ lấy ra 1 bản ghi mỗi lần chạy
//             $row = $stmt->fetch(); //>> Lấy ra tất cả >>> Mảng các Mảng
//             //            Chuyển đổi Bản ghi (Mảng thông thường) sang Đối tượng: Post
//                 $user = new User();
//                 $user->setUserId($row['user_id']);
//                 $user->setEmail($row['email']);
//                 $user->setPassword($row['password']);
//                 $user->setUsername($row['username']);
//                 $user->setCreatedAt($row['created_at']);
//                 $user->setBio($row['bio']);
//                 $user->setProfilePicture($row['profile_picture']);
//                 $user->setUpdatedAt($row['updated_at']);
//                 return $user;
//         } catch(PDOException $e) {
//             return null;
//         }
//     }
}