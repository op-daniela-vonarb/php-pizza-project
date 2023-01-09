<?php

// Do I need to write all db functions in here? e.g. delete, add...

class Dbh {

	private static $_inst;

	private $host;

	private $dbname;

	private $username;

	private $password;

	public function __construct($host, $dbname, $username, $password)
	{
		$this->host = $host;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;
	}

	private $connection;

    protected function connect() {
        try {
            $this->connection = new PDO(
				"mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password
			);
            return $this->connection;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

	public function deleteById($table, $id) {
		$stmt = $this->query("DELETE FROM  $table where id = ?", [$id]); // why [$id]?
		return $stmt->rowCount();
	}

	public function fetchById($table, $id) {
		$records = $this->fetchAll("SELECT * FROM $table where id = ?", [$id]);
		if (count($records)) {
			return $records[0];
		}
		return null;
	}

	public function fetchAll($sql, $params = []) {
		$stmt = $this->query($sql, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function query($sql, $params = []) {
		$stmt = $this->connection->prepare($sql);
		$stmt->execute($params);
		return $stmt;
	}

	public static function inst() // I don't really understand this
	{
		global $settings; // why global? Is this coming from settings.php?

		if (!self::$_inst) {
			self::$_inst = new self($settings['db_host'], $settings['db_name'], $settings['db_user'], $settings['db_password']);
			self::$_inst->connect();
		}
		return self::$_inst;
	}

}