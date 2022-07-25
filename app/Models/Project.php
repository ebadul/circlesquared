<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected  $fillable=['project_code','project_name','project_description',
                        'project_logo_path','project_remarks','project_type','project_admin'];


    public function settings(){
        return $this->hasMany(ProjectSetting::class,'project_id');
    }

    public function testsuites(){
        return $this->hasMany(TestSuite::class,'project_id');
    }

    public function testcases(){
        return $this->hasMany(TestCase::class,'project_id');
    }
}
