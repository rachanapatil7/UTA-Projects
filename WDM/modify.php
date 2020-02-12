<?php

$servername = "utacloud";
$username = "rachanan_rachana";
$password = "rachananpatil";
$dbname = "rachanan_leanevent";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected";
}

$s = "SELECT * FROM `listofevents`";
$r = mysqli_query($conn, $s);
?>

    <!DOCTYPE html></!DOCTYPE html>
    <html>
    <head>
        <title>Modify Event</title>
        <style type="text/css">
            #for1 {
                display: block;
            }
        </style>
    </head>
    <body>
    <center>
        <?php
        while ($row = mysqli_fetch_array($r)) { ?>
            <form action="modify.php" method="POST" name="" id="for1" enctype="multipart/form-data">
                <h5>Add Event</h5>
                <input hidden type="number" name="id" value="<?php echo $row['ID']; ?>"/>
                <div>
                    <label align="left">Image:</label>
                    <input type="file" name="imageupload" value="<?php echo $row['image']; ?>"/>
                </div>

                <div style="clear:both;">&nbsp;</div>
                <div>
                    <label align="left">Details:</label>
                    <input type="text" name="det" value="<?php echo $row['details']; ?>"/>
                </div>
                <div style="clear:both;">&nbsp;</div>
                <div>
                    <label align="left">place:</label>
                    <input type="text" name="pl" value="<?php echo $row['place']; ?>">
                </div>
                <div style="clear:both;">&nbsp;</div>
                <div>
                    <label align="left">Date:</label>
                    <input type="date" name="da" value="<?php echo $row['dateof']; ?>">
                </div>
                <div style="clear:both;">&nbsp;</div>
                <div>
                    <input type="submit" name="upd">
                </div>
            </form>
            <?php
        }
        ?>
    </center>
    </body>
    </html>


<?php

if (isset($_POST['upd'])) {
    $id = $row['ID'];

    $image=$_FILES['imageupload']['name'];
    var_dump($image);
    $tempname=$_FILES['imageupload']['tmp_name'];
    $folder="images1/".$image;

    $imageToUpload = $image ? $folder : $_POST['imageupload'];

    $de = $_POST['det'];
    $p = $_POST['pl'];
    $d = $_POST['da'];


    if (mysqli_num_rows($r) > 0) {

        $sql = "UPDATE listofevents SET image='" . $folder . "',details='" . $de . "',place='" . $p . "', dateof='" . $d . "' WHERE ID= " . $_POST['id'] ." ;";
        var_dump($sql);
        $result = mysqli_query($conn, $sql);
        var_dump($result);
        var_dump("came");
        if ($result) {
            echo $success = "New Record updated";
            ?>
            <script>window.location.href = "List_of_Events_1.php";</script>

            <?php 
            //header("refresh:3;url=List_of_Events_1.php");
        } else {
            echo $failure = "Not updated" . mysqli_error($conn);
        }

    } else {
        echo "user not found";
    }

}


?>