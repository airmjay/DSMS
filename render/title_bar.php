<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php 
	$str = strpos($routes[$request], '.');
    echo substr($routes[$request],0, $str )
     ;?>
	</title>
    <link rel="shortcut icon" href="img/D1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="js\font\css\all.css">
    <link rel="stylesheet" type="text/css" href="css\toastr.css">
    <script src='js\sweatalert.js'></script>
    <script src='css\toastr.min.js'></script>
    <script src='js\jquery\external\jquery\jquery.js'></script>

<style>
#preloaderallall {
    position: fixed;
    z-index: 999999;
    background: black;
    width: 100%;
    height: 100%;
    justify-content: center;
    
}
#loaderall {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #A0816C;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}
#loaderall:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #A0816C;
    -webkit-animation: spin 3s linear infinite;
    animation: spin 3s linear infinite;
}
#loaderall:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #A0816C;
    -webkit-animation: spin 1.5s linear infinite;
    animation: spin 1.5s linear infinite;
}
@-webkit-keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
</style>

    <div id="preloaderallall">
      <div id="loaderall"></div>
    </div>

   
    <script>
        $(window).on("load",function(){
          $("#preloaderallall").fadeOut(2000);
        });
    </script>
