<?php
$deleteCommand = filter_input(INPUT_GET, 'cmd');
if(isset($deleteCommand) && $deleteCommand == 'del'){
    $genreId = filter_input(INPUT_GET, 'gid');
    $result = deleteGenreToDb($genreId);
    if($result){
        echo '<div> Data Successfully removed</div>';
    } else {
        echo '<div>Failed to remove data</div>';
    }
}

$submitPressed = filter_input(INPUT_POST, 'btnSave');
if (isset($submitPressed)){
    $name = filter_input(INPUT_POST, 'txtName');
    if(trim($name) == ''){
        echo '<div>Please provide with a  valid name </div>';
    } else{
        $results = addNewGenre($name);
        if($results){
            echo '<div>Data successfully added </div>';
        } else{
            echo '<div>Failed to add data</div>';
        }
    }

}
?>
<h1 class="text-center">Available Genre</h1>

<form method="post" action="">
    <label for="txtName">Genre Name</label>
    <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtName" id="txtName"><br>
    <input type="submit" value="Save Data" name="btnSave">
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = fetchGenreFromDb();
    foreach ($result as $genre){
        echo '<tr scope="row">';
        echo '<td>' . $genre['id'] . '</td>';
        echo '<td>' . $genre['name'] . '</td>';
        echo '<td><button  onclick="editGenre(' .$genre['id']. ')" class="btn btn-warning">Update Data</button><button onclick="deleteGenre(' .$genre['id']. ')" class="btn btn-danger">Delete Data</button></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function (){
        $('#myTable').dataTable();
    })
</script>

