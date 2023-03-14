<?php
$editedIsbn = filter_input(INPUT_GET, 'isbn');
if (isset($editedIsbn)){
    $book = fetchOneBook($editedIsbn);
} else{
    echo "error";
}

$submitPressed = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submitPressed)){
    $isbn = filter_input(INPUT_POST, 'isbn');
    $title = filter_input(INPUT_POST, 'txttitle');
    $author = filter_input(INPUT_POST, 'txtauthor');
    $publisher = filter_input(INPUT_POST, 'txtpublisher');
    $publisheryear = filter_input(INPUT_POST, 'txtpublisheryear');
    $description = filter_input(INPUT_POST, 'txtdescription');
    $genre = filter_input(INPUT_POST, 'genre');
    if(trim($isbn) == '' || trim($title) == '' || trim($author) == '' || trim($publisher) == '' || trim($publisheryear) == '' || trim($genre) == ''  || trim($description) == ''){
        echo '<div>Please provide with a  valid name </div>';
    } else{
        $results = updateBookToDb($isbn, $title, $author, $publisher, $publisheryear, $description, $genre);
        if($results){
            header('location:index.php?menu=book');
        } else{
            echo '<div>Failed to update data</div>';
        }
    }

}

?>

<form method="post" action="">
    <div class="row">
        <label for="txtId">ISBN :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre ID" id="txtId" readonly name="isbn" value="<?php echo $book['isbn'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <label for="txtName">Title :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txttitle" id="txttitle" value="<?php echo $book['title'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <label for="txtName">Author :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtauthor" id="txtauthor" value="<?php echo $book['author'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <label for="txtName">Publisher :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtpublisher" id="txtpublisher" value="<?php echo $book['publisher'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <label for="txtName">Publisher Year :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtpublisheryear" id="txtpublisheryear" value="<?php echo $book['publisher_year'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <label for="txtName">Description :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtdescription" id="txtdescription" value="<?php echo $book['short_description'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <select class="form-select" aria-label="Default select example" name="genre">
            <?php
            $result = fetchGenreFromDb();
            foreach ($result as $genre){
                if($book['name'] == $genre['name']){
                    $id = $genre['id'];
                }
            }
            echo '<option value="'. $id .'">'.$book['name'].'</option>';

            foreach ($result as $genre){
                if($genre['id'] != $id){
                    echo '<option value="'. $genre['id'].'">'.$genre['name'].'</option>';
                }

            }
            ?>
        </select>
    </div>
    <div class="mt-3">
        <input type="submit" value="Update Data" name="btnUpdate">
    </div>
</form>
