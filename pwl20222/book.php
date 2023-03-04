<h1 class="text-center">Available Book</h1>
<?php
$link = new PDO('mysql:host=localhost;dbname=pwl20222', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link ->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
$query = 'SELECT book.isbn, book.title, book.author, book.publisher, book.publisher_year, genre.name  FROM book INNER JOIN genre ON genre.id = book.genre_id';
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link = null;
?>
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
