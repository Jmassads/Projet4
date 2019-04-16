<?php
class AdminChapter
{
 private $db;

 public function __construct()
 {
  $this->db = new Database;
 }

 public function getChapters()
 {
  $this->db->query('SELECT * FROM chapters');

  $results = $this->db->resultSet();

  return $results;
 }

 public function addChapterWithImage($data)
 {
  $this->db->query('INSERT INTO chapters (title, body, image) VALUES(:title, :body, :image)');
  // Bind values
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':body', $data['body']);
  $this->db->bind(':image', $data['image']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 // Par défaut, PDO va appliquer un filtre pour vérifier le type du paramètre et utiliser sa fonction interne pour le "quote" de façon appropriée pour éviter la plupart des injections SQL. Il va au besoins échapper les caractères spéciaux selon les réglages du pilote PDO actif.

 // Par défaut, PDO va échapper les caractères dangereux (', ", ;, \, etc) avec les anti-slashs lorsque nécessaire dans la requête.

 // Un exemple de faille : (toutes les variables utilisateur qui sont présentes dans la chaîne de caractères donnée en paramètre à PDO::prepare() peuvent causer une injection SQL)

 // $stmt = $pdo->prepare("SELECT * FROM membres WHERE pseudo = $pseudo");
 // $stmt->execute();

 public function addChapter($data)
 {
  $this->db->query('INSERT INTO chapters (title, body) VALUES(:title, :body)');
  // Bind values
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':body', $data['body']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 public function getChapterById($id)
 {
  $this->db->query('SELECT * FROM chapters WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;
 }

 public function updateChapter($data)
 {
  $this->db->query('UPDATE chapters SET title = :title, body = :body WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':body', $data['body']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 public function updateChapterWithImage($data)
 {
  $this->db->query('UPDATE chapters SET title = :title, body = :body, image = :image WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':body', $data['body']);
  $this->db->bind(':image', $data['image']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 public function countChapters()
 {
  $this->db->query('SELECT * FROM chapters');

  $this->db->resultSet();

  $results = $this->db->rowCount();

  return $results;
 }

 // Delete Chapter
 public function deleteChapter($id)
 {
  // Prepare Query
  $this->db->query('DELETE FROM chapters WHERE id = :id');

  // Bind Values
  $this->db->bind(':id', $id);

  //Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }
}
