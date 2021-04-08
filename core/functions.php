<?php

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
            case $page == 'article': page('article');
            break;
            case $page == 'team': page('team');
            break;
            case $page == 'login': page('login');
            break;
            case $page == 'register': page('register');
            break;
            case $page == 'profile': page('profile');
            break;
            case $page == 'mailbox': page('mailbox');
            break;
            case $page == 'settings': page('settings');
            break;
            default: page('articles');
            break;
        }

    }
    else{
        page('articles');
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