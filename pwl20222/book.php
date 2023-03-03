<?php
$link = new PDO('mysql:host=localhost;dbname=pwl20222','root','');
$link -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$link -> setAttribute(PDO::ATTR_AUTOCOMMIT,false);
$query = "SELECT ISBN,title,author,publisher,publish_year,genre.name AS 'genre-name' FROM book INNER JOIN genre WHERE book.genre_id = genre.id;";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link =null;
?>
<div class="container text-center mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($result as $genre ){
                    echo '<tr>';
                    echo '<td>'. $genre['id'] . '</td>';
                    echo '<td>'. $genre['name'] . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
