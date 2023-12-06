<?php
class JSON
{
    public static function getUser()
    {
		return GlobVar::setUser();
    }

    public static function getTemplate()
    {
        return GlobVar::setTemplate();
    }

    public static function getHeader()
    {

    }
}
