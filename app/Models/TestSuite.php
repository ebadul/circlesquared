<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSuite extends Model
{
    use HasFactory;

    protected $fillable = ['testsuite_name','project_id','parent_testsuite_id','testsuite_description',
    'testsuite_precondition','project_admin'];

    public function testcases(){
        return $this->hasMany(TestCase::class, 'testsuite_id');
    }
}
