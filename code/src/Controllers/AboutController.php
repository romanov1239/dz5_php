<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Models\Phone;
use Geekbrains\Application1\Render;

class AboutController
{
    public function actionIndex ()
    {
        $phone = (new Phone()) -> getPhone ();
        $render = new Render();

        try {
            return $render -> renderPage ('about.tpl', [
                'phone' => $phone
            ]);
        } catch (\Exception $e) {
            return $e -> getMessage ();
        }
    }
}