#!/bin/bash

# Inicializando Variaveis
CORES=0;
MAXMEM=0;
MAXSWAP=0;
MAXCPU=0;
PICOMEM="";
PICOCPU="";
PICOSWAP="";
INICIO=$(date '+%Y/%m/%d %H:%M:%S');
STAPACHE="(running)";
STMYSQL="(running)";


# pegando a quantidade de nucleos do server
COUNT=$(cat /proc/cpuinfo | grep cores | awk '{print $4}');
arr=$(echo $COUNT | tr " " "\n")

#Quebrando o array em variaveis e somando os cores
for i in $arr
do
    CORES=$(($CORES + $i))
done
# Formatando o total de cores calculados
CORES=$CORES".00";

# Executa o script principal
while true;
do
    FILE=0;

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

    echo ""

    echo "================================= Uso dos processadores ================================"

    echo ""

    USED=$(uptime | awk '{print $9}'); # Pega no uptime o uso de cpu no ultimo minuto
    USED=${USED/,/.};            
    USED=${USED/,/0};    

    TEMP=${USED/./};

    if [ $TEMP -gt $MAXCPU ];
    then
        FILE=1;
        MAXCPU=$TEMP;        
        PICOCPU=$(date -d 'today' '+%H:%I:%S');
        PROCCPU=$(ps aux | sort -nk 4 | tail -1);
        USERCPU=$(echo $PROCCPU | awk '{print $1}');
        CPUCPU=$(echo $PROCCPU | awk '{print $3}');
        MEMCPU=$(echo $PROCCPU | awk '{print $4}');
        PROCCPU=$(echo $PROCCPU | awk '{print $11}');
    fi

    FREECPU=$(echo "scale=2;($CORES - $USED)" | bc);

    echo "Total de cpus: "$CORES;
    echo "Cpus Utilizados: "$USED;
    echo "Cpus Livres: "$FREECPU;

    echo ""

    echo "========================================================================================"

    echo ""

    echo "=========================== Monitoramento de I/O ======================================="	

    echo ""

    #iostat -h # Le o uso atual I/O do sistema

    echo ""

    echo "========================================================================================"

    echo "======================== Monitoramento de Serviços ====================================="

    echo ""
    
    TEMP=$(systemctl status apache2 | grep Active | awk '{print $3}');
    if [ $TEMP != $STAPACHE ]
    then
        FILE=1;
        STAPACHE=$TEMP;
    fi

    echo "Apache: "$STAPACHE;

    TEMP=$(systemctl status mysql | grep Active | awk '{print $3}');
    if [ $TEMP != $STMYSQL ]
    then
        FILE=1;
        STMYSQL=$TEMP;
    fi

    echo "Mysql: "$STMYSQL;

    echo ""
    echo "========================================================================================"

    echo "=========================== Maiores valores monitorados ================================"
    
    echo ""
    MAXMEM2=$(echo "scale=2;($MAXMEM/1000)" | bc);
    MAXSWAP2=$(echo "scale=2;($MAXSWAP/1000)" | bc);
    echo "Maior memoria fisica usada: "$MAXMEM2"M";
    echo "Maior swap usado: "$MAXSWAP2"M";
    echo "Maior uso de CPU: "$MAXCPU;
   
    echo ""

    echo "========================================================================================"

    # Se teve mudanças salva os dados em um arquivo
    if [ $FILE -eq 1 ] 
    then
        FIM=$(date '+%Y/%m/%d %H:%M:%S');
        DATA="data/"$(date -d 'today' '+%d-%m-%Y')".data";
        >> ./$DATA;

        echo $INICIO > ./$DATA;

        LINHA=$MEMTOTAL;
        LINHA=$LINHA";"$MAXMEM2;
        LINHA=$LINHA";"$PICOMEM;
        LINHA=$LINHA";"$USERMEM;
        LINHA=$LINHA";"$CPUMEM;
        LINHA=$LINHA";"$MEMMEM;
        LINHA=$LINHA";"$PROCMEM;
        echo $LINHA >> ./$DATA;

        LINHA=$SWAPTOTAL;
        LINHA=$LINHA";"$MAXSWAP2;
        LINHA=$LINHA";"$PICOSWAP;
        LINHA=$LINHA";"$USERSWAP;
        LINHA=$LINHA";"$CPUSWAP;
        LINHA=$LINHA";"$MEMSWAP;
        LINHA=$LINHA";"$PROCSWAP;
        echo $LINHA >> ./$DATA;

        LINHA=$CORES;
        LINHA=$LINHA";"$MAXCPU;
        LINHA=$LINHA";"$PICOCPU;
        LINHA=$LINHA";"$USERCPU;
        LINHA=$LINHA";"$CPUCPU;
        LINHA=$LINHA";"$MEMCPU;
        LINHA=$LINHA";"$PROCCPU;        
        echo $LINHA >> ./$DATA;

        LINHA=$STAPACHE";"$STMYSQL;
        echo $LINHA >> ./$DATA;

        echo $FIM >> ./$DATA;        
    fi

    sleep 2 
    clear   
done
