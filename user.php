<?php
// user.php

class User{

	protected $db;

    public function __construct($db_connection){
        $this->db = $db_connection;
    }
	
	// SIGNUP USER
    function signup()
    {
		//If user submit the signup form 
		if(isset($_POST['signup']))
		{
			$con = mysqli_connect("localhost","root","","frnd_req_system");
		
			$name = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$image = $_POST['file'];
			$country = $_POST['country'];
		
			$encpass = password_hash($password, PASSWORD_BCRYPT);
			$userrandomid = rand(999999, 111111);		
						
			$sql_u = "SELECT * FROM users WHERE username='$name'";
			$sql_e = "SELECT * FROM users WHERE user_email ='$email'";
			$res_u = mysqli_query($con, $sql_u);
			$res_e = mysqli_query($con, $sql_e);

			if (mysqli_num_rows($res_u) > 0) {
				if(mysqli_num_rows($res_e) > 0)
				{
					$_SESSION['status'] = "Your Name or Email is Already Exists!";
				}
				else
				{
					mysqli_query($con, "INSERT INTO users (id, username, user_email, user_password, user_gender, user_age, user_image, user_country) VALUES('$userrandomid', '$name','$email','$encpass', '$gender','$age', '$image', '$country')");
				}
				
			}
			else
			{
				mysqli_query($con, "INSERT INTO users (id, username, user_email, user_password, user_gender, user_age, user_image, user_country) VALUES('$userrandomid', '$name','$email','$encpass', '$gender','$age', '$image', '$country')");
			
			}
           
			header('Location: signup.php');
		}
	}

    // LOGIN USER
    function loginUser($email, $password)
    {

        try {
            $this->user_email = trim($email);
            $this->user_pass = trim($password);

            $find_email = $this->db->prepare("SELECT * FROM `users` WHERE user_email = ?");
            $find_email->execute([$this->user_email]);

            if ($find_email->rowCount() === 1) {
                $row = $find_email->fetch(PDO::FETCH_ASSOC);

                $match_pass = password_verify($this->user_pass, $row['user_password']);
                if ($match_pass) {
                    $_SESSION = [
                        'user_id' => $row['id'],
                        'email' => $row['user_email']
                    ];
                    header('Location: profile.php');
                } else {
                    return ['errorMessage' => 'Invalid password'];
                }
            } else {
                return ['errorMessage' => 'Invalid email address!'];
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // FIND USER BY ID
    function find_user_by_id($id)
    {
        try {
            $find_user = $this->db->prepare("SELECT * FROM `users` WHERE id = ?");
            $find_user->execute([$id]);
            if ($find_user->rowCount() === 1) {
                return $find_user->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    function all_users($id)
    {
        try {
            $get_users = $this->db->prepare("SELECT id, username, user_image, user_gender, user_age, user_country FROM `users` WHERE id != ?");
            $get_users->execute([$id]);
            if ($get_users->rowCount() > 0) {
                return $get_users->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}