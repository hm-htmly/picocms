<?php
class GlobVar
{
    public static function getUser()
    {
        $json = file_get_contents(BASEURL.'data/user.json', true);
        
        return json_decode($json, true);
    }

    public static function getTitle()
    {
        $json = file_get_contents(BASEURL.'data/globals.json', true);
         
        return json_decode($json, true)['title'];
    }

    public static function getSlug()
    {
        $json = file_get_contents(BASEURL.'data/globals.json', true);
         
        return json_decode($json, true)['slug'];
    }

    public static function getTemplate()
    {
        $json = file_get_contents(BASEURL.'data/globals.json', true);
         
        return json_decode($json, true)['template'];
    }
}
