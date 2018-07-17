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

# Informações gerais do server
SERVER=$(hostname);
IP=$(ip a | grep inet | head -1);
USUARIOS=$(users);
DISTRO=$(cat /etc/*-release | grep DISTRIB_DESCRIPTION);
RELEASE=$(cat /etc/*-release | grep DISTRIB_RELEASE);