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
	<div class="alert bg-danger text-light fade show" role="alert">
	' . $msg . '
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="fas fa-times"></i></span>
	</button>
	</div>';
}

function alert_success($msg)
{
	echo '
	<div class="alert bg-success text-light fade show" role="alert">
	' . $msg . '
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="fas fa-times"></i></span>
	</button>
	</div>';
}