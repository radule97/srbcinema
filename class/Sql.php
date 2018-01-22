<?php
class Sql {
	protected $conn;
	function __construct ($host = '127.0.0.1', $user = 'root', $password = '', $database = 'srbcinema', $port = '3306', $socket = '') {

		$this->conn = mysqli_connect($host, $user, $password, $database, $port, $socket);


		if (!$this->conn) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			die();
		}
	}

    /**
     * @param $id
     * @param $tableName
     * @return null|object|stdClass
     *
     */
	public function findById($id, $tableName){
        $connection = $this->getConn();
//		$sql = "SELECT * FROM {$connection->real_escape_string($tableName)} WHERE id={intval($id)}";
//        if ($connection->query($sql) === TRUE) {
//
//        }
        $id = intval($id);
        $ret = NULL;
        $tableName = \mysqli_real_escape_string($connection,$tableName);

        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT * FROM $tableName WHERE id=$id LIMIT 1")) {
            $ret = $result->fetch_object();
            /* free result set */
            mysqli_free_result($result);
        }

        return $ret;
	}

    /**
     * @param $columnName
     * @param $columnValue
     * @param $tableName
     * @return array
     */
	public function findByColumnName($columnName, $columnValue, $tableName){
        $connection = $this->getConn();
        $columnName =  \mysqli_real_escape_string($connection,$columnName);
        if (is_string($columnValue)) {
            $columnValue = '"' . \mysqli_real_escape_string($connection,$columnValue) . '"';
        }

        $ret = array();
        $tableName = \mysqli_real_escape_string($connection,$tableName);

        if ($result = mysqli_query($connection, "SELECT * FROM $tableName WHERE $columnName=$columnValue")) {
            while ($row = $result->fetch_object()){
                $ret[] = $row;
            }
            /* free result set */
            mysqli_free_result($result);
        }

        return $ret;
	}

    /**
     * @param $limit
     * @param $offset
     * @param $tableName
     * @return array
     */
    public function findAll($tableName, $limit = '', $offset = '', $search = '') {
        $connection = $this->getConn();
        //		$sql = "SELECT * FROM {$connection->real_escape_string($tableName)} WHERE id={intval($id)}";
        //        if ($connection->query($sql) === TRUE) {
        //
        //        }
        $limit = $limit ? 'LIMIT ' . intval($limit) : '';
        $offset = $offset ? 'OFFSET ' . intval($offset) : '';
        $ret = array();
        $tableName = \mysqli_real_escape_string($connection,$tableName);
        $where = '1=1';
        if ($search) {
            $search = \mysqli_real_escape_string($connection,$search);
            $where = ' name LIKE "%'.$search.'%" OR description  LIKE "%'.$search.'%" ';
        }
        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT * FROM $tableName WHERE $where $limit $offset")) {
            while ($row = $result->fetch_object()){
                $ret[] = $row;
            }
            /* free result set */
            mysqli_free_result($result);
        }

        return $ret;
    }
    /*FOR NOVO*/
    /*1*/
    public function findAllNovo($tableName, $limit = '', $offset = '', $search = '') {
        $connection = $this->getConn();
        //		$sql = "SELECT * FROM {$connection->real_escape_string($tableName)} WHERE id={intval($id)}";
        //        if ($connection->query($sql) === TRUE) {
        //
        //        }
        $limit = $limit ? 'LIMIT ' . intval($limit) : '';
        $offset = $offset ? 'OFFSET ' . intval($offset) : '';
        $ret = array();
        $tableName = \mysqli_real_escape_string($connection,$tableName);
        $novo = intval("1");
        if ($search) {
            $search = \mysqli_real_escape_string($connection,$search);
            $where = ' name LIKE "%'.$search.'%" OR description  LIKE "%'.$search.'%" ';
        }
        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT * FROM $tableName WHERE novo=$novo $limit $offset")) {
            while ($row = $result->fetch_object()){
                $ret[] = $row;
            }
            /* free result set */
            mysqli_free_result($result);
        }

        return $ret;
    }
    /*2*/
    public function countAllNovo($tableName){
        $connection = $this->getConn();


        $ret = NULL;
        $tableName = \mysqli_real_escape_string($connection,$tableName);
		$novo = intval("1");
        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT COUNT(*) FROM $tableName WHERE novo=$novo")) {
            $row = $result->fetch_row();
            $ret = $row[0];
            mysqli_free_result($result);
        }

        return $ret;
    }
    /*END NOVO*/

    /*FOR POPULARNO*/
    /*1*/
    public function findAllPopularno($tableName, $limit = '', $offset = '', $search = '') {
        $connection = $this->getConn();
        //		$sql = "SELECT * FROM {$connection->real_escape_string($tableName)} WHERE id={intval($id)}";
        //        if ($connection->query($sql) === TRUE) {
        //
        //        }
        $limit = $limit ? 'LIMIT ' . intval($limit) : '';
        $offset = $offset ? 'OFFSET ' . intval($offset) : '';
        $ret = array();
        $tableName = \mysqli_real_escape_string($connection,$tableName);
        $popularno = intval("1");
        if ($search) {
            $search = \mysqli_real_escape_string($connection,$search);
            $where = ' name LIKE "%'.$search.'%" OR description  LIKE "%'.$search.'%" ';
        }
        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT * FROM $tableName WHERE popularno=$popularno $limit $offset")) {
            while ($row = $result->fetch_object()){
                $ret[] = $row;
            }
            /* free result set */
            mysqli_free_result($result);
        }

        return $ret;
    }
    /*2*/
    public function countAllPopularno($tableName){
        $connection = $this->getConn();


        $ret = NULL;
        $tableName = \mysqli_real_escape_string($connection,$tableName);
        $popularno = intval("1");
        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT COUNT(*) FROM $tableName WHERE popularno=$popularno")) {
            $row = $result->fetch_row();
            $ret = $row[0];
            mysqli_free_result($result);
        }

        return $ret;
    }
    /*END POPULARNO*/


    /**
     * @param $limit
     * @param $offset
     * @param $tableName
     * @return array
     */
    public function countAll($tableName){
        $connection = $this->getConn();

        $ret = NULL;
        $tableName = \mysqli_real_escape_string($connection,$tableName);

        /* Select queries return a resultset */
        if ($result = mysqli_query($connection, "SELECT COUNT(*) FROM $tableName WHERE 1=1")) {
            $row = $result->fetch_row();
            $ret = $row[0];
            mysqli_free_result($result);
        }

        return $ret;
    }


    public function insert($tableName = '', $data= array()) {
		$conn = $this->getConn();
		$colArray = array_keys($data);
		$colKeys = implode(', ', $colArray);
		array_walk($data, function(&$val, $key, $connection){
			if (is_string($val)) {
				$val = "'{$connection->real_escape_string($val)}'";
			}
		}, $conn);

		//$mysqli->real_escape_string($city);
		$colValues = implode (', ', $data);
		$sql = "INSERT INTO $tableName ($colKeys) VALUES ($colValues)";

		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
			$ret = TRUE;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			$ret = FALSE;
		}
		return $ret;
	}

	/**
	 * @param string $tableName
	 * @param array $data
	 * @param string $where
	 * @return bool
	 */
public function update($tableName = '', $data = array(), $where ='1=1') {
		$conn = $this->getConn();
		$setArray = array();
		array_walk($data, function(&$val, $key, $connection){
			if (is_string($val)) {
				$val = "'{$connection->real_escape_string($val)}'";
			}
		}, $conn);

		foreach ($data as $key => $val) {
			$setArray[] = "$key = $val";
		}
		$setStr = implode(', ', $setArray);

		$sql = "UPDATE $tableName SET $setStr WHERE $where";

		if ($conn->query($sql) === TRUE) {
		//	echo "Record updated successfully";
			$ret = TRUE;
		} else {
			echo "Error updating record: " . $conn->error;
			$ret = FALSE;
		}
		return $ret;

	}

	/**
	 * @param string $tableName
	 * @param string $where
	 * @return bool
	 */
	public function delete($tableName = '', $where = '') {
		$conn = $this->getConn();
		$sql = "DELETE FROM $tableName WHERE $where";

		if ($conn->query($sql) === TRUE) {
		//	echo "Record deleted successfully";
			$ret = TRUE;
		} else {
			echo "Error deleting record: " . $conn->error;
			$ret = FALSE;
		}
		return $ret;

	}

	/**
	 * @return mysqli
	 */
	public function getConn() {
		return $this->conn;
	}

	/**
	 * @param mysqli $conn
	 */
	public function setConn($conn) {
		$this->conn = $conn;
	}
	function __destruct() {
		$this->getConn()->close();
	}
}

?>
