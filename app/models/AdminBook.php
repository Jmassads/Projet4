<?php
class AdminBook
{

 private $db;

 public function __construct()
 {
  $this->db = new Database;
 }

 /**
  * getBooks
  *
  * @return void
  */
 public function getBooks()
 {
  $this->db->query('SELECT * FROM books');

  $results = $this->db->resultSet();

  return $results;
 }

 /**
  * addBook
  * Ajouter un livre sans image
  * @param mixed $data
  * @return void
  */
 public function addBook($data)
 {
  $this->db->query('INSERT INTO books (title, summary, genre) VALUES(:title, :summary, :genre)');
  // Bind values
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':summary', $data['summary']);
  $this->db->bind(':genre', $data['genre']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }

 }

 /**
  * addBookWithImage
  * Ajouter un livre avec une image
  * @param mixed $data
  * @return void
  */
 public function addBookWithImage($data)
 {
  $this->db->query('INSERT INTO books (title, summary, genre, image) VALUES(:title, :summary, :genre, :image)');
  // Bind values
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':summary', $data['summary']);
  $this->db->bind(':genre', $data['genre']);
  $this->db->bind(':image', $data['image']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 /**
  * getBookById
  *
  * @param mixed $id
  * @return void
  */
 public function getBookById($id)
 {
  $this->db->query('SELECT * FROM books WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;

 }

 /**
  * updateBook
  * Modifier un livre sans changer l'image
  * @param mixed $data
  * @return void
  */
 public function updateBook($data)
 {
  $this->db->query('UPDATE books SET title = :title, summary = :summary WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':summary', $data['summary']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 /**
  * updateBookWithImage
  * Modifier un livre avec image
  * @param mixed $data
  * @return void
  */
 public function updateBookWithImage($data)
 {
  $this->db->query('UPDATE books SET title = :title, summary = :summary, image = :image WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':summary', $data['summary']);
  $this->db->bind(':image', $data['image']);

  // Execute
  if ($this->db->execute()) {
   return true;
  } else {
   return false;
  }
 }

 public function countBooks()
 {
  $this->db->query('SELECT * FROM books

                      ');

  $this->db->resultSet();

  $results = $this->db->rowCount();

  return $results;
 }

 // Delete Chapter
 public function deleteBook($id)
 {
  // Prepare Query
  $this->db->query('DELETE FROM books WHERE id = :id');

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
