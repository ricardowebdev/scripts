echo "================================= Uso dos processadores ================================";
echo "";

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
