<?php
include 'config.php';

$search = "";

if(isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
}

$sql = "SELECT s1.sname, t1.tid, t1.tname
        FROM s1
        INNER JOIN t1 ON s1.tid = t1.tid";

if(!empty($search)) {
    $sql .= " WHERE s1.sname LIKE '%$search%'
              OR t1.tname LIKE '%$search%'
              OR t1.tid LIKE '%$search%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Teacher List</title>

    <style>
        body{
            font-family: Arial, sans-serif;
        }

        h2{
            text-align:center;
        }

        .search-box{
            text-align:center;
            margin:20px;
        }

        input[type=text]{
            padding:8px;
            width:250px;
        }

        input[type=submit]{
            padding:8px 15px;
            cursor:pointer;
        }

        table{
            border-collapse:collapse;
            width:70%;
            margin:auto;
        }

        th,td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }

        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h2>Student Teacher List</h2>

<div class="search-box">
    <form method="GET">
        <input type="text"
               name="search"
               placeholder="Search Student, Teacher ID or Teacher Name"
               value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Search">
        <a href="display.php">
            <input type="button" value="Show All">
        </a>
    </form>
</div>

<table>
    <tr>
        <th>Student Name</th>
        <th>Teacher ID</th>
        <th>Teacher Name</th>
    </tr>

    <?php
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>".$row['sname']."</td>";
            echo "<td>".$row['tid']."</td>";
            echo "<td>".$row['tname']."</td>";
            echo "</tr>";
        }
    }
    else
    {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }

    $conn->close();
    ?>

</table>

</body>
</html>