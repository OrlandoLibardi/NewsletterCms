<?php

namespace OrlandoLibardi\NewsletterCms\app;

use OrlandoLibardi\NewsletterCms\app\SampleCSV;
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
        $time = \Carbon\Carbon::now()->format('Y_m_d_H_i');
        return $time . '_' . str_slug($data->title);
    }
    /**
     * 
     */
    public static function getList($data)
    {   
        if(!$data) return false;
        return $data->registereds;
    }
    /**
     * 
     */
    public static function download($file_name, $items)
    {
        return SampleCSV::create($file_name, $items);
        
    }
}

