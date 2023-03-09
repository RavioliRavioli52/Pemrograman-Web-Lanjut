<?php
$editedId = filter_input(INPUT_GET, 'gid');
if (isset($editedId)){
    $genre = fetchOneGenre($editedId);

}

$updatePressed = filter_input(INPUT_POST, 'btnUpdate');
if((isset($updatePressed))){
    $name = filter_input(INPUT_POST, 'txtName');
    if(trim($name == '')){
        echo '<div>Please fill update genre name </div>';
    } else {
        $result = updateGenreToDb($genre['id'], $name);
        if($result){
            header('location:index.php?menu=genre');
        } else{
            echo '<div>Failed to update data</div>';
        }
    }
}
?>

<form method="post" action="">
    <div class="row">
        <label for="txtId">Genre ID :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre ID" id="txtId" readonly value="<?php echo $genre['id'];?>">
        </div>
    </div>
    <div class="row mt-3">
        <label for="txtName">Genre Name :</label>
        <div class="col mt-2">
            <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtName" id="txtName" value="<?php echo $genre['name'];?>">
        </div>
    </div>
    <div class="mt-3">
        <input type="submit" value="Update Data" name="btnUpdate">
    </div>
</form>
