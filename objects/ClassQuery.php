<?php

class query
{
    private $tablename = "tbl_data";

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function Save_data()
    {
        $sql ="INSERT INTO ".$this->tablename." SET firstname=?, lastname=?, username=?, password=?, status=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $load = $this->con->prepare($sql);

        $load->bindParam(1, $this->firstname);
        $load->bindParam(2, $this->lastname);
        $load->bindParam(3, $this->username);
        $load->bindParam(4, $this->password);
        $load->bindParam(5, $this->status);


        if($load->execute())
        {
            return true;
        }else{
            return false;
        }
    }

    //update
    public function Update_data()
    {
        $sql = "UPDATE tbl_data SET firstname=?, lastname=?, username=?, password=? WHERE id = ?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $update = $this->con->prepare($sql);

        $update->bindParam(1, $this->firstname);
        $update->bindParam(2, $this->lastname);
        $update->bindParam(3, $this->username);
        $update->bindParam(4, $this->password);
        $update->bindParam(5, $this->id);
        
        if($update->execute())
        {
            return true;
        }else{
            return false;
        }
    }

    public function Select_data()
    {
        $sql = "SELECT id, firstname, lastname, username, password, status FROM tbl_data WHERE status != 0";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;

    }

    //get user 
    public function get_user()
    {
        $sql = "SELECT * FROM tbl_data WHERE id = ?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $get = $this->con->prepare($sql);

        $get->bindParam(1, $this->id);

        $get->execute();
        return $get;
    }

    //delete user
    public function delete_user()
    {
        $sql = "UPDATE tbl_data SET status = 0 WHERE id = ?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $update = $this->con->prepare($sql);

        $update->bindParam(1, $this->id);

        if($update->execute())
        {
            return true;
        }else{
            return false;
        }
    }

    
}

?>