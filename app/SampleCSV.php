<?php

namespace OrlandoLibardi\NewsletterCms\app;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SampleCSV
{

    public static function breakLine()
    {
        return "\r\n";
    }

    public static function separator()
    {
        return ";";
    }

    public static function download($file_name, $content)
    {
        $response = new StreamedResponse();

        $response->setCallBack(function () use($content) {
            echo $content;
        });

        $disposition = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $file_name . '.csv');

        $response->headers->set('Content-type', 'text/csv');
        $response->headers->set('Content-Disposition', $disposition);
        return $response;
    }

    public static function create($file_name, $items)
    {
        $items      = $items->toArray();
        $separator  = self::separator();
        $break_line = self::breakLine();        
        $content    = self::headerKeys($items, $separator, $break_line);        
        $content    .= self::contentValues($items, $separator, $break_line);

        return self::download($file_name, $content);       
    }

    public static function contentValues($items, $separator, $break_line)
    {
        $content = "";
        foreach($items as $key=>$item)
        {            
            $content .= implode($separator, $item) . $break_line;
        }
        return $content;
    }

    public static function headerKeys($items, $separator, $break_line)
    {
        [$keys, $values] = array_divide($items);
        return implode($separator, array_keys($values[0])) . $break_line;        
    }
}