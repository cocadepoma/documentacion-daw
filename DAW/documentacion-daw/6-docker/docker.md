# Docker

## 1. Instalación

~~~
$ sudo apt install linux-image-generic linux-image-extra-virtual

$ sudo apt install docker docker.io docker-compose

~~~

En caso de error de dependencia cantainerd: `sudo apt install containerd`

Damos permisos: `$ sudo usermod -aG docker $(whoami)`

Cerramos y volvemos a abrir sesión.

Crear servidor:
~~~
$ docker run -p 80:80 -d nginxdemos/hello

$ docker container ls

$ docker container stop <nombreContenedor>
~~~