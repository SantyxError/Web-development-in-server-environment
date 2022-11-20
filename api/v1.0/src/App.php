<?php
namespace App;
 
class App
{
 
    public function run(): void
    {
        // echo "Running application";
         include base_path("routes/api.php"); 
    }
 
}

?>