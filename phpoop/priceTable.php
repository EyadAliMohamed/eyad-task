<?php
// select - single - add - insert - edit - update - delete
/* priceTable.php?do=add
$_GET['do']
*/
include "header.php";
// $userObject=new users();
$priceObject=new price();
    // select page
    $prices=$priceObject->select();
    ?>
    <div style="padding-top: 100px; background: #3f4f8b">
        <table id="example" class="display pt-5" style="width:100%; height: 50vh; color: #3f4f8b">
        <thead>
        <tr style="color: white">
            <th>#</th>
            <th>Service Name</th>
            <th>Price</th>
            <th>Notes</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($prices as $price){ ?>
        <tr>
            <th><?php echo $price['id']; ?></th>
            <th><?php echo $price['name']; ?></th>
            <th><?php echo $price['price']; ?></th>
            <th><?php echo $price['note']; ?></th>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr style="color: white">
            <th>#</th>
            <th>Service Name</th>
            <th>Price</th>
            <th>Notes</th>
        </tr>
        </tfoot>
        </table>
    </div>
<?php
include "footer.php";
?>