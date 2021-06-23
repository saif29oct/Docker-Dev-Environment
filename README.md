#  Docker PHP & Node Combined Development Environment

  
<!-- ![Landing Page](https://preview.ibb.co/gOTa0y/LAMP_STACK.png) -->

  
> Environment Included:
* PHP (v 8.0.3)
* Node Js (v 14.16.1)
* Apache Server
* MariaDB (v 10.5.9)
* phpMyAdmin
* Redis (v 5.3.3)

> Additional Libraries and Packages:
* Socket.IO
* redislabs/rejson:1.0.7
* npm & composer package manager
* php imagick
* php xdebug
* mysqli

> Installation
* Clone this repository on your local computer
* configure .env as needed 
* Run the `docker-compose up --build`

```shell
git clone https://github.com/saif29oct/Docker-Dev-Environment.git
cd Docker-Dev-Environment/
docker-compose up --build
```
  
Your Dev Environment is now ready!! You can access it via `http://localhost`.
If everything goes fine the index page will shows all the installed packages are configured successfully. 

### Configuration
This package comes with default configuration options. you can customize them by overwritting the `.env`. file in your root directory.
But don't forget to backup it first.


_**APACHE_LOG_DIR**_

This will be used to store Apache logs. The default value for this is `./logs/apache2`.


_**MYSQL_DATA_DIR**_

MySQL data directory `./data/mysql`

_**MYSQL_LOG_DIR**_

MySQL log directory `./logs/mysql`.

#### Apache Modules

By default following modules are enabled.

* rewrite
* headers

> If you want to enable more modules, just update `./bin/webserver/Dockerfile`. You can also generate a PR and we will merge if seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

#### Connect via SSH

You can connect to web server using `docker-compose exec` command to perform various operation on it. Use below command to login to container via ssh.

```shell
docker-compose exec webserver bash
```

## PHP

> If you want to install more extension, just update `./bin/webserver/Dockerfile`. You can also generate a PR and we will merge if it seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

## Node Js

http://localhost:3000
## phpMyAdmin

phpMyAdmin is configured to run on port 8080. Use following default credentials.

http://localhost:8080/  
username: root  
password: tiger

## SOCKET IO

inspect index.php and monitor the console to check the Socket Connection.
