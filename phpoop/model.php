<?php
include 'connect.php';
class model{
    public function select(){
        global $conn; // get the conn variable from outside function
        $table=get_class($this); // this reffer the object
        $stmt=$conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $data= $stmt->fetchAll();
        return $data;   // make the function value equal to data
    }
    public function single($id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE id='$id'");
        $stmt->execute();
        $data= $stmt->fetch();
        return $data;
    }
    public function whereSingle($where){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE $where");
        $stmt->execute();
        $data= $stmt->fetch();
        return $data;
    }
    public function insert($columns){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("INSERT INTO $table SET $columns");
        // $columns = userName='$userName' ,email = '$email' ,
        $stmt->execute();
    }
    public function update($columns,$id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("UPDATE $table SET  $columns WHERE id='$id'");
        // $columns = userName='$userName' , email='$email'
        $stmt->execute();
    }
    public function delete($id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("DELETE FROM $table WHERE id= '$id'");
        $stmt->execute();
    }
    public function unique($where){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE $where");
        $stmt->execute();
        $count=$stmt->rowCount();
        return $count;
    }
}
class users extends model{

}
class price extends model{

}
class orders extends model{

}