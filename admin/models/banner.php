<?php
class Banner {
    public $conn;

    // Constructor to establish a database connection
    public function __construct() {
        $this->conn = connectDB();
    }

    // Fetch all records from the table
    public function getAll() {
        try {
            $sql = 'SELECT * FROM banner';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Insert a new record into the table
    public function postData($tieu_de, $hinh_anh, $trang_thai) {
        try {
            $sql = 'INSERT INTO banner (tieu_de, hinh_anh, trang_thai)
             VALUES (:tieu_de, :hinh_anh, :trang_thai)';
            //  var_dump($sql);die();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Retrieve detailed information for a specific record
    public function getDetaiData($id) {
        try {
            $sql = 'SELECT * FROM banner WHERE id=:id';
            //  var_dump($sql);die();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Update an existing record
    public function updateData($id, $tieu_de, $hinh_anh, $trang_thai) {
        try {
            $sql = 'UPDATE banner SET tieu_de=:tieu_de, hinh_anh=:hinh_anh, trang_thai=:trang_thai WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Delete a specific record
    public function deleteData($id) {
        try {
            $sql = 'DELETE FROM banner WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn = null;
    }
}
?>
