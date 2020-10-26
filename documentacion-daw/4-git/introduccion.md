# GitHub
https://www.diegocmartin.com/tutorial-git/

Git es un controlador de versiones
Toma instantáneas del código en un estado determinado, autor y fecha.

`Commit` es una imagen formada por un conjunto de cambiar guardados en el repositorio

`head` es el puntero al último commit de rama activa

Para saber si tenemos git configurado en el equipo:
~~~
$ git config --global --list 
~~~

## Configurar Email y Usuario

Como mínimo debemos configurar el nombre y el email en la aplicación con los siguientes comandos:

Para configurar el usuario:
~~~
$ git config --global user.name <<nombre usuario>>
~~~

Para configurar el email:
~~~
$ git config --global user.email <<email>>
~~~

Para comprobar podemos usar:

~~~
$ git config -–global –list
~~~

## Trabajar con GIT

Ahora con git init y el nombre del proyecto, creamos un nuevo proyecto:
~~~
$ git init <<nombre proyecto>>
~~~

Con el siguiente comando podemos saber el estado de la carpeta GIT:
~~~
$ git status
~~~


Creamos un archivo
~~~
$ nano README.md
~~~
Si volvemos a hacer `git status` podemos comprobar que el archivo nuevo esta ahí pero no está agregado al controlador de versiones. Lo agregamos al controlador de versiones para que lo vigile.

~~~
$ git add README.md
~~~

Creamos otro archivo:
~~~
$ nano archivo.txt
~~~

Ahora si modificamos README.md y hacemos `git status` podemos comprobar que nos aparece una archivo para actualizar y otro para incluir.

`-a` para que guarde todos los archivo que han cambiado, y `m` para el mensaje, creará una nueva imagen.

~~~
$ git commit -am "cambios"
~~~

Parsa ver los cambios
~~~
$ git log
~~~

Entramos dentro de una carpeta
~~~
$ git init
~~~

Agregar todos los archivos que hay en la carpeta:
~~~
$ git add .
~~~
Esto afecta a todos los archivos recursivamente, afectando a los que esten también dentro de los subdirectorios.

Crear imagen de todo el directorio, una instantánea de todo
~~~
$ git commit -am "primer commit a todo"
~~~

Si modificamos un archivo, habría que confirmar los cambios con un commit.

1. Creamos cuenta GIT
2. Nos dirigimos a la carpeta raíz de usuario, creamos una carpeta llamada .ssh. Nos movemos a ella y mediante el comando shh-keygen creamos una clave asociada a la cuenta de correo. Vamos a emplear una clave tipo RSA, de modo que el comando quedaría:
    ~~~~
    ssh-keygen -t rsa -C “correo@dominio.com”
    ~~~~

3. Enter, enter y por defecto nos crea la clave en ~/.shh/id_rsa.pub
4. cat ~/.ssh/id_rsa.pub y nos aparecerá la clave
5. Ahora iniciamos sesión en GitHub y nos vamos a Settings à SSH Keys y creamos una nueva, indicando un nombre descriptivo y la clave pública que hemos copiado previamente.
6. Introducimos en la terminal ssh -T git@github.com y deberíamos autenticarnos correctamente.



### Comandos Git
Comandos y manual
~~~
$ git commit -h 
$ man git 
~~~

borrar directorio que contenga archivos
~~~
rm -r .git
~~~
borrar directorio que contenga también algún archivo de sólo lectura
~~~
rm -rf .git
~~~




# GIT
una vez añadida la ssh a nuestro pc, creamos un directorio, realizamos git init, y hacemos un git clone `direccion ssh`.

Se nos copiará el repositorio remoto en el local.

Creamos archivos, carpetas o modificamos cosas.
git add `archivo`
git push

Cuando lleguemos a casa `git pull` para actualizar nuestro repositorio local con el que hay en el remoto.

# Apuntes
## Sistemas de control de veriones (GIT)
### Comandos básicos
### Repositorios remotos (Github)

### Integración (merge)

#### Conflictos (resolución manual)
#### Conflictos (resolución con meld)

