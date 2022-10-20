<?php

function generateClinicHistory($record)
{
    $first_block = substr($record->first_name, 0, 1);
    $second_block = substr($record->first_surname, 0, 1);
    $third_block = str_replace("-", "", $record->birthday_date);
    $random_string = generateRandomString();
    $clinic_history = $first_block.$second_block.$third_block."-".$random_string;
    return $clinic_history;
}

function generateRandomString($caracters=4)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $caracters; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}