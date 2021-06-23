<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LAMP STACK</title>
        <link rel="stylesheet" href="/assets/css/bulma.min.css">
    </head>
    <body>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h3 class="title is-3 has-text-centered">Environment</h3>
                        <hr>
                        <div class="content">
                            <ul>
                                <li><?= apache_get_version(); ?></li>
                                <li>PHP <?= phpversion(); ?></li>
                                <li>
                                    <?php
                                    $link = mysqli_connect("database", "root", "tiger", null);

/* check connection */
                                    if (mysqli_connect_errno()) {
                                        printf("MySQL connecttion failed: %s", mysqli_connect_error());
                                    } else {
                                        /* print server version */
                                        printf("MySQL Server %s", mysqli_get_server_info($link));
                                    }
                                    /* close connection */
                                    mysqli_close($link);
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <h3 class="title is-3 has-text-centered">Quick Links</h3>
                        <hr>
                        <div class="content">
                            <ul>
                                <li><a href="/phpinfo.php">phpinfo()</a></li>
                                <li><a href="http://localhost:<? print $_ENV['PMA_PORT']; ?>">phpMyAdmin</a></li>
                                <li><a href="/test_db.php">Test DB Connection with mysqli</a></li>
                                <li><a href="http://localhost:3000">Node Server</a></li>
                                <li>
                                <?php

include "./vendor/autoload.php";
use Redislabs\Module\ReJSON\ReJSON;
try{
    $redisClient = new Redis();
    $redisClient->connect('redis','6379');
    $reJSON = ReJSON::createWithPhpRedis($redisClient);
    $reJSON->set('test', '.', ['foo'=>'bar'], 'NX');
    $reJSON->set('test', '.baz', 'qux');
    $reJSON->set('test', '.baz', 'quux', 'XX');
    $reJSON->set('test2', '.', ['foo2'=>'bar2']);
    $baz = $reJSON->get('test', '.baz');
    if($baz && !empty($baz)){
        echo "Redis is configured successfully";
    }else{
        echo "Redis is misconfigured.";
    }
}catch(exception $e){
    echo "Redis is misconfigured.";
}


?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>
   <script>
    //  const socket = io();
    const socketio =  io.connect('http://localhost:3000');
    if(socketio){
        console.log("Socket is succesfully connected.");
    }else{
        console.log("Something went wrong. Socket connection failed.");
    }
   </script>

