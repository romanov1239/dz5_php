<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Render;
use Geekbrains\Application1\Models\User;

class UsersController
{
    public function actionIndex ()
    {
        $users=User::getAllUsersFromStorage();
        $render=new Render();
        if (!$users){
            return $render->renderPage (
                'user-empty.tpl',
                [
                    'title'=>'Список пользователей в хранилище',
                    'message'=>'Список пуст или не найден'
                ]
            );

        } else {
            return $render->renderPage (
                'user-index.tpl',
                [
                    'title'=>'Список пользователей в хранилище',
                    'users'=>$users
                ]
            );
        }
    }
}