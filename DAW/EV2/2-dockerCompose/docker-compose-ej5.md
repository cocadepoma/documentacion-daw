`docker container prune` borra toos los containers

# ejercicio 5


## Crear image Apache PHP
Nos dirigimos a docker-hub y buscamos una version de php que venga con apache buscamos en esposed ports el puerto que debemos usar. En caso de no encontralo, deberiamos hacer un `docker pull nombre_imagen`, y luego hacer un `docker inspect nombre_imagen` para buscar los exposed ports.

Ahora para indexar el index.html y process.php hay que hacerlo mediante volúmenes. Le indicaremos la ruta del directorio dónde están situados los archivos y después la ruta de apache que busca a l ejecutarse, `/var/www/html`.

Ahora nos creamos un directorio llamado web y metemos los archivos dentro de forma que el index.html y process.php quedaran dentro de web.

Nuestro archivo ahora mismo quedará de la siguiente forma, si hacemos `docker-compose up`.
~~~
version: "3"
services:
  apachephp:
    image: php:apache
    container_name: pruebaapachephp
    ports:
      - 80:80
    volumes:
      - /home/paco/Documentos/ej5/web:var/www/html
~~~

Ahora con la imagen que hemos utilizado previamente, no tiene instalado mysqli, por lo que crearemos una nueva desde 0 con el comando `RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli`.

~~~
mkdir dockerfile
nano Dockerfile
build
~~~

Ahora que ya tenemos creado el archivo Dockerfile, le diremos al `docker-compose.yml` la ubicación de este archivo y se la indicaremos en la imagen pero en lugar de `image:` lo haremos con `build:`.

~~~
version: "3"
services:
  apachephp:
    build: ./dockerfile/
    container_name: pruebaapachephp
    ports:
      - 80:80
    volumes:
      - /home/paco/Documentos/ej5/web:/var/www/html
~~~

Probamos a hacer un docker-compose up y podemos comprobar que sigue sin funcionar, porque todavía le falta la BBDD.

## Crear image phpmyadmin
Ahora agregamos el segundo servicio: `phpmyadmin`.

La imagen es la última versión, le poner un nombre de contenedor, los puertos y le establecemos una variable de entorno `PMA_HOST: mariadb`:

~~~
version: "3"
services:
  apachephp:
    build: ./dockerfile/
    container_name: pruebaapachephp
    ports:
      - 80:80
    volumes:
      - /home/paco/Documentos/ej5/web:/var/www/html




  phpmyadmin:
    image: phpmyadmin/phpmyadmin:latest
    container_name: pruebaphp
    ports:
      - 8080:80
    environment:
      PMA_HOST: mariadb
~~~

Si hacemos `docker-compose up` y accedemos a localhost:8080 estará en marcha phpmyadmin, pero todavía sin BBDD por lo que no podremos acceder.

## Crear image mariadb

Elegimos la imagen `mariadb:latest` le damos un nombre de contenedor, y el ejercicio nos pide que creemos un volumen que se conecte con el directorio `/var/lib/mysql` a una carpeta llamada `db`. Este directorio es para tener un respaldo de las bases de datos.

Ahora para que se inicie una base de datos, agregaremos a mariadb el comando `command: --init-file /data/application/init.sql`, pero para que funcione debemos enlazarlo a un directorio local con las instrucciones.

Creamos un directorio llamado `sql` y dentro movemos el archivo `init.sql` y deberemos en volumes enlazarlo, al directorio `..../sql/init.sql`, quedando de la siguiente forma: `..../sql/init.sql:data/application/init.sql`.

Establecemos las variables de entorno que se nos pide:
environment:

    MYSQL_ROOT_USER = root
    MYSQL_ROOT_PASSWORD = admin
    MYSQL_DATABASE = testdb
    MYSQL_USER = user
    MYSQL_PASSWORD = user

Finalmente creamos las redes backend y frontend. Frontend sólo para apachephp y backend para las tres.

~~~
networks:
  frontend:
  backend:
~~~



~~~
version: "3"
services:
  apachephp:
    build: ./dockerfile/
    container_name: pruebaapachephp
    ports:
      - 80:80
    volumes:
      - /home/paco/Documentos/ej5/web:/var/www/html
    depends_on:
      - mariadb
    networks:
      - backend
      - frontend
  phpmyadmin:
    image: phpmyadmin/phpmyadmin:latest
    container_name: pruebaphp
    ports:
      - 8080:80
    environment:
      PMA_HOST: mariadb
    depends_on:
      - mariadb
    networks:
      - backend
  mariadb:
    image: mariadb:latest
    container_name: mdb
    volumes:
      - /home/paco/Documentos/ej5/db:/var/lib/mysql
      - /home/paco/Documentos/ej5/sql/init.sql:/data/application/init.sql
    command: --init-file /data/application/init.sql
    environment:
      MYSQL_ROOT_USER: root
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_DATABASE: testdb
      MYSQL_USER: user
      MYSQL_PASSWORD: user
    networks:
      - backend
networks:
  frontend:
  backend:
~~~
