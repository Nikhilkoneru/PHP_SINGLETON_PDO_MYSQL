<?php

/**
 * Function to query information based on 
 * a parameter: in this case, location.
 *
 */
    try  {
        require "../common.php";
        require "../database.php";
        $db = new DB;
        $result=$db->getQuery("SELECT * FROM book1");
        $result2=$db->getQuery("SELECT * FROM book2");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>
<?php require "templates/header.php"; ?>
        
<?php  
    
    if (!empty($result)) { ?>
        <center>
        <h2>BOOK STORE 1 INFO</h2>
       
        <table style="width:50%" class="table table-bordered table-dark">
            <thead>
                <tr>
                    
                    <th scope="col">BOOK ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Price</th>
                    
                </tr>
            </thead>
            <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td scope="row"><?php echo escape($row["book_id"]); ?></td>
                <td><?php echo escape($row["title"]); ?></td>
                <td><?php echo escape($row["author"]); ?></td>
                <td><?php echo escape($row["price"]); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</center>
<br><br>
    <?php } else { ?>
        <blockquote>No results found </blockquote>
    <?php } 

 ?> 


<?php  

    if (!empty($result2)) { ?>
        
        <center>
            <h2>BOOK STORE 2 INFO</h2>
        <table style="width:50%" class="table table-bordered table-dark">
            <thead>
                <tr>
                    
                    <th>BOOK ID</th>
                    <th>Title</th>
                    <th>Author Name</th>
                    <th>Price</th>
                    
                </tr>
            </thead>
            <tbody>
        <?php foreach ($result2 as $row) { ?>
            <tr>
                <td><?php echo escape($row["book_id"]); ?></td>
                <td><?php echo escape($row["title"]); ?></td>
                <td><?php echo escape($row["author"]); ?></td>
                <td><?php echo escape($row["price"]); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </center>
    <?php } else { ?>
        <blockquote>No results found </blockquote>
    <?php } 
 ?> 


<?php require "templates/footer.php"; ?>
