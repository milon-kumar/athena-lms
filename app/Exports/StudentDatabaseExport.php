<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentDatabaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = [];
        $course = Course::with('users')->findOrFail(courseId());
        foreach ($course->users as $key => $student){
            $students['serial'] = $key + 1;
            $students['name'] = $student->name;
            $students['father_name'] = $student->father_name;
            $students['mother_name'] = $student->mother_name;
            $students['phone']=$student->phone;
            $students['email'] = $student->email;
            $students['institute'] = $student->institute;
            $students['gender'] = $student->gender;
            $students['dob'] = $student->dob;
            $students['dob'] = $student->dob;
        }
        return $students;
    }
}
