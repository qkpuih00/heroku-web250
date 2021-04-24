
<div id="sam-used-cars">
    
        <h1>Sam Used Cars</h1>
        <?php require_once 'sam_used_cars_process.php'; ?>
        <?php 
            $mysqli = new mysqli('localhost', 'root', '', 'cars2') or die(mysql_error($mysqli));
            $result = $mysqli->query("SELECT * FROM inventory");
        ?>

        <form action="#" method="POST">
        <label for="vin">VIN</label>
        <input type="text" name="vin" value="<?php echo $vin ?>" placeholder="">
        <label for="make">Make</label>
        <input type="text" name="make" value="<?php echo $make ?>" placeholder="">
        <label for="model">Model</label>
        <input type="text" name="model" value="<?php echo $model ?>" placeholder="">
        <label for="year">Year</label>
        <input type="text" name="year" value="<?php echo $year ?>" placeholder="">
        <label for="asking_price">Asking Price</label>
        <input type="text" name="asking_price" value="<?php echo $asking_price ?>" placeholder="">
        <?php if($update == true):?>
            <button type="submit" name="update">Update</button>
        <?php else: ?>
        <button type="submit" name="save">Save</button>
        <?php endif;?>
        </form>


        <div>
            <table>
                <thead>
                    <tr>
                        <th id="#vin">VIN</th>
                        <th id="make">Make</th>
                        <th id="model">Model</th>
                        <th id="year">Year</th>
                        <th id="asking_price">Asking Price</th>
                        <th colspan="2" id="action">Action</th>
                    </tr>
                </thead>

            <?php 
            while ($row = $result->fetch_assoc()):
            ?>
                    <tr>
                        <td><?php echo $row['vin'];?></td>
                        <td><?php echo $row['make'];?></td>
                        <td><?php echo $row['model'];?></td>
                        <td><?php echo $row['year'];?></td>
                        <td><?php echo $row['asking_price'];?></td>
                        <td><a href="index.php?edit=<?php echo $row['vin'];?>">Edit</a></td>
                        <td><a href="index.php?delete=<?php echo $row['vin'];?>">Delete</a></td>
                    </tr>
            <?php endwhile;?>
            </table>
        </div>
    </div>
