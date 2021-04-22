<?php
ini_set("max_execution_time", 0);
ini_set("memory_limit", -1);
$host_num = 208;
$ports = array(21, 25, 80, 81, 110, 135, 139, 143, 443, 445,  587, 2525, 3306, 9000);
$network = "172.19.172.";

for ($i = 0; $i <= 3; $i++) 
{
    $count = 0;
    $host = $network.(string)$host_num;

    foreach ($ports as $port)
    {
        $connection = @fsockopen($host, $port, $errno, $errstr, 2);

        if (is_resource($connection))
        {
            echo "<h2>" . $host . ":" . "PORT:" . $port . " ->" . "(" . getservbyport($port, "tcp") . ") is open.</h2>" . "\n";
            $count += 1;
            fclose($connection);
        }
    }

    if($count === 0)
    {
        echo "<h2>"."IP:".$host." "."NOT RESPOND <br>";
    }
    echo "<h2>"."--------------------------------------------------<br>" ;
    $host_num+=1;
}
?>