<?php

// 12 à 13 semaines de stage

function includes($file){
    $_INC = './includes';
    include ($_INC.'/'.$file.'.php');
}

function page($file){
    $_PAG = './pages';
    include $_PAG.'/'.$file.'.php';
}

function contents(){
    if(isset($_GET['page'])){
        
        $page = $_GET['page'];

        switch($page){
            case $page == 'new': page('new');
            break;
            case $page == 'edit': page('edit');
            break;
            case $page == 'list': page('list');
            break;
            case $page == 'day': page('day');
            break;
            default: page('login');
            break;
        }

    }
    else{
        page('login');
    }
}

function alert_danger($msg)
{
	echo '
    <div class="col-sm-12 col-md-6 col-lg-4 my-3 mx-auto d-block">
	<div class="alert bg-danger text-light fade show" role="alert">
	' . $msg . '
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="fas fa-times"></i></span>
	</button>
	</div>
    </div>';
}

function alert_success($msg)
{
	echo '
    <div class="col-sm-12 col-md-6 col-lg-4 my-3 mx-auto d-block">
	<div class="alert bg-success text-light fade show" role="alert">
	' . $msg . '
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="fas fa-times"></i></span>
	</button>
	</div>
    </div>';
}

function currentWeek(){
    require 'config.php';
    $sql = 'SELECT * FROM records';
    $res = mysqli_query($con, $sql);
    $i = 0;
    $week = 1;

    while(mysqli_fetch_assoc($res)){
        $i++;
        if($i % 5 == 0){
            $week++;
        }
    }

    return $week;
}