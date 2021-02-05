# EJ6


## 1 Creación imagen

1. Lo primero que debemos hacer es seleccionar una imagen de docker-hub. Seleccionamos la node:15.8.
2. Agregaremos el comando `useradd --user-group --create-home --shell /bin/false app`
   ~~~
    FROM node:15.8
    RUN useradd --user-group --create-home --shell /bin/false app
   ~~~
3. Para seleccionar la carpeta de trabajo, se hace con WORKDIR. Antes de seleccionar esa carpeta hay que crearla.
   ~~~
    RUN mkdir /usr/src/app
    WORKDIR /usr/src/app
   ~~~
4. Instalamos angular.
   ~~~
    RUN npm install -g @angular/cli
   ~~~
5. Exponemos el puerto 4200.
   ~~~
   EXPOSE 4200
   ~~~

6. El archivo Dockerfile nos habrá quedado así.
   ~~~
    FROM node:15.8
    RUN useradd --user-group --create-home --shell /bin/false app
    RUN mkdir /usr/src/app
    WORKDIR /usr/src/app
    RUN npm install -g @angular/cli
    EXPOSE 4200
   ~~~

## 2 Crear docker-compose

1. Este docker-compose sólo va a tener un servicio, debido a que sólo vamos a tener angular.
   ~~~
   version: "3"
    services:
    angular:
        image: soyl3y3nd4/angular
        container_name: container_angular
        ports:
        - 80:4200
        volumes:
        - ./project:/usr/src/app
        command: ng serve --host 0.0.0.0 --poll=2000
    ~~~
2. Si probamos a hacer un `docker-compose up` nos dará un aviso avisandonos de que no hay ningún proyecto que ejecutar.

3. Ahora deberemos de entrar al contenedor de forma interactiva para crear un proyecto y que nos lo cree:
   ~~~
    $ docker run --rm -it -v ~/Documentos/ej6/project:/usr/src/app soyl3y3nd4/angular /bin/bash
   ~~~
4. Ahora realizamos un `docker-compose up` y deberiamos de poder vver nuestro proyecto en `localhost`.

5. Al crearlo mediante un container, los archivos del proyecto pertenecen al usuario root, para poder modificarlos deberemos de hacernos dueños de los archivos.
   ~~~
    sudo chown paco:paco project -R
   ~~~
6. Ahora si deseamos crear un nuevo componente sin parar el container, sin cerrar la consola ejecutaremos el siguiente comando:
   ~~~
    docker exec -it container_angular ng g c nombre_componente
   ~~~
7. Finalmente los componentes creados de nuevo vuelven a tener como propietario a root, por lo que habrá que cambiarlo de nuevo.