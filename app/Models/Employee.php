<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'department_id', 'name', 'nik', 'active', 'joined', 'dob'
    ];

    protected $casts = [
        'joined' => 'datetime',
        'active' => 'boolean'
    ];

    function scopeJoinTable($query){
        return $query->select(['employees.*', 'master_companies.name as company_name', 'master_departments.name as department_name'])
            ->join('master_companies', 'master_companies.id', '=', 'employees.company_id')
            ->join('master_departments', 'master_departments.id', '=', 'employees.department_id');
    }

    function scopeFilter($query, $keyword){
        if(empty($keyword))
            return $query;
        else
            return $query->where('employees.name', 'like', '%'.$keyword.'%');
    }
}
