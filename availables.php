<?php
session_start();
function filter_route_name($src, $dst) {
    if($src == "Dewanganj"){
        $enroute = strtolower("$src[0]$src[1]$dst[0]");
    }
    elseif($dst == "Dewanganj"){
        $enroute = strtolower("$src[0]$dst[0]$dst[1]");
    }
    else{
        $enroute = strtolower("$src[0]$dst[0]");
    }
    
    $check = ["cd", "sd", "ld", "ded", "kd"];
    if($enroute == "cd" || $enroute == "sd" || $enroute == "ld" || $enroute == "kd"){
        $enroute = strtolower("$dst[0]$src[0]");
    }
    elseif($enroute == "ded"){
        $enroute = strtolower("$dst[0]$src[0]$src[1]");
    }
    return $enroute;
}
function class_filter($train_cls){
    if($train_cls == "Shovon Chair"){
        $train_cls = "shovon_chair";
    }
    elseif($train_cls == "AC Chair"){
        $train_cls = "ac_chair";
    }
    elseif($train_cls == "AC Berth"){
        $train_cls = "ac_berth";
    }
    elseif($train_cls == "Sleeper Coach"){
        $train_cls = "sleeper_coach";
    }
    elseif($train_cls == "First Class"){
        $train_cls = "first_class";
    }
    return $train_cls;
}
$route_filteredd = filter_route_name($_SESSION['bfrom'], $_SESSION['bto']);
$c = $_SESSION['bclass'];
$class_filtered = class_filter($c);
require_once("dbconnect.php");
$d = $_SESSION['bdate'];

// add another query to reveal the train name, class, both arival and deperture times. (use seat_status <- available -> train_class tables)
$available = "SELECT COUNT(tickets_date) as purchases, quantity, tickets_date, route FROM purchase_history WHERE route = '$route_filteredd' AND tickets_date = '$d';";
$arrivals = "SELECT $class_filtered.train_name, $class_filtered.departure_time, $class_filtered.arival_time, $class_filtered.r_departure_time, $class_filtered.r_arival_time from ($class_filtered INNER JOIN available
ON $class_filtered.train_name = available.train_name) WHERE available.route = '$route_filteredd';";
$a_result = mysqli_query($conn, $available);
$b_result = mysqli_query($conn, $arrivals);
?>
<table border="2">
    <tr>
        <th>Tickets date</th>
        <th>Route</th>
        <th>Seat Available</th>
    </tr>
<?php
if(mysqli_num_rows($a_result) > 0){
    // $a_check = mysqli_fetch_array($a_result);
    while($rows = mysqli_fetch_array($a_result)){
        if(!empty($rows[2])){
            ?>
            <tr>
                <td><?php echo $rows[2];?></td>
                <td><?php echo $rows[3];?></td>
                <td><?php echo 40 - ($rows[0] + $rows[1]);?></td>
            </tr>
        <?php
        }
        else{
            ?>
            <tr>
                <td><?php echo $_SESSION['bdate'];?></td>
                <td><?php echo $route_filteredd;?></td>
                <td><?php echo 40;?></td>
            </tr>
        <?php
        }
        
    }?>
</table>
<br>
<table border="2">
    <tr>
        <th>Train Name</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Departure Time from Destination</th>
        <th>Arrival Time to Source</th>
    </tr>
    <?php
    while($rowc = mysqli_fetch_array($b_result)){
        ?>
            <tr>
                <td><?php echo $rowc[0];?></td>
                <td><?php echo $rowc[1];?></td>
                <td><?php echo $rowc[2];?></td>
                <td><?php echo $rowc[3];?></td>
                <td><?php echo $rowc[4];?></td>
            </tr>
        <?php
    }
}?>
</table>
<button><a href="index.php">Go Back</a></button>
<?php
?>