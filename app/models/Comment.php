<?php
class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getComments()
    {
        $this->db->query('SELECT *,
                    comments.id as commentId,
                    chapters.id as chapterId,
                    comments_flags.id as commentflagId,
                    comments.date_added as commentDate,
                    comments_flags.date_added as flagDate
                    FROM comments
                    INNER JOIN chapters
                    ON comments.chapter_id = chapters.id
                    LEFT JOIN comments_flags
                    ON comments_flags.comment_id = comments.id
                    ORDER BY comments_flags.date_added DESC, comments.date_added DESC
                    ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCommentsbyChapterId($id)
    {
        $this->db->query('SELECT comments.*, comments.id AS commentID
                        FROM comments
                        WHERE chapter_id = :id');

        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();

        return $results;
    }

    public function addComment($data)
    {
        $this->db->query('INSERT INTO comments (chapter_id,  firstname, lastname, comment) VALUES(:chapter_id , :firstname , :lastname , :comment)');
        // Bind values
        $this->db->bind(':chapter_id', $data['chapter_id']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':comment', $data['comment']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function countComments()
    {
        $this->db->query('SELECT * FROM comments

                    ');

        $this->db->resultSet();

        $results = $this->db->rowCount();

        return $results;
    }

    // ADD FLAG
    public function addflag($data)
    {
        $this->db->query('INSERT INTO comments_flags(comment_id, flag) VALUES(:comment_id, :flag)');
        // Bind values
        $this->db->bind(':comment_id', $data['comment_id']);
        $this->db->bind(':flag', $data['flag']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // COUNT COMMENTS BY CHAPTER
    public function countCommentsbychapter($id)
    {
        $this->db->query('SELECT comments.*, chapters.id FROM comments
                        INNER JOIN chapters
                        ON comments.chapter_id = chapters.id
                        WHERE chapters.id = :id
                      ');
        $this->db->bind(':id', $id);

        $this->db->resultSet();

        $results = $this->db->rowCount();

        return $results;
    }

    public function getCommentById($id)
    {
        $this->db->query('SELECT * FROM comments WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Delete Comment
    public function deleteComment($id)
    {
        // Prepare Query
        $this->db->query('DELETE FROM comments WHERE id = :id');

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
