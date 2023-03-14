<?php
$deleteCommand = filter_input(INPUT_GET, 'com');
if(isset($deleteCommand) && $deleteCommand == 'del'){
    $isbn = filter_input(INPUT_GET, 'isbn');
    $result = deleteBookToDb($isbn);
    if($result){
        echo '<div> Data Successfully removed</div>';
    } else {
        echo '<div>Failed to remove data</div>';
    }
}



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
        $results = addNewBook($isbn, $title, $author, $publisher, $publisheryear, $description, $genre);
        if($results){
            echo '<div>Data successfully added </div>';
        } else{
            echo '<div>Failed to add data</div>';
        }
    }

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
        $result = fetchGenreFromDb();
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
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = fetchBookFromDb();

    foreach ($result as $book){
        echo '<tr scope="row">';
        echo '<td>' . $book['isbn'] . '</td>';
        echo '<td>' . $book['title'] . '</td>';
        echo '<td>' . $book['author'] . '</td>';
        echo '<td>' . $book['publisher'] . '</td>';
        echo '<td>' . $book['publisher_year'] . '</td>';
        echo '<td>' . $book['name'] . '</td>';
        echo '<td><button  onclick="editBook('.$book['isbn'].')" class="btn btn-warning">Update Data</button><button  onclick="deleteBook('.$book['isbn'].')" class="btn btn-danger">Delete Data</button></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

