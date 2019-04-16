<?php
class User
{
 private $db;

 public function __construct()
 {
  $this->db = new Database;
 }

 // Get users

 public function getUsers()
 {
  $this->db->query('SELECT *
                        FROM users
                        ');

  $results = $this->db->resultSet();

  return $results;
 }

 public function getCurrentUser($id)
 {
  $this->db->query('SELECT *
                        FROM users
                        WHERE id = :id
                        ');

  $this->db->bind(':id', $id);
  $result = $this->db->single();

  return $result;
 }

 // Register user
 public function register($data)
 {
  $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
  // Bind values
  $this->db->bind(':name', $data['name']);
  $this->db->bind(':email', $data['email']);
  $this->db->bind(':password', $data['password']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 // Login User
 public function login($email, $password)
 {
  $this->db->query('SELECT * FROM users WHERE email = :email');
  $this->db->bind(':email', $email);

  $row = $this->db->single();

  $hashed_password = $row->password;
  if (password_verify($password, $hashed_password)) {
   return $row;
  } else {
   return false;
  }
 }

 // Example d'SQL injection possible
 //  public function login($email, $password)
 //  {
 //   $this->db->find("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
 //   $row = $this->db->getsingle();
 //   if ($row) {
 //    return $row;
 //   } else {
 //    return false;
 //   }
 //  }

 // Find user by email
 public function findUserByEmail($email)
 {
  $this->db->query('SELECT * FROM users WHERE email = :email');
  // Bind value
  $this->db->bind(':email', $email);

  $row = $this->db->single();

  // Check row
  if ($this->db->rowCount() > 0) {
   return true;
  } else {
   return false;
  }
 }

// Example d'SQL injection possible
 //  public function findUserByEmail($email)
 //  {
 //   $this->db->find("SELECT * FROM users WHERE email = '$email'");
 //   $result = $this->db->getsingle();
 //   // die(print_r($result));
 //   if ($this->db->rowCount() > 0) {
 //    // wrongpassword' OR 'a'='a
 //    //  die(print_r($result));
 //    return true;
 //   } else {
 //    die('pas le bon email');
 //    return false;
 //   }
 //  }

 public function updatePassword($data)
 {
  $this->db->query('UPDATE users SET password = :password WHERE id = :user_id');
  // Bind values
  $this->db->bind(':user_id', $data['user_id']);
  $this->db->bind(':password', $data['password']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 public function updateprofile($data)
 {
  $this->db->query('UPDATE users SET name = :name, email = :email  WHERE id = :user_id');
  // Bind values
  $this->db->bind(':user_id', $data['user_id']);
  $this->db->bind(':name', $data['name']);
  $this->db->bind(':email', $data['email']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 public function updateprofilewidthImage($data)
 {
  $this->db->query('UPDATE users SET name = :name, email = :email, image = :image WHERE id = :user_id');
  // Bind values
  $this->db->bind(':user_id', $data['user_id']);
  $this->db->bind(':name', $data['name']);
  $this->db->bind(':email', $data['email']);
  $this->db->bind(':image', $data['image']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }
}
