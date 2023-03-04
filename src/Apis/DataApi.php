<?php

namespace MyWebsite\Apis;

class DataApi
{

    protected $jsonDirectoryPath;

    public function __construct(string $jsonDirectoryPath)
    {
        $this->jsonDirectoryPath = ROOT_DATA_PATH . '/' . $jsonDirectoryPath;
    }

    public function getDataList()
    {
        $dataList = [];

        $filesList = scandir($this->jsonDirectoryPath);
        foreach ($filesList as $fileLoop) {
            if (substr(basename($fileLoop), -5) != '.json') continue;

            $dataList[] = json_decode(file_get_contents($this->jsonDirectoryPath . '/' . basename($fileLoop)));
        }

        return $dataList;
    }

    public function findAll()
    {
        return $this->getDataList();
    }
}
