<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Render;
use Geekbrains\Application1\Models\User;

class UserController
{
    public function actionSave ()
    {
        $render = new Render();
        if (!empty($_GET)) {
            $user = new User($_GET['name'], strtotime($_GET['birthday']));
            $message = $user->addFunction();
            return $render->renderPage('user-add.tpl', [
                'title' => 'Форма добавления пользователя',
                'message' => $message
            ]);
        }
        return $render->renderPage('user-add.tpl', ['title' => 'Форма добавления пользователя']);
    }

}
