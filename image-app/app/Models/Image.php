<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $date;
    public $time;

    public function setDateTime() : void
    {
        if(!empty($this->datetime)){
            $datetime = explode(' ', $this->datetime);
            $this->date = $datetime[0];
            $this->time = $datetime[1];
        }
    }
    
    public function translite($value)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
        );
     
        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z\.]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');    
     
        return $value;
    }

    
}
