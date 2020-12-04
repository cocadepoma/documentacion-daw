# Docker

Docker empaqueta una aplicación en un contenedor evitando tener que instalar una máquina virtual.
un contenedor es una imagen de Debian básica.


## 1. **Instalación**

1. Instalar Dependencias:
   ~~~
    $ sudo apt install linux-image-generic linux-image-extra-virtual
   ~~~

2. Instalar Docker:
   ~~~
   $ sudo apt install docker docker.io docker-compose
   ~~~

   En caso de error de dependencia containerd: `sudo apt install containerd`

3. Agregarnos al grupo docker para tener permisos:
   ~~~
   $ sudo usermod -aG docker $(whoami)
   ~~~

4. Reiniciamos el ordenador o también podemos cerrar sesión y volver a abrir.


5. Crear contenedor. `docker run` lo creará, indicamos puertos (puertoDeNuestroPC:puertoDelContenedor) y la imagen que vamos a utilizar (httpd). Si agregamos el -d nos lo ejecutará en segundo plano:
   ~~~
   $ docker run -d -p 80:80 --name apache httpd

   $ docker run -p 80:80 -d nginxdemos/hello

   $ docker container stop <nombreContenedor>
   ~~~

## 2. **Comandos**
- Ver contenedores que tenemos funcionando:
  ~~~
  $ docker container ls
  ~~~

- Ver todos los contenedores que tenemos creados:
  ~~~
  $ docker container ls -a
  ~~~
  
- Ejecutar un contenedor que ya existe:
  ~~~
  $ docker start nombre_contenedor

  $ docker container --help
  ~~~

- Ver imágenes. 
   ~~~
   $ doker image ls
   ~~~

- Borrar un contenedor o imagen. Para poder borrar una imagen, hay primero que borrar el contenedor, o forzar el borrado.
  ~~~
  $ docker image rm nombre_imagen o id_imagen

  $ docker container rm nombre_contenedor o id_imagen
  ~~~

- Mostrar logs de un contenedor
   ~~~
   $ docker logs nombre_contenedor
   ~~~

- Reiniciar contenedor
   ~~~
   $ docker restart nombre_contenedor
   ~~~

- Como saber que puertos está usando:
  ~~~
  docker inspect httpd
  ~~~
  ![](,/../img/captura1.png)


- Ejecutar comandos dentro del contenedor. Las `i` y `-t` crean un proceso en el contenedor que nos permitiran interactuar con el contenedor, pueden ponerse también juntas `-it`. 

  ~~~
  $docker exec -i -t nombre_contenedor interprete
  ~~~

  - Ejemplo de uso:
    ~~~
    $ docker exec -it apache /bin/bash
    ~~~

  Ahora pasaremos a trabajar con la terminal dentro del contenedor y por defecto nos lleva al directorio de apache.

  En el archivo `conf/httpd.conf` podremos ver la configuración de apache. Podemos consultarlo con `more httpd.conf`.


  En `htdocs` está el index.html, `apt update` y después `apt install nano` y podremos cambiar contenidos del archivo index.html.

  Para salir del contenedor `exit`. Debemos de tener en cuenta que el contenedor sigue en marcha, en caso de pararlo y arrancarlo, se quedan guardados los cambios que hayamos hecho.

### 3. Crear contenedor webapp, acceder, realizar modificaciones y reiniciar.

  ~~~
  $ docker run -p 8080:5000 --name webapp training/webapp

  $ docker exec -it webapp /bin/bash

  $ apt install nano

  $ nano app.py

  $ exit

  $ docker restart webapp
  ~~~

  Ahora podremos observar los cambios realizados en `app.py`.
