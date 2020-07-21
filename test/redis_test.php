<?php

 $redis = new Redis();
 $redis->connect('redis', 6379);
echo "Server is running: ".$redis->ping();