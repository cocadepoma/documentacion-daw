# EJ4
- [EJ4](#ej4)
  - [1 **Creación del contenedor**](#1-creación-del-contenedor)
  - [2 **Creación Dockerfile**](#2-creación-dockerfile)
  - [3 **Creación volumen.**](#3-creación-volumen)
  - [4 **Mostrar los módulos instalados de php**](#4-mostrar-los-módulos-instalados-de-php)

## 1 **Creación del contenedor**
1. Creamos la carpeta para el ejercicio `mkdir nombre_ejercicio`.

2. Nos dirigimos a dockerhub y buscamos la imagen que necesitamos, en este caso es una imagen de `php` con el servidor `apache`.
3. Una vez seleccionada la imagen que queremos, necesitamos descargar para comprobar el puerto en el cual trabaja.
   ~~~
   $ docker pull php:apache
   ~~~
4. Realizamos un inspect de la imagen para comprobar los `Exposed Ports`.
   ~~~
   $ docker inspect php:apache
   ~~~
   Podremos ver que es el puerto 80.

5. Ejecutamos un contenedor con la imagen
   ~~~
   $ docker run --rm -p 80:80 php:apache
   ~~~

6. Paramos contenedor porque en `localhost` no se muestra nada

7. Creamos otra:
   ~~~
   $ docker run --rm -it php:apache /bin/bash
   ~~~
   Si realizandos un inspect, en `workingdirs` veremos cuando relizamos una sesion interactiva donde el contenido aparecerá.
   Si listamos el contenido dentro del directorio con `ls`, podemos comprobar que no hay nada dentro.

8. Nos dirigimos a `etc/apache2/sites-enabled` y hacemos un cat a 000-default.conf
   Poderemos ver que el archivo apunto a /var/www/html/ pero dentro no hay nada por lo que tendremos que crear un `Dockerfile` con el contenido que queremos.
   
9. Salimos del contenedor.
   ~~~
   $ exit
   ~~~

## 2 **Creación Dockerfile**

1. Creamos el archivo `Dockerfile`
   ~~~
   $ nano Dockerfile
   ~~~
2. Introducimos los datos:
   ~~~
   FROM php:apache
   MAINTAINER pacors88@gmail.com
   COPY index.php /var/www/html  
   ~~~
3. Creamos la imagen con nuestro nombre+nombre_imagen y por último la `ubicación` del archivo Dockerfile. Como estamos situados en la terminal dentro del directorio donde tenemos el archivo, ponemos un `.`
   ~~~
   $ docker build -t soyl3y3nd4/ejercicio4 .
   ~~~
4. Creamos un contenedor con la nueva imagen.
   ~~~
   $ docker run --rm -p 80:80 soyl3y3nd4/ejercicio4
   ~~~
5. Nos dirigimos al navegador a `localhost:80` y debería de aparecer el `phpinfo`.

## 3 **Creación volumen.**

1. Tenemos que comprobar donde se generan los logs de apache.
   Para ello creamos un contenedor y comprobamos que se crean en `/var/log/apache2`.

2. Creamos una carpeta con el nombre `logs` en una ruta accesible.
3. Procedemos a crear un contenedor. Con la `-v` le indicamos el volumen
   ~~~
   $ docker run -p 80:80 -v ~/Documentos/ejercicio-4-DAW/logs:/var/log/apache2 soyl3y3nd4/ejercicio4
   ~~~
   En caso de que la carpeta `logs` no la hayamos creado, la creará automáticamente.
4. Si ahora nos dirigmos al directorio de logs que hemos creado previamente, podremos ver que han aparecido varios archivos. El `access.log` se actualiza cada vez que accedamos a `localhost` registrando las entradas a la página.


5. Observamos las últimas 10 líneas, siendo `-n número` el número de líneas que queremos ver. Si ponermos `-f` se quedará el archivo en seguimiento en la consola:
   ~~~
   $ tail -n 10 access.log
   ~~~
   
## 4 **Mostrar los módulos instalados de php**

1. Creamos un contenedor con una sesión interactiva.
   ~~~
   $ docker run --rm -it soyl3y3nd4/ejercicio4 /bin/bash
   ~~~

2. Listamos los módulos de php con `php -m`.
   ~~~  
   [PHP Modules]
   Core
   ctype
   curl
   date
   dom
   fileinfo
   filter
   ftp
   hash
   iconv
   json
   libxml
   mbstring
   mysqlnd
   openssl
   pcre
   PDO
   pdo_sqlite
   Phar
   posix
   readline
   Reflection
   session
   SimpleXML
   sodium
   SPL
   sqlite3
   standard
   tokenizer
   xml
   xmlreader
   xmlwriter
   zlib

   [Zend Modules]
   ~~~
