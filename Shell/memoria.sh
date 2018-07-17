#!/bin/bash

echo "=================================== Uso da Memoria ====================================="

echo ""

MEMORY=$(free | grep Mem | awk '{print $3}'); # Pega a memoria fisica usada
MEMTOTAL=$(free -h | grep Mem | awk '{print $2}'); # Pega o total da memoria fisica
TEMP=${MEMORY/,/.};        

if [ $TEMP -gt $MAXMEM ];
then 
    FILE=1;
    MAXMEM=$TEMP;
    PICOMEM=$(date -d 'today' '+%H:%I:%S');
    PROCMEM=$(ps aux | sort -nk 4 | tail -1)
    USERMEM=$(echo $PROCMEM | awk '{print $1}');
    CPUMEM=$(echo $PROCMEM | awk '{print $3}');
    MEMMEM=$(echo $PROCMEM | awk '{print $4}');
    PROCMEM=$(echo $PROCMEM | awk '{print $11}');
fi

SWAP=$(free | grep Swap | awk '{print $3}');  # Pega o swap utilizado
SWAPTOTAL=$(free -h | grep Swap | awk '{print $2}');
TEMP=${SWAP/,/.};

if [ $TEMP -gt $MAXSWAP ];
then
    FILE=1;
    MAXSWAP=$TEMP;        
    PICOSWAP=$(date -d 'today' '+%H:%I:%S');
    PROCSWAP=$(ps aux | sort -nk 4 | tail -1);
    USERSWAP=$(echo $PROCSWAP | awk '{print $1}');
    CPUSWAP=$(echo $PROCSWAP | awk '{print $3}');
    MEMSWAP=$(echo $PROCSWAP | awk '{print $4}');
    PROCSWAP=$(echo $PROCSWAP | awk '{print $11}');
fi

MEMORY=$(free -h | grep Mem | awk '{print $3}'); # Pega a memoria fisica usada
TEMP=${MEMORY/,/.};            

echo "Memoria Disponivel: "$MEMTOTAL;
echo "Memoria usada: "$MEMORY;	

SWAP=$(free -h | grep Swap | awk '{print $3}');  # Pega o swap utilizado
TEMP=${SWAP/,/.};    
echo "Uso do Swap: "$SWAP;

echo ""

TEMP=0;
echo "========================================================================================"    
