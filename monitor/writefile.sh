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

    LINHA=$HDTOTAL";"$HDUSED";"$HDFREE;
    echo $LINHA >> ./$DATA;

    echo $FIM >> ./$DATA;        
fi
