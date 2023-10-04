<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @include('backend.admin.includes.header_links')
    <style>
        td{
            color: #494848;
        }
    </style>
</head>
<body onload="window.print();" class="bg-white text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr style="background: #494848;color: whitesmoke;">
                        <th>SL No</th>
                        <th class="text-center">Student Name</th>
                        <th>Father’s Name</th>
                        <th>Mother’s Name</th>
                        <th>Contact No</th>
                        <th>School/College Name</th>
                        <th>Email ID</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address(Thana)</th>
                        <th>Address (District)</th>
                        <th>No of Enrolled Courses</th>
                    </tr>
                    @foreach($course->users as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name ?? '' }}</td>
                            <td>{{ $student->father_name ?? '' }}</td>
                            <td>{{ $student->mother_name ?? '' }}</td>
                            <td>{{ $student->phone ?? '' }}</td>
                            <td>{{ $student->institute ?? '' }}</td>
                            <td>{{ $student->email ?? '' }}</td>
                            <td>{{ $student->gender ?? '' }}</td>
                            <td>{{ $student->dob ?? '' }}</td>
                            <td>{{ $student->thana ?? '' }}</td>
                            <td>{{ $student->district ?? '' }}</td>
                            <th>0</th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
