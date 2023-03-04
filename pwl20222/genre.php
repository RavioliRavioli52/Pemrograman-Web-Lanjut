<?php
$link = new PDO('mysql:host=localhost;dbname=pwl20222', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link ->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
$query = 'SELECT id, name FROM genre';
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link = null;
?>
<h1 class="text-center">Available Genre</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $genre){
        echo '<tr scope="row">';
        echo '<td>' . $genre['id'] . '</td>';
        echo '<td>' . $genre['name'] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
