<?php

class Monitor
{
    private $filePath;
    private $file;


    public function __construct()
    {
        $date = !empty($_POST['date']) ? $_POST['date'] : date('d-m-Y');
        $this->filePath = "/opt/monitor/".$date.".data";

        if ($this->validateFile()) {
            $msg['status'] = 'success';
            $msg['data']   = $this->handleInfo();
        } else {
            $msg['status'] = 'error';
            $msg['data']   = 'arquivo inexistente ou inválido';
        }

        $this->sendAnswer($msg);
    }

    public function validateFile()
    {
        if (file_exists($this->filePath)) {
            $this->file = file($this->filePath);
            $lines      = count($this->file);

            return $lines == "8" ? true : false;
        } else {
            return false;
        }
    }

    public function handleInfo()
    {
        $begin    = $this->file[0];
        $server   = explode(";", $this->file[1]);
        $memory   = explode(";", $this->file[2]);
        $swap     = explode(";", $this->file[3]);
        $cpu      = explode(";", $this->file[4]);
        $services = explode(";", $this->file[5]);
        $hd       = explode(";", $this->file[6]);
        $end      = $this->file[7];

        $temp      = explode("=", $server[4]);
        $server[4] = $temp[1];

        $temp      = explode("=", $server[3]);
        $temp[1]   = str_replace('"', "", $temp[1]);
        $server[3] = $temp[1];

        $data = array("begin"    => $begin,
                      "end"      => $end,
                      "server"   => $server,
                      "swap"     => $swap,
                      "cpu"      => $cpu,
                      "memory"   => $memory,
                      "services" => $services,
                      "hd"       => $hd);
        return $data;
    }

    public function sendAnswer($msg)
    {
        echo json_encode($msg);
    }
}
