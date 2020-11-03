<?php
session_start();
require_once 'KLogger.php';

class Dao
{
    private $host = "ec2-3-208-224-152.compute-1.amazonaws.com";
    private $port = "5432";
    private $db = "dd2ob0d45iut9g";
    private $user = "ruiivgkvshqunx";
    private $pass = "ca62e39c4528e39cec13e9673956964207eaa69acd260b38c352e020b9a1a38f";
    private $logger;

    public function __construct()
    {
        $this->logger = new KLogger ("log.txt", KLogger::DEBUG);
    }

    public function getConnection()
    {
        $this->logger->LogDebug("Trying connect to database");
        try {
            $conn = new PDO("pgsql:host={$this->host};port={$this->port};dbname={$this->db};user={$this->user};password={$this->pass}");
            $this->logger->LogDebug("Connected to database successfully");
            return $conn;
        } catch (Exception $e) {
            //echo print_r($e,1);
            $this->logger->LogFatal("Fail connecting to database: " . print_r($e, 1));
            exit;
        }
    }


    public function addUser($name, $email, $password)
    {
        $this->logger->LogInfo("Trying to create a user");
        $conn = $this->getConnection();
        $this->logger->LogInfo("Connection established");
        $checkQuery = "select id from users where email = :email or username = :name";
        $cq = $conn->prepare($checkQuery);
        $cq->bindParam(":email", $email);
        $cq->bindParam(":name", $name);
        $cq->execute();
        if ($cq->rowCount() == 0) {
            $this->logger->LogInfo("User with this email or username does not exist. Creating a new username.");
            $phash = password_hash($password, PASSWORD_DEFAULT);
            $saveQuery = "insert into users (username, password_hash, email) values (:username, :phash, :email)";
            $sq = $conn->prepare($saveQuery);
            $sq->bindParam(":email", $email);
            $sq->bindParam(":username", $name);
            $sq->bindParam(":phash", $phash);
            if ($sq->execute()) {
                $id = $conn->lastInsertId();
                $this->logger->LogInfo("User successfully created with id: {$id}");
                return $id;
            } else {
                return false;
            }
        } else {
            $_SESSION['errors'][] = "User with same username or email already exists.";
            return false;
        }
    }

    public function verifyUser($email, $password)
    {
        $conn = $this->getConnection();
        $this->logger->LogInfo("Verifying user for {$email}");
        $getUserQuery = "select id, username, password_hash from users where email = :email";
        $gu = $conn->prepare($getUserQuery);
        $gu->bindParam(":email", $email);
        $gu->execute();
        if ($gu->rowCount() == 1) {
            $this->logger->LogInfo("User found, verifying password for {$email}");
            $res = $gu->fetch();
            if (password_verify($password, $res['password_hash'])) {
                return $res;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

}