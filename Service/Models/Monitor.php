<?php
namespace Models;

class Monitor
{
    private $filePath;
    private $file;
    private $status;
    private $data;

    public function __construct()
    {
        $date = !empty($_POST['date']) ? $_POST['date'] : date('d-m-Y');
        $this->filePath = "/opt/monitor/".$date.".json";
        $this->data = $this->validateFile();

        if ($this->data != "false") {
            $this->analisys();
        }
    }

    public function validateFile()
    {
        if (file_exists($this->filePath)) {
            $data = json_decode(file_get_contents($this->filePath));
            return !empty($data->begin) ? $data : false;
        } else {
            return false;
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function analisys()
    {
        $hd        = $this->analisysHd();
        $memory    = $this->analisysMemory();
        $services  = $this->analisysServices();
        $processor = $this->analisysProcessor();
        $swap      = $this->analisysSwap();

        $alerts = array ("hd"        => $hd,
                         "memory"    => $memory,
                         "services"  => $services,
                         "processor" => $processor,
                         "swap"      => $swap);

        $this->data->alerts = $alerts;
    }

    public function analisysHd()
    {
        $hd = $this->data->hd;
        $percentual = $hd->used * 100;
        $percentual = $percentual / $hd->total;

        return $percentual > 75 ? true : false;
    }

    public function analisysMemory()
    {
        $this->data->memory->total = str_replace("G", "", $this->data->memory->total);
        $this->data->memory->total = str_replace(",", ".", $this->data->memory->total);
        $this->data->memory->total = $this->data->memory->total * 1000;

        $memory = $this->data->memory;


        $percentual = $memory->max * 100;
        $percentual = $percentual / $memory->total;

        return $percentual > 80 ? true : false;
    }

    public function analisysServices()
    {
        $situation = false;
        $services  = $this->data->services;

        foreach ($services as $service => $status) {
            $status = str_replace('(', '', $status);
            $status = str_replace(')', '', $status);
            
            $this->data->services->{$service} = $status;

            if ($status != "running") {
                $situation = true;
            }
        }

        return $situation;
    }

    public function analisysProcessor()
    {
        //cores":"6.00","max":"1080","pico":"21:09:38","user":"ricardo","cpu":"26.2","mem":"5.2","proc":"\/opt\/google\/chrome\/chrome"
        $cpu = $this->data->cpu;
        $max = $cpu->max;

        if (strlen($max) > 3) {
            $max = substr($max, 0, strlen($max) -1);
            $max = substr($max, 0, 1).".".substr($max, 1, strlen($max));
        } else {
            $max = "0.".$max;
        }

        $this->data->cpu->max = $max;

        $percentual = $cpu->max * 100;
        $percentual = $percentual / $cpu->cores;

        return $percentual > 80 ? true : false;
    }

    public function analisysSwap()
    {
        $this->data->swap->total = str_replace("G", "", $this->data->swap->total);
        $this->data->swap->total = str_replace(",", ".", $this->data->swap->total);
        $this->data->swap->total = $this->data->swap->total * 1000;

        $swap = $this->data->swap;

        $percentual = $swap->max * 100;
        $percentual = $percentual / $swap->total;

        return $percentual >= 50 ? true : false;
    }
}
