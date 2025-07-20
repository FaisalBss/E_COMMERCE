<?php 
require_once __DIR__ . '/../classes/User.php';



class valid {

  private function readUserFile() {
    if (!file_exists($this->userfile)) return [];
    return file($this->userfile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

  private $userfile = __DIR__ . '/../data/User_info.txt';

    public function valid_uname($username) {
        if (!file_exists($this->userfile)) return false;

    $lines = $this->readUserFile();
    foreach ($lines as $line) {
        $parts = explode('|', $line);
        if ($parts[2] === $username) {
            return true;
        }
    }
    return false;
  }

    public function getUserId() {
        if (!file_exists($this->userfile)) return 1;

        $lines = file($this->userfile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $lastLine = end($lines);
        if (!$lastLine) return 1;

        $parts = explode('|', $lastLine);
        return (int)$parts[0] + 1;
    }
  
  public function validation($name, $username, $password , $age , $confirm) {
if ($_SERVER["REQUEST_METHOD"] === "POST") { 

  if (empty($username) || empty($password)|| empty($name) || empty($age)|| empty($confirm)) {

    return "fill all the fileds please";
} 
  if($this->valid_uname($username)){
    
    return "Username is already taken";
} 
  if (strlen($password) < 8 || strlen($password) > 15) {
  
    return "Password must be between 8 and 15 characters.";
} 
  if($password !== $confirm) {  
    
    return "password and confirm password does not match";
}
  if(!is_numeric($age) || $age < 10) {
    
    return "age must be more than 10";
}
    
}
  $id = $this->getUserId();
  $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        
    $user = new User($id, $name, $username, $hashPassword, $age);
    file_put_contents($this->userfile, $user->toFileFormat(), FILE_APPEND);

      return true;
}

 public function validate_login($username, $password) {

  $lines = $this->readUserFile();

  foreach ($lines as $line) {
    $parts = explode('|', $line);

    if ($parts[2] === $username) {
      $hashedPassword = $parts[3];

      if (password_verify($password, $hashedPassword)) {
        return true;
} else{
        return false;
      }
    }
  }
}

public function getUserIdFromFile($username) {
    if (!file_exists($this->userfile)) return 0;

    $lines = $this->readUserFile();
    foreach ($lines as $line) {
      $parts = explode('|', $line);
      if (count($parts) >= 3 && $parts[2] === $username) {
        return $parts[0];
      }
    }
    return 0;
  }

}