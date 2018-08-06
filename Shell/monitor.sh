#!/bin/bash
source ./server.sh;

while true;
do
    FILE=0;

    source ./memoria.sh;   #Pesquisa os dados da memoria
    source ./cpu.sh;       #Pesquisa o uso dos processadores
    source ./hd.sh;        #Pesquisa o uso do HD
    source ./services.sh;  #Pesquisa determinados serviços e seus status
    source ./maxvalues.sh; #Calcula os maiores valores armazenados
    source ./writefile.sh;

    sleep 10; 
    clear   
done
