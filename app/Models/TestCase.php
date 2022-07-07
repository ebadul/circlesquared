<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

 
 
    protected $fillable = ['project_id','project_code','testcase_name','testcase_precondition',
                            'expected_result','testcase_steps','testcase_steps_raw','testcase_steps_when',
                            'testcase_steps_then','testcase_steps_and','project_admin','remarks'];
}
