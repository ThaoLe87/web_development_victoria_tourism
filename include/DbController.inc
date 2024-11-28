<?php
//set error display to show
ini_set('display_errors', 1);
error_reporting(E_ALL);
class DbController {
    private $conn;
    public function __construct($host, $user, $pass, $db)
    {
        $this->conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_errno) {
            exit('Connection failed');
        }
        else {
            echo ''.PHP_EOL;
        }
    
        return $this->conn;
    }
    public function cleanUp($value)
    {
        $value = trim($value);
        return $value;
    }

    public function insertQuery ($sql, $name, $venue, $topic, $details, $photo) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $venue, $topic, $details, $photo);
            $stmt->execute();
            return $stmt->affected_rows;
        } catch (Throwable $th) {
            $this->logError($this->conn->error);
            exit("An error occurred");
        }
        /*$stmt->bind_param("sssss", $name, $venue, $topic, $details, $photo);
        $stmt->execute();
        return $stmt->affected_rows;*/
    }

    private function logError($error) {
        error_log("SQL Error: $error".PHP_EOL, 3, "logs/my-errors.log");
        exit ("OOPs something went wrong");
    }

    public function uploadImage($temp, $dest) {
        if (move_uploaded_file($temp, $dest)) {
            echo "Image moved to folder";
        } else {
            echo "Image not moved to folder";
        }
    }


    public function getRecords($sql) {
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc() ) {
            $resultset[] = $row;
    }
    return $resultset;
    }

    public function deleteRecord($sql, $id)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function updateRecord($sql, $name, $venue, $topic, $details, $id)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("ssssi",$name, $venue, $topic, $details, $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }




}


    

?>