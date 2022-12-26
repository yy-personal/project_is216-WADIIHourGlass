<?php

require_once 'ConnectionManager.php';

class AccountDAO {

    public function getPassword($email) {

        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        // Step 2 - Prepare SQL
        $sql = "SELECT
                    password
                FROM
                    user
                WHERE
                    email = :email
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        // Step 3 - Execute SQL
        $password = null;
        
        if( $stmt->execute() ) {

            // Step 4 - Retrieve Query Results
            if( $row = $stmt->fetch() ) {
                $password = $row['password'];
            }
        }
        
        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;

        // Step 6 - Return
        return $password;   // str or null
    }

    public function register($email, $name, $password) {

        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        // Step 2 - Prepare SQL
        $sql = "INSERT INTO user (email, name, password) VALUES (
                    :email, :name, :password
                )
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        // Step 3 - Execute SQL
        $result = $stmt->execute();
        
        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;

        // Step 6 - Return
        return $result;
    }
    public function getUserName($email){
        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        // Step 2 - Prepare SQL
        $sql = "SELECT name FROM user WHERE email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        // Step 3 - Execute SQL
        $name ='';
        if( $stmt->execute() ) {

            // Step 4 - Retrieve Query Results
            if( $row = $stmt->fetch() ) {
                $name = $row['name'];
            }
        }        

        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;

        // Step 6 - Return
        return $name;
    }
    public function getUserEmail($email){
        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        // Step 2 - Prepare SQL
        $sql = "SELECT email FROM user WHERE email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        // Step 3 - Execute SQL
        $user ='';
        if( $stmt->execute() ) {

            // Step 4 - Retrieve Query Results
            if( $row = $stmt->fetch() ) {
                $user = $row['email'];
            }
        }        

        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;

        // Step 6 - Return
        return $user;
    }
    
}

?>