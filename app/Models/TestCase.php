<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

 
 
    protected $fillable = ['project_id','testsuite_id','project_code','testcase_name','testcase_precondition',
                            'expected_result','testcase_steps','switch_steps_raw','testcase_raw_details','testcase_steps_gherkins',
                            'testcase_steps_classic','testcase_steps_and','project_admin','remarks'];
}
