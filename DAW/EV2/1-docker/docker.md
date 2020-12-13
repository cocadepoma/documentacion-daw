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


### Crear contenedor Apache y Conectar
~~~
$ docker run -p 80:5000 --name miweb training/webapp
$ docker start miweb
$ docker stop miweb
$ docker container rm miweb
~~~

La `p` tiene que ir seguida de los puertos.

Agregando `--rm` se borrará automáticamente al pararlo.

Agregando `-d` se ejecutará en segundo plano.

~~~
$ docker run -p 80:5000 --name miweb --rm -d training/webapp
$ docker stop miweb
~~~

Copiar un contenedor de dentro de docker a nuestro disco, no hace falta indicar los puertos ya que no vamos a acceder via web:

~~~
$ docker run -p --name miweb --rm -d training/webapp
~~~

Copiar:
`docker cp nombrecontenedor:/ruta-del-archivo ruta-destino`
~~~
$ docker cp miweb:/opt/webapp/app.py .
~~~

Editamos el app.py

![](img/captura2.png)

Creamos el archivo `Dockerfile`, exactamente igual, con la D en mayúscula y dentro del archivo pondremos las instrucciones de lo que queremos hacer.

1. Primero indicar que imagen usamos como base, de cuál partimos. `FROM training/webapp`
2. (Opcional) Indicamos el mantenedor de la imagen `MAINTAINER pacors88@gmail.com`
3. Indicamos nuestro archivo, y la ruta donde va a ir dentro del contenedor. `COPY app.py /opt/webapp/`
4. Resultado del archivo `Dockerfile`:
   ~~~
   FROM training/webapp
   MAINTAINER pacors88@gmail.com
   COPY app.py /opt/webapp/
   ~~~
5. Guardamos y pasaremos a construir una imagen.

6. `docker build -t paco/nuevaweb .`
   - `t` indica el tag de la web
   - `.` le estamos diciendo que el archivo `Dockerfile` se encuentra en el directorio en el que nos situamos en ese momento.

   Si estamos registrados hay que poner nuestro nombre de usuario antes del nombre de la imagen `nombre_usuario/nombre_imagen`

7. Ahora podemos crear un contenedor de nuestra imagen.
   ~~~
   $ docker run -p 80:5000 --name newweb --rm paco/nuevaweb
   ~~~

![](img/captura3.png)
![](img/captura4.png)


## EJ2
1. Crear imagen httpd
    ~~~
    $ docker run --rm -p 8080:80 httpd
    ~~~
    Accedemos:
    ![](img/captura5.png)

2. Crear `Dockerfile`
   ~~~
   $ nano Dockerfile

   FROM httpd
   MAINTAINER soyl3y3nd4@hotmail.com
   COPY web/ /usr/local/apache2/htdocs
   ~~~

3. Construir imagen:
   ~~~
   $ docker build -t soyl3y3nd4/miweb:latest .
   ~~~

4. Subir a dockerhub
   ~~~
   $ docker push soyl3y3nd4/apache
   ~~~

5. Borrar contenedores e imagenes locales.
   ~~~
    $ docker image rm imagen -f
    $ docker container rm contenedor -f
   ~~~
6. Montar container con nuestro `dockerhub`
   ~~~
    $ docker run -p 80:80 --rm --name miweb soyl3y3nd4/apache
   ~~~
  