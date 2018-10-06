<?php

namespace narwanimonish\CSVHelper;

class CSVHelper
{
    // Build wonderful things

    public static function parseCSV($fileName, $isHeaders = true) 
    {
        $extractData = [];
        $csvArray = [];

        if($fileName) {
            $fp = fopen($fileName, 'r');
            if($fp) {

                while ($row = fgetcsv($fp)) {
                    $csvArray[] = $row;
                }

                fclose($fp);

                $headers = [];
                foreach($csvArray as $key=>$data) {
                    $temp = [];
                    if($isHeaders) {
                        if($key == 0) {
                            $headers = $data;
                            continue;
                        }
                        foreach($data as $key1=>$value) {
                            $temp[$headers[$key1]] = $value;
                        }
                    } else {
                        foreach($data as $key1=>$value) {
                            $temp[] = $value;
                        }  
                    }
                    $extractData[] = $temp;
                }
            }
        }
        return $extractData;
    }

    public static function createCSV($contents, $filePath, $isHeaders = true) 
    {
        $fp = fopen($filePath, 'w');
        $isFirst = 1;
        foreach($contents as $content) 
        {
            if($isHeaders && $isFirst) {
                $headers = [];
                foreach($content as $key=>$value) {
                    $headers[] = $key;
                }
                fputcsv($fp, $headers);
                $isFirst = 0;
            } 
            fputcsv($fp, $content);
            
        }
        fclose($fp);
        return $filePath;
    }
}