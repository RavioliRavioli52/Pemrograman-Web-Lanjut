<?php
$submitPressed = filter_input(INPUT_POST, 'btnSave');
if (isset($submitPressed)){
    $name = filter_input(INPUT_POST, 'txtName');
    if(trim($name) == ''){
        echo '<div>Please provide with a  valid name </div>';
    } else{
        $link = createMySQLConnection();
        $link->beginTransaction();
        $query = 'INSERT INTO genre(name) VALUES(?)';
        $stmt = $link ->prepare($query);
        $stmt->bindParam(1,$name);
        if($stmt->execute()){
            $link->commit();
        } else{
            $link->rollBack();
        }
    }
    $link = null;
}

$link = createMySQLConnection();
$query = 'SELECT id, name FROM genre';
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link = null;
?>
<h1 class="text-center">Available Genre</h1>

<form method="post" action="">
    <label for="txtName">Genre Name</label>
    <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtName" id="txtName">
    <input type="submit" value="Save Data" name="btnSave">
</form>

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
