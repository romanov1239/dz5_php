<?php

namespace Geekbrains\Application1\Models;

class User
{
    private string $userName;
    private ?int $userBirthday;
    private static string $storageAddress = '/storage/birthdays.txt';

    public function __construct (string $name, int $birthday = null)
    {
        $this -> userName = $name;
        $this -> userBirthday = $birthday;

    }

    public function getUserName (): string
    {
        return $this -> userName;
    }

    public function setUserName (string $userName): void
    {
        $this -> userName = $userName;
    }

    public function getUserBirthday (): ?int
    {
        return $this -> userBirthday;
    }

    public function setUserBirthday (?int $userBirthday): void
    {
        $this -> userBirthday = $userBirthday;
    }

    public function setBirthDayFromString (?string $birthdayString): void
    {
        if ($birthdayString !== null && $birthdayString !== '') {
            $this -> userBirthday = strtotime ($birthdayString);
        }
    }

    public static function getAllUsersFromStorage (): array|false
    {
        $address = $_SERVER['DOCUMENT_ROOT'] . User::$storageAddress;
        if (file_exists ($address) && is_readable ($address)) {
            $file = fopen ($address, "r");
            $users = [];
            while (!feof ($file)) {
                $userString = fgets ($file);
                $userString = trim ($userString);

                if ($userString === '') {
                    continue;
                }

                $userArray = explode (",", $userString);

                $user = new User($userArray[0]);
                $user -> setBirthDayFromString ($userArray[1]);
                $users[] = $user;
            }
            fclose ($file);
            return $users;
        } else {
            return false;
        }
    }

    public function addFunction(): string
    {
        if (!isset($_GET['name']) || !isset($_GET['birthday'])) {
            return 'Не указаны параметры name и/или birthday';
        }

        $name = $_GET['name'];
        $birthday = $_GET['birthday'];

        if ($birthday === '') {
            return 'Не указана дата рождения';
        }

        $birthday = date('d-m-Y', strtotime($birthday));
        $address = $_SERVER['DOCUMENT_ROOT'] . User::$storageAddress;
        $file = fopen($address, "a");
        fwrite($file, "$name,$birthday\n");
        fclose($file);

        return 'Пользователь успешно добавлен';
    }
}