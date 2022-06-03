<?php
namespace Phppot;

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource1.php';
        $this->ds = new DataSource();
    }

    /**
     * to check if the username already exists
     *
     * @param string $leadname
     * @return boolean
     */
    public function isLeadnameExists($leadname)
    {
        $query = 'SELECT * FROM team where leadname = ?';
        $paramType = 's';
        $paramValue = array(
            $leadname
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function isMembernameExists($membername)
    {
        $query = 'SELECT * FROM team where membername = ?';
        $paramType = 's';
        $paramValue = array(
            $membername
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the email already exists
     *
     * @param string $leademail
     * @return boolean
     */
    public function isLeadEmailExists($leademail)
    {
        $query = 'SELECT * FROM team where leademail = ?';
        $paramType = 's';
        $paramValue = array(
            $leademail
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function isMemberEmailExists($memberemail)
    {
        $query = 'SELECT * FROM team where memberemail = ?';
        $paramType = 's';
        $paramValue = array(
            $memberemail
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to signup / register a user
     *
     * @return string[] registration status message
     */
    public function registerMember()
    {
        $IsLeadnameExists = $this->isLeadnameExists($_POST["leadname"]);
        $IsMembernameExists = $this->isMembernameExists($_POST["membername"]);
        $IsLeadEmailExists = $this->isLeadEmailExists($_POST["leademail"]);
        $IsMemberEmailExists = $this->isMemberEmailExists($_POST["memberemail"]);
        if ($IsLeadnameExists) {
            $response = array(
                "status" => "error",
                "message" => "Leadname already exists."
            );
        } else if ($IsMembernameExists) {
            $response = array(
                "status" => "error",
                "message" => "Membername already exists."
            );
        } else if ($IsLeadEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Email already exists."
            );
        } else if ($IsMemberEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Email already exists."
            );
        }else {
            if (! empty($_POST["signup-password"])) {

                // PHP's password_hash is the best choice to use to store passwords
                // do not attempt to do your own encryption, it is not safe
                $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
            }
            $query = 'INSERT INTO team (leadname, membername, leademail, memberemail, password) VALUES (?, ?, ?, ?, ?)';
            $paramType = 'sssss';
            $paramValue = array(
                $_POST["leadname"],
                $_POST["membername"],
                $_POST["leademail"],
                $_POST["memberemail"],
                $hashedPassword 
            );
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (! empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "You have registered successfully."
                );
            }
        }
        return $response;
    }

    public function getMember($leademail)
    {
        $query = 'SELECT * FROM team where leademail = ?';
        $paramType = 's';
        $paramValue = array(
            $leademail
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    /**
     * to login a user
     *
     * @return string
     */
    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["leademail"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            session_start();
            $_SESSION["leademail"] = $memberRecord[0]["leademail"];
            session_write_close();
            $url = "./home1.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Invalid email or password.";
            return $loginStatus;
        }
    }
}
