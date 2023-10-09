<?php
  declare(strict_types = 1);

  class Department {
    public int $id;
    public string $department_name;

    public function __construct(int $id, string $department_name)
    {
      $this->id = $id;
      $this->department_name = $department_name;
    }

    function UpdateDepartmentById(PDO $db, int $id)
    {
        try{

            $department = $this->getDepartmentById($db, $id);
            $stmt = $db->prepare('
            UPDATE Department SET department_name = ?
            WHERE id = ?
          ');
    
          $stmt->execute(array($department->department_name, $department->id));

        } catch(PDOException $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
       
    }

    function DeleteDepartmentById(PDO $db, int $id)
    {
        try {

            $stmt = $db->prepare('
            Delete FROM Department
            WHERE id = ?
          ');

            $stmt->execute([$id]);

        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    
    static function getAllDepartments(PDO $db) : array {
      $stmt = $db->prepare('
        SELECT id, department_name
        FROM Department;
      ');

      $stmt->execute();

      $departments = array();
  
      while($department = $stmt->fetch()){
        $departments[] = new Department(
          intval($department['id']),
          $department['department_name']
        );
      }
      return $departments;
    }
    public static function getUserDepartments(PDO $db, int $user_id) : array {
        $stmt = $db->prepare('
          SELECT user_id, id
          FROM Department d
          inner join Departments_Users as du on du.id=d.id
          inner join User as u on u.user_id=du.user_id
          WHERE u.user_id = ?;
        ');
        
  
        $stmt->execute(array($user_id));
  
        $departments = array();
    
        while($department = $stmt->fetch()){
          $departments[] = new Department(
            $department['id'],
            $department['department_name']
          );
        }
        return $departments;
      }


      public static function getDepartmentById(PDO $db, int $id) : Department {
        $stmt = $db->prepare('
          SELECT id, department_name
          FROM Department
          WHERE id = ?
        ');
        $stmt->execute(array($id));
        $department = $stmt->fetch();
        
        return new Department(
          intval($department['id']),
          $department['department_name']
        );
      }

      static function getDepartmentsByUserId(PDO $db, int $userId) : array {
        $stmt = $db->prepare('SELECT id, department_name
        FROM Department
        WHERE UserId = ? ');

        $stmt->execute(array($userId));
        $departments = array();

        while($department = $stmt->fetch()){
            $departments[] = new Department(
                $department['id'],
                $department['department_name'],
            );
        }
        return $departments;
      }
  }
?>