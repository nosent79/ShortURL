<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-14
 * Time: 오후 4:51
 */
    include_once "config/config.php";

    class Database
    {
        private $host      = DB_HOST;
        private $user      = DB_USER;
        private $pass      = DB_PASS;
        private $dbname    = DB_NAME;

        private $dbh;
        private $error;

        public function __construct()
        {
            // Set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            // Set options
            $options = [
                PDO::ATTR_PERSISTENT    => true,
                PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
            ];

            // Create a new PDO instanace
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            }
                // Catch any errors
            catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }

        public function getConnection()
        {
            return $this->dbh;
        }

        public function getDisConnection()
        {
            $this->dbh = null;
        }

        public function url_exist($alias)
        {
            $sql = "select url from tbl_short_url where alias=:alias";

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":alias", $alias);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$result) {
                return null;
            }

            return $result->url;
        }
    }

//    try {
//        $conn = new PDO("mysql:host=DB_HOSTNAME;dbname=DB_NAME", DB_USERNAME, DB_PASSWORD);
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        echo "Connected successfully";
//    } catch (PDOException $e) {
//        echo "Connection failed: " . $e->getMessage();
//    } catch (Exception $e) {
//        echo "Error";
//    }
//
//
//    $conn = null;
