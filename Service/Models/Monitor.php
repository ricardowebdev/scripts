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
        $data = $this->validateFile();

        if ($data) {
            $msg['status'] = 'success';
            $msg['data']   = $data;
        } else {
            $msg['status'] = 'error';
            $msg['data']   = 'arquivo inexistente ou inválido';
        }
        
        $this->status = $msg['status'];
        $this->data   = $msg['data'];
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

    public function getStatus()
    {
        return $this->status;
    }
}
