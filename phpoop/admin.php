<?php
// select - single - add - insert - edit - update - delete
/* priceTable.php?do=add
$_GET['do']
*/
include ('header.php');
$userObject=new users();
$priceObject=new price();
if(isset($_GET['do'])){
$do=$_GET['do'];
}else{
    $do='select';
}
// make pages
if( $do == 'select'){
    // select page
    $prices=$priceObject->select();
    ?>
    <div style="padding-top: 100px; background: #3f4f8b">
        <a href="admin.php?do=add" class="btn btn-info text-white mb-5" >Add</a>
        <table id="example" class="display" style="width:100%; height: 50vh; color: #3f4f8b">
    <thead>
    <tr>
        <th>#</th>
        <th>Service Name</th>
        <th>Price</th>
        <th>Notes</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($prices as $price){ ?>
    <tr>
        <th><?php echo $price['id']; ?></th>
        <th><?php echo $price['name']; ?></th>
        <th><?php echo $price['price']; ?></th>
        <th><?php echo $price['note']; ?></th>
        <th>
            <a href="admin.php?do=edit&id=<?php echo $price['id']; ?>" class="btn btn-primary">Edit</a>
            <a href="admin.php?do=delete&id=<?php echo $price['id']; ?>" class="btn btn-danger">Delete</a>

        </th>
    </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Service Name</th>
        <th>Price</th>
        <th>Notes</th>
        <th>Actions</th>
    </tr>
    </tfoot>
</table>
    </div>
<?php
}
// elseif ($do == 'single'){
//     // single page
//    if(isset($_GET['id'])){
//        $id=$_GET['id'];
//        $price=$priceObject->single($id);
//        echo '<h1 class="text-center mt-5 pt-5">' . $price['userName'] . '</h1>';
//        echo '<h2 class="text-center ">' . $price['email'] . '</h2>';
//        echo '<h3 class="text-center">' . $price['regDate'] . '</h3>';
//    }else{
//        header('Location:priceTable.php');
//    }
// }
elseif ($do == 'add'){
    // add page
  ?>
        <div style="padding-top: 100px; background: #3f4f8b">
            <center><h1 style="color:yellow">Add Page</h1></center>
            <form class="row g-3 needs-validation" novalidate method="post" action="admin.php?do=insert">
                <div class="col-md-4">
                    <label for="validationCustom01" style="color:white" class="form-label">Service</label>
                    <input type="text" class="form-control" id="validationCustom01" name="name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                       Please Choose Service.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" style="color:white" class="form-label">Price</label>
                    <input type="number" class="form-control" id="validationCustom02" name="price" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please Choose Price
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" style="color:white" class="form-label">Notes</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" name="note" id="validationCustomUsername" aria-describedby="inputGroupPrepend">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose a Service.
                        </div>
                    </div>
                </div>
                <center>
                <div class="col-12">
                    <a class="button" style="text-decoration:none; margin-right:5px;" href="admin.php">Go Back</a>
                    <button class="button" type="submit">Submit form</button>
                </div>
                <center>
            </form>
        </div>
<?php
}elseif ($do == 'insert'){
    // insert page
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ // protect page from get requests
        $name=$_POST['name'];
        $price=$_POST['price'];
        $note=$_POST['note'];
        // $hasedPassword=password_hash($password,PASSWORD_BCRYPT);

        if(empty($name)){
            $errors[] = 'servic name can not be empty';
        }
        if(empty($price)){
            $errors[] = 'price can not be empty';
        }
        // if(empty($password)){
        //     $errors[] =  'password can not be empty';
        // }
        $count=$priceObject->unique("name='$name'");
        if($count > 0 ){
            $errors[] =  'servic is already registere ';
        }
        // $count=$priceObject->unique("email='$email'");
        // if($count > 0 ){
        //     $errors[] =  'Email is already registere ';
        // }
        if(isset($errors)){
            // I have errors
            foreach($errors as $error){
                echo  '<p class="alert alert-danger">' . $error . '</p>';
            }
        }else{
            $priceObject->insert("name='$name' , price='$price' , note='$note'");
            // i do not have errors
            echo '<p class="alert alert-success">user added successfully</p>';
        }
        header("Refresh:3; url=admin.php");

    }else{
        header('Location: admin.php?do=add');
    }
}elseif ($do == 'edit'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $price=$priceObject->single($id);
    }else{
        header('Location:admin.php');
    }
    // edit page
    ?>
    <div style="padding-top: 100px; background: #3f4f8b">
            <center><h1 style="color:yellow">Edit Page</h1></center>
        <form class="row g-3 needs-validation" novalidate method="post" action="admin.php?do=update">
            <input type="hidden" name="id" value="<?php echo $price['id']; ?>">
            <div class="col-md-4">
                <label for="validationCustom01" style="color:white" class="form-label">Service</label>
                <input value="<?php echo $price['name']; ?>" type="text" class="form-control" id="validationCustom01" name="name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please Choose Service.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" style="color:white" class="form-label">Price</label>
                <input type="number" value="<?php echo $price['price']; ?>" class="form-control" id="validationCustom02" name="price" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please Choose Price.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" style="color:white" class="form-label">Notes</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="note" id="validationCustomUsername" aria-describedby="inputGroupPrepend">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please choose a Note.
                    </div>
                </div>
            </div>
            <center>
            <div class="col-12">
                <a class="button" style="text-decoration:none; margin-right:5px;" href="admin.php">Go Back</a>
                <button class="button" type="submit">Submit form</button>
            </div>
            </center>
        </form>
    </div>
    <?php
}elseif ($do == 'update'){
    // update page
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ // protect page from get requests
        $id=$_POST['id'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $note=$_POST['note'];

        if(empty($name)){
            $errors[]='Service can not be empty';
        }
        if(empty($price)){
            $errors[]='Price can not be empty';
        }
        $count=$priceObject->unique("name='$name' AND id!=$id");
        if($count > 0 ){
            $errors[] =  'Service is already registere ';
        }
        // $count=$priceObject->unique("price='$price' AND id!=$id");
        // if($count > 0 ){
        //     $errors[] =  'Price is already registere ';
        // }
        if(isset($errors)){
            foreach ($errors as $error){
                echo '<p class="alert alert-danger">' . $error . '</p>';
            }
        }else{
            // no errors
            if(!empty($_POST['price'])){
                // has price
                $price=$_POST['price'];
                $priceObject->update("name='$name' , price='$price'" , $id);
            }else if(!empty($_POST['note'])){
                // has note
                $note=$_POST['note'];
                $priceObject->update("name='$name' , price='$price' , note='$note'" , $id);
            }else if($_POST['note'] == "-"){
                // has note
                $note="";
                $priceObject->update("name='$name' , price='$price' , note='$note'" , $id);
            }else{
                // no price or notes
                $priceObject->update("name='$name' , price='$price' , note='$note'" , $id);
            }
            header('Location: admin.php');


            echo  '<p class="alert alert-success">updated successfully</p>';
        }

    }else{
        header('Location: admin.php');
    }
}elseif ($do == 'delete'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $priceObject->delete($id);

        header('Location: admin.php');

    }else{
        header('Location: admin.php');
    }

    // delete page
}

include "footer.php";