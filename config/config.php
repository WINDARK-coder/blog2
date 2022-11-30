<?php
class database
{
    private $host = "localhost";
    private $username = "telman";
    private $password = "563289jmdatw";
    private $db_name = "div_blog2";
    private $result = array();
    public $mysqli = '';
    public $que;
    public $newname = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->mysqli->connect_error) {
            echo "Failed to connect";
        } else {
            return $this->mysqli;
        }
    }
    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);
    }

    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";

        $result = $this->mysqli->query($sql);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";
        $sql;
        $result = $this->mysqli->query($sql);
    }

    public $sql;

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function uploadFile($tag, $directory, $filename)
    {
        $extension = pathinfo($_FILES[$tag]["name"], PATHINFO_EXTENSION);
        $this->newname = "newimage" . rand(00000, 99999) . ".$extension";
        $target_file =  $directory . $filename . $this->newname;
        move_uploaded_file($_FILES[$tag]["tmp_name"], $target_file);
        return $this->newname;
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
$database = new database();
$db = $database->mysqli;
