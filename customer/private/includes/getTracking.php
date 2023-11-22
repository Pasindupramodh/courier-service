<?php

$courier_id = addslashes($_POST['courier_id']);


$emp = new Courier();

$result = $emp->getTracking($courier_id);
if ($result) {
    $track = "";
    foreach ($result as $row) {

        $dateTime = explode(" ", $row['status_date']);

        if ($row['status'] == "Pending") {
            $track .= '<div class="time-label">
        <span class="bg-warning">
            '.$dateTime[0].'
        </span>
    </div>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <div>
    <i class="fas fa-truck-moving bg-warning"></i>
        <div class="timeline-item">
            <span class="time"><i class="far fa-clock"></i> '.$dateTime[1].'</span>

            <h3 class="timeline-header text-warning"><strong>'.$row['status'].'</strong></h3>



        </div>
    </div>';
        }elseif($row['status'] == "Finished"){
            $track .= '<div class="time-label">
            <span class="bg-danger">
                '.$dateTime[0].'
            </span>
        </div>
        <!-- /.timeline-label -->
        <!-- timeline item -->
        <div>
        <i class="fas fa-thumbs-up bg-danger"></i>
            <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> '.$dateTime[1].'</span>
    
                <h3 class="timeline-header text-danger"><strong>'.$row['status'].'</strong></h3>
    
    
    
            </div>
        </div>';
        }else{
            $track .= '<div class="time-label">
            <span class="bg-primary">
                '.$dateTime[0].'
            </span>
        </div>
        <!-- /.timeline-label -->
        <!-- timeline item -->
        <div>
        <i class="fas fa-solid fa-plane text-white bg-primary"></i>
            <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> '.$dateTime[1].'</span>
    
                <h3 class="timeline-header text-primary"><strong>'.$row['status'].'</strong></h3>
    
    
    
            </div>
        </div>';
        }

        
    }
    echo $track;
} else {
    echo "Something went wrong";
}

?>