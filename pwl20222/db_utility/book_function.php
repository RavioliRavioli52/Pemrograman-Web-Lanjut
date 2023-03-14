<?php

function fetchBookFromDb(){
    $link = createMySQLConnection();
    $query = 'SELECT book.isbn, book.title, book.author, book.publisher, book.publisher_year, genre.name  FROM book INNER JOIN genre ON genre.id = book.genre_id';
    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $link = null;
    return $result;
}
function fetchOneBook($isbn){
    echo $isbn;
    echo gettype($isbn);
    $link = createMySQLConnection();
    $query = 'SELECT book.isbn, book.title, book.author, book.publisher, book.publisher_year, short_description, genre.name  FROM book INNER JOIN genre ON genre.id = book.genre_id WHERE book.isbn = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$isbn, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
    return $result;
}

function addNewBook($isbn, $title, $author, $publisher, $publisheryear, $description, $genre){
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = 'INSERT INTO book(isbn, title, author, publisher, publisher_year, short_description, genre_id) VALUES(?, ?, ?, ?, ?, ?, ?)';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$isbn, PDO::PARAM_STR);
    $stmt->bindParam(2,$title, PDO::PARAM_STR);
    $stmt->bindParam(3,$author, PDO::PARAM_STR);
    $stmt->bindParam(4,$publisher, PDO::PARAM_STR);
    $stmt->bindParam(5,$publisheryear, PDO::PARAM_STR);
    $stmt->bindParam(6,$description, PDO::PARAM_STR);
    $stmt->bindParam(7,$genre, PDO::PARAM_STR);
    if($stmt->execute()){
        $link->commit();
    } else{
        $link->rollBack();
    }
    $link = null;
}

function updateBookToDb($ISBN,$newTitle,$newAuthor,$newPublisher,$newPublishYear,$newShortDescription,$newGenreId){
    $result = 0;
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = 'UPDATE book SET title = ?,author = ?,publisher = ?,publisher_year = ?,short_description = ?,genre_id = ? WHERE isbn = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$newTitle,PDO::PARAM_STR);
    $stmt->bindParam(2,$newAuthor,PDO::PARAM_STR);
    $stmt->bindParam(3,$newPublisher,PDO::PARAM_STR);
    $stmt->bindParam(4,$newPublishYear,PDO::PARAM_INT);
    $stmt->bindParam(5,$newShortDescription,PDO::PARAM_STR);
    $stmt->bindParam(6,$newGenreId,PDO::PARAM_INT);
    $stmt->bindParam(7,$ISBN,PDO::PARAM_STR);
    if($stmt->execute()){
        $link->commit();
        $result = 1;
    } else{
        $link->rollBack();
    }
    $link = null;
    return $result;
}

function deleteBookToDb($isbn){
    $result = 0;
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = 'DELETE FROM book WHERE isbn = ?';
    $stmt = $link ->prepare($query);
    $stmt->bindParam(1,$isbn);
    if($stmt->execute()){
        $link->commit();
        $result = 1;
    } else{
        $link->rollBack();
    }
    $link = null;
    return $result;
}