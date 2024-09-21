<?php

// Get the requested URI
$request = $_SERVER['REQUEST_URI'];
$sub = strpos($request, "?");
if($sub){
$request = substr($request, 0, $sub);
}else
{
$request = $_SERVER['REQUEST_URI'];

}
$routes = [];
// Define routes
$con = mysqli_connect('localhost','root','', 'school');
$select = "SELECT * FROM dswp";
$get1 = mysqli_query($con, $select);
while($row1 = mysqli_fetch_array($get1))
{

  $routes[] = "/".$row1['id'];
}

$select = "SELECT * FROM pages";
$get = mysqli_query($con, $select);
// $row = mysqli_fetch_array($get);
// $log = substr($request,1);

while($row = mysqli_fetch_array($get))
{
  $key = "/".$row['Array_key'];
  $value =  $row['Array_value'].".php";

  $routes[$key] = $value;


}
// Find the matching route
switch ($request) {
  
  
  case in_array($request, $routes):
    // If route exists, include the corresponding file
    include(__DIR__.'/menu/'. 'home.php');
    break;
    case in_array($request, array_keys($routes)):
    // If route exists, include the corresponding file
    include(__DIR__.'/render/'.'title_bar.php');
    include(__DIR__.'/render/'.$routes[$request]);
    break;
  default:
    // Handle cases where no route matches (e.g., display 404 "Not Found")
  
    include(__DIR__.'/render/'. '404.php');
    break;
}
