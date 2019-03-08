<?php

namespace OrlandoLibardi\NewsletterCms\app;

use Excel;
use OrlandoLibardi\NewsletterCms\app\NewsletterUser;

class ServiceDownload
{
    /**
     * 
     */
    public static function excel($id)
    {
        if(!$id) return false;
        $data = self::getNewsletter($id);        
        $file_name = self::setFileName($data);
        $items = self::getList($data);
        return self::download($file_name, $items);
    }
    /**
     * 
     */
    public static function getNewsletter($id)
    {
        return Newsletter::find($id);
    }
    /**
     * 
     */
    public static function setFileName($data)
    {
        if(!$data) return false;
        return $data->title . ' - ' . sha1(time());
    }
    /**
     * 
     */
    public static function getList($data)
    {   
        if(!$data) return false;
        return $data->registereds->toArray();
    }
    /**
     * 
     */
    public function download($file_name, $items)
    {
        return Excel::create($file_name, 
                    function($excel) use ($items) 
                    {
                        $excel->sheet('Users', 
                            function($sheet) use ($items) {
                                $sheet->fromArray($items);
                            }
                        );
                    }
               )->download('csv');
    }
}

