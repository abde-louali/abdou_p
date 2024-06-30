<?php
function conn(){
    $host = "localhost";
    $dbname = "project";
    $user = "root";
    $pass = "";
    $dbn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $dbn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $dbn;
}
// insert student
function insertS($v1,$v2,$v3,$v4,$v5){
    $db = conn();
    $query = "INSERT into student(cin,fname,lname,email,pasword)values(?,?,?,?,?) ";
    $stat = $db->prepare($query);
    $data = [$v1,$v2,$v3,$v4,$v5];
    $inserted = $stat->execute($data);
    if($inserted){
        return true ;
    }return false ;
}
// select student name 
function selectNOM($v){
    $db = conn();
    $query = "SELECT * FROM student where cin ='$v'  ";
    $stat = $db->query($query);
    $rows = $stat->fetch(PDO::FETCH_ASSOC);
    return $rows;
}
// select  student ifrormation by cin and password for student login
function selectVLD($v1,$v2){
    $db = conn();
    $query = "SELECT * from student where cin  = '$v1' and pasword =  '$v2' ";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}
// select  teacher ifrormation by username and password for teacher login
function selectVLDT($v1,$v2){
    $db = conn();
    $query = "SELECT * from teacher where username  = '$v1' and password =  '$v2' ";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}

// select all the student 
function selectAll(){
    $db = conn();
    $query = "SELECT * from student ";
    $stat = $db->query($query);
    $rows = $stat->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
// select student by id 
function selectID($v1){
    $db = conn();
    $query = "SELECT * from student where id = '$v1' ";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function insertNote($v1,$v2,$v3,$v4,$v5){
    $db = conn();
    $query = "INSERT into notes(cin,note1,note2,note3,Nmodul)values(?,?,?,?,?) ";
    $stat = $db->prepare($query);
    $data = [$v1,$v2,$v3,$v4,$v5];
    $inserted = $stat->execute($data);
    if($inserted){
        return true ;
    }return false ;
}

function selectVIR($v1,$v2){
    $db = conn();
    $query = "SELECT cin,Nmodul from notes where cin = '$v1' and Nmodul = '$v2' ";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function allNotes($v1){
    $db = conn();
    $query = "SELECT * FROM notes INNER JOIN student USING(cin) WHERE id = $v1 ";
    $stat = $db->query($query);
    $rows = $stat->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function selectCin($v1,$v2){
    $db = conn();
    $query = "SELECT cin, note1 ,note2 ,note3 ,Nmodul FROM notes WHERE   Nmodul = '$v1' AND cin = '$v2'";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function updateN($v1,$v2,$v3,$v4,$v5){
    $db = conn();
    $query = "UPDATE notes set note1=?,note2=?,note3=?,notef = TRUNCATE((note1+note2+note3)/3,2) where Nmodul = ? AND cin = ?";
    $stat = $db->prepare( $query );
    $data = array($v1,$v2,$v3,$v4,$v5);
    $updat = $stat->execute($data);
    if($updat){
        return true;
    }return false;
}
function selectStudentN($v1){
    $db = conn();
    $query = "SELECT Nmodul,note1,note2,note3,notef FROM notes WHERE cin = '$v1' ";
    $stat = $db->query($query);
    $rows = $stat->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function selectID2($v1){
    $db = conn();
    $query = "SELECT id from student where cin = '$v1' ";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function selectCN2($v1,$v2){
    $db = conn();
    $query = "SELECT cin , Nmodul from notes where cin = '$v1' and Nmodul ='$v2'";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function delete($v1,$v2){
    $db = conn();
    $query = "DELETE FROM notes  WHERE cin = '$v1' AND Nmodul = '$v2' ";
    $stat = $db->prepare($query);
    $stat->execute();
}
function allstudentsNote($v1){
    $db = conn();
    $query = "SELECT cin , fname,lname,notef FROM student
                INNER JOIN notes USING(cin)
                WHERE Nmodul = '$v1' ORDER BY notef desc";
    $stat = $db->query($query);
    $rows = $stat->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

// ===============


// function selectVLD($v1){
//     $db = conn();
//     $query = "SELECT * from student where id = '$v1' ";
//     $stat = $db->query($query);
//     $row = $stat->fetch(PDO::FETCH_ASSOC);
//     return $row;
// }
// function update($v1,$v2,$v3,$v4,$v5){
//     $db = conn();
//     $query = "UPDATE student set name = ?,note1=?,note2=?,note3=?,notef = TRUNCATE(((note1+note2+note3)/3),2) where id = ?";
//     $stat = $db->prepare( $query );
//     $data = array($v1,$v2,$v3,$v4,$v5);
//     $updat = $stat->execute($data);
//     if( $updat){
//         return true;
//     }return false;
// }
function deleteS($v1){
    $db = conn();
    $query = " DELETE from student where id = '$v1' ";
    $stat = $db->query($query);
    if($stat){
        return true;
    }return false;
}
function selectN($v1){
    $db = conn();
    $query = "SELECT * from student where name = '$v1' ";
    $stat = $db->query($query);
    $row = $stat->fetch(PDO::FETCH_ASSOC);
    return $row;
}
