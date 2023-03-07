<?php
$submitPressed = filter_input(INPUT_POST, 'btnSave');
if (isset($submitPressed)){
    $isbn = filter_input(INPUT_POST, 'txtisbn');
    $title = filter_input(INPUT_POST, 'txttitle');
    $author = filter_input(INPUT_POST, 'txtauthor');
    $publisher = filter_input(INPUT_POST, 'txtpublisher');
    $publisheryear = filter_input(INPUT_POST, 'txtpublisheryear');
    $description = filter_input(INPUT_POST, 'description');
    $genre = filter_input(INPUT_POST, 'genre');
    if(trim($isbn) == '' || trim($title) == '' || trim($author) == '' || trim($publisher) == '' || trim($publisheryear) == '' || trim($genre == ''  || trim($description == ''))){
        echo '<div>Please provide with a  valid name </div>';
    } else{
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
    }
    $link = null;
}
?>

<h1 class="text-center">Available Book</h1>


<form method="post" action="">
    <label for="txtName">ISBN</label>
    <input type="text" maxlength="45" placeholder="Isbn" required autofocus name="txtisbn" id="txtisbn"><br>
    <label for="txtName">Title</label>
    <input type="text" maxlength="45" placeholder="Title" required autofocus name="txttitle" id="txttitle"><br>
    <label for="txtName">Author</label>
    <input type="text" maxlength="45" placeholder="Author" required autofocus name="txtauthor" id="txtauthor"><br>
    <label for="txtName">Publisher</label>
    <input type="text" maxlength="45" placeholder="Publisher" required autofocus name="txtpublisher" id="txtpublisher"><br>
    <label for="txtName">Publisher Year</label>
    <input type="text" maxlength="45" placeholder="Publisher Year" required autofocus name="txtpublisheryear" id="txtpublisheryear"><br>
    <label for="txtName">Description</label>
    <input type="text" maxlength="45" placeholder="Publisher Year" required autofocus name="description" id="description"><br>
    <label for="txtName">Genre Name</label>

    <select class="form-select" aria-label="Default select example" name="genre">
        <?php

        $link = createMySQLConnection();
        $query = 'SELECT * FROM genre';
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link = null;

        foreach ($result as $genre){
            echo '<option value="'. $genre['id'].'">'.$genre['name'].'</option>';
        }
        ?>
    </select><br>
    <input type="submit" value="Save Data" name="btnSave">
</form>

<table class="table">
    <thead>
    <tr>
        <th scope="col">isbn</th>
        <th scope="col">title</th>
        <th scope="col">author</th>
        <th scope="col">publisher</th>
        <th scope="col">publisher year</th>
        <th scope="col">genre name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $link = createMySQLConnection();
    $query = 'SELECT book.isbn, book.title, book.author, book.publisher, book.publisher_year, genre.name  FROM book INNER JOIN genre ON genre.id = book.genre_id';
    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $link = null;

    foreach ($result as $book){
        echo '<tr scope="row">';
        echo '<td>' . $book['isbn'] . '</td>';
        echo '<td>' . $book['title'] . '</td>';
        echo '<td>' . $book['author'] . '</td>';
        echo '<td>' . $book['publisher'] . '</td>';
        echo '<td>' . $book['publisher_year'] . '</td>';
        echo '<td>' . $book['name'] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
