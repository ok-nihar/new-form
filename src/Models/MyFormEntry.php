<?php

namespace Niharb\MyForm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyFormEntry extends Model
{
    use HasFactory;

    protected $table = 'my_form_entries';
    protected $fillable = [
        'field1',
        'field2',
        'field3',
        'field4',
    ];
}