<?php

namespace Geekbrains\Application1\Controllers;
use Geekbrains\Application1\Render;
use Geekbrains\Application1\Models\SiteInfo;

class InfoController
{
    public function actionIndex (): string
    {
        $siteInfo=new SiteInfo();
        $info=$siteInfo->getInfo ();
        $render=new Render();
        return $render->renderPage ('site-info.tpl',$info);
    }
}