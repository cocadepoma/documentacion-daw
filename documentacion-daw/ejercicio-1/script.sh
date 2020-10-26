#!/bin/bash

if [ $# -eq 1 ]
then
  mkdir $1
  cd $1
  wget https://github.com/dhg/Skeleton/releases/download/2.0.4/Skeleton-2.0.4.zip
  unzip Skeleton-2.0.4.zip
else
  echo Es obligatorio introducir el nombre de la carpeta
fi
