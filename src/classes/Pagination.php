<?
class Page{
    
function Pagination($table,$sql){
    include 'Web2023/src/classes/connection.class.php';
    $conn->connect();
    if(isset($_GET['page'])){
        $page_no=1;
    }else{
        $page_no=$_GET['page'];
    }
    $limit=3;
    $initial=($page_no-1)*$limit;
    $sql="SELECT * FROM $table LIMIT $limit OFFSET $initial";
    $rows=$conn->query($sql);
    $perpage=ceil($rows/$limit);
    $result=$rows->fetch_all(MYSQLI_ASSOC)>0;
    return $result;
    
    if ($page_no > 1) {
    echo '<a href="?page='.($page_no- 1).'">Previous</a>';}
    for($page=1;$page<=$perpage;$page++){
        if($page==$page_no){
            echo '<span id="current">'.$page."</span>";
        }else{
            echo '<a href="?page='.$page.'">'.$page.'</a>';
        }
        if($page<$perpage){
            echo '<a href="?page='.($page+1).'">Next</a>';
        }

    }
    echo '</p>';


    }}
    ?>