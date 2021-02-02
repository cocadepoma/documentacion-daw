# 1 Docker compose

- Crear archivo docker compose:
~~~
sudo docker-compose-yml
~~~

- En version debemos poner version 3. (Lenguaje YAML)
- En services introducimos los servicios que vamos a utilizar.

- Elegimos un nombre para el servicio y le indicaremos la imagen y los puertos.
~~~
version '3'
services:
    mi_servicio:
        image:phpmyadmin/phpmyadmin:latest
        ports:
         - 80:80
~~~

- Hacemos `docker-compose up` y se iniciará nuestro contenedor.


## Creación contenedor phpMyAdmin + mariaDB

1. Este phpmyadmin no tendrá base de datos, para ello habrá que agregar otro servicio, para ello deberemos agregar MySQL.

2. Para decir a PhPMyAdmin donde está la BBDD, tenemos que definir una variable de enterno para decir a que base de datos debe conectarse, para ello deberemos de agregarle al servicio la palabra `environment` y dentro escribiremos dónde está la base de datos: `PMA_HOST=db`.

3. A la base de datos hay que definirle la contraseña de acceso, para ello agregaremos una variable de entorno: `- MYSQL_ROOT_PASSWORD=admin`.

4. Podemos también agregarle un usuario y una contraseña: `MYSQL_USER=user` y `MYSQL_PASSWORD=user`.

5. Probamos a hacer `docker-compose up` e intentamos a hacer login con `user`, podremos comprobar que no nos deja conectar. Una de las razones puede ser porque hay que decirle a phpMyAdmin que depende de la base de datos, así arrancará primero la base de datos antes de ejecutar phpMyAdmin.

Para resolverlo debemos agregar al servicio `depends_on:` y en la siguiente linea `- dependencia`. 

~~~
version: '3'
services:
    mi_servicio:
        image: phpmyadmin/phpmyadmin:latest
        ports:
          - 80:80
        depends_on:
          - db
        environment:
          - PMA_HOST=db
  
    db:
        image: mariadb:latest
        environment:
            - MYSQL_ROOT_PASSWORD=admin
volumes:
  mivolumen:
~~~

1. Si esta base de datos se borra, perderíamos toda la información, sería recomendable crear un volumen para tener un respaldo de esa informació, agregaremos `volumes:` y en la linea siguiente, el nombre del volumen.
   
2. Ahora al servicio que va a usar ese volumen, deberemos indicarle el volumen o volúmenes que queremos que utilice. Le agregaremos `volumes:` y le indicamos el directorio que queremos tener respaldado, en el caso de mariaDB es `/var/lib/mysql`. Lo que ocurrirá es que nos respaldará el volumen pero lo ubicará en el directorio `/var/lib/docker/volumes/mi_volumen`.

3. Si queremos que ese volumen lo cree en un directorio específico, para ello le indicaremos el directorio en volumes pero dentro del servicio.

~~~
version: "3"
services:
  mi_servicio:
    image: phpmyadmin/phpmyadmin:latest
    container_name: pruebaphp
    ports:
      - 80:80
    depends_on:
      - db
    environment:
      - PMA_HOST=db
  db:
    image: mariadb:latest
    container_name: pruebamariadb
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_USER: user
      MYSQL_PASSWORD: user
    volumes:
      - /home/paco/Documentos/compose-prueba:/var/lib/mysql
~~~
   

1. Para definir redes, indicaremos `networks` y escribiremos los nombres de las redes que queremos:
~~~
networks:
  frontend:
  backend:
~~~
2. Ahora a nuestros servicios les agregaremos también `networks` y le especificaremos a cada uno una.

~~~
version: "3"
services:
  mi_servicio:
    image: phpmyadmin/phpmyadmin:latest
    container_name: pruebaphp
    ports:
      - 80:80
    depends_on:
      - db
    environment:
      - PMA_HOST=db
    networks:
      - frontend
  db:
    image: mariadb:latest
    container_name: pruebamariadb
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_USER: user
      MYSQL_PASSWORD: user
    volumes:
      - /home/paco/Documentos/prueba-compose:/var/lib/mysql
networks:
  - backend
  - frontend
~~~

3. Ahora si probamos a acceder a phpmyadmin, nos dará error porque cada uno está en su red y no están conectados entre ellos. Para ello deberemos de indicarle a un servicio las 2 redes, para que conecten entre ellos.

~~~
version: "3"
services:
  mi_servicio:
    image: phpmyadmin/phpmyadmin:latest
    container_name: pruebaphp
    ports:
      - 80:80
    depends_on:
      - db
    environment:
      - PMA_HOST=db
    networks:
      - frontend
      - backend
  db:
    image: mariadb:latest
    container_name: pruebamariadb
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_USER: user
      MYSQL_PASSWORD: user
    volumes:
      - /home/paco/Documentos/prueba-compose:/var/lib/mysql
    networks:
      - backend
networks:
  backend:
  frontend:
~~~

1. Si no queremos usar una imagen y queremos construirla, deberemos especificar `build: ruta-al-archivo-dockerfile`.

~~~
version: "3"
services:
  mi_servicio:
    build: ruta-al-archivo-dockerfile
    container_name: pruebaphp
    ports:
      - 80:80
    depends_on:
      - db
    environment:
      - PMA_HOST=db
    networks:
      - frontend
      - backend
  db:
    image: mariadb:latest
    container_name: pruebamariadb
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_USER: user
      MYSQL_PASSWORD: user
    volumes:
      - /home/paco/Documentos/prueba-compose:/var/lib/mysql
    networks:
      - backend
networks:
  backend:
  frontend:
~~~



### SINTAXIS
SINTAXIS - 1:
~~~
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_USER: user
      MYSQL_PASSWORD: user
~~~


SINTAXIS - 2:
~~~
    environment:
      - MYSQL_ROOT_PASSWORD=admin
      - MYSQL_USER=user
      - MYSQL_PASSWORD=user
~~~

