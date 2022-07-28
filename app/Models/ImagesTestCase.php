<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesTestCase extends Model
{
    use HasFactory;

    protected $fillable = ['testcase_id','attachment_path'];

}
