<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'Super_Admin']);
        Role::create(['name' => 'Teacher']);
        Role::create(['name' => 'Official']);

        $all_permissions = [
            [
                'module' => 'Dashboard',
                'permissions' => [
                    'Dashboard.View',
                ]
            ],
            [
                'module' => 'Category',
                'permissions' => [
                    'Category.List',
                    'Category.Create',
                    'Category.Show',
                    'Category.Edit',
                    'Category.Delete'
                ]
            ],
            [
                'module' => 'Course',
                'permissions' => [
                    'Course.List',
                    'Course.Create',
                    'Course.Copy',
                    'Course.Show',
                    'Course.Delete',
                    'Course.Status',
                    'Course.Price'
                ]
            ],
            [
                'module' => 'Course Content',
                'permissions' => [
                    'CourseContent.List',
                    'CourseContent.Create',
                    'CourseContent.Edit_Content',
                    'CourseContent.Delete',
                    'CourseContent.Status',
                ]
            ],
            [
                'module' => 'Course Details',
                'permissions' => [
                    'CourseDetails.Create',
                    'CourseDetails.Edit',
                    'CourseDetails.Show'
                ]
            ],
            [
                'module' => 'Course Discount',
                'permissions' => [
                    'Discount.List',
                    'Discount.Create',
                    'Discount.Edit',
                    'Discount.Show',
                    'Discount.Delete'
                ]
            ],
            [
                'module' => 'Classes',
                'permissions' => [
                    'Class.List',
                    'Class.Create',
                    'Class.Edit',
                    'Class.Show',
                    'Class.Delete',
                    'Class.Attendance',
                ]
            ],
            [
                'module' => 'Videos',
                'permissions' => [
                    'Video.List',
                    'Video.Create',
                    'Video.Edit',
                    'Video.Show',
                    'Video.Delete'
                ]
            ],
            [
                'module' => 'Live Videos',
                'permissions' => [
                    'LiveVideo.List',
                    'LiveVideo.Create',
                    'LiveVideo.Edit',
                    'LiveVideo.Show',
                    'LiveVideo.Delete'
                ]
            ],
            [
                'module' => 'Exam',
                'permissions' => [
                    'Exam.Dashboard',
                    'Exam.List',
                    'Exam.Create',
                    'Exam.Edit',
                    'Exam.Delete',
                    'Exam.Free_Result',
                ]
            ],
            [
                'module' => 'Class Attendance',
                'permissions' => [
                    'ClassAttendance.List',
                ]
            ],
            [
                'module' => 'Comment',
                'permissions' => [
                    'Comment.List',
                    'Comment.Show',
                    'Comment.Create',
                    'Comment.Delete',
                    'Comment.Status',
                    'Comment.Replay'
                ]
            ],
            [
                'module' => 'Community Post',
                'permissions' => [
                    'Post.List',
                    'Post.Show',
                    'Post.Create',
                    'Post.Delete',
                    'Post.Status',
                ]
            ],
            [
                'module' => 'Complain Box',
                'permissions' => [
                    'Complain.List',
                    'Complain.Show',
                    'Complain.Create',
                    'Complain.Delete',
                    'Complain.Status',
                ]
            ],
            [
                'module' => 'Student',
                'permissions' => [
                    'Student.List',
                    'Student.Show',
                    'Student.Create',
                    'Student.Delete',
                    'Student.Status',
                    'Student.D_Download',
                ]
            ],
            [
                'module' => 'Enrolment ',
                'permissions' => [
                    'Enroll.List',
                    'Enroll.Create',
                    'Enroll.Status',
                ]
            ],
            [
                'module' => 'Role Management ',
                'permissions' => [
                    'Role.List',
                    'Role.Create',
                    'Role.Edit',
                    'Role.Delete',
                ]
            ],
            [
                'module' => 'User Management ',
                'permissions' => [
                    'User.List',
                    'User.Create',
                    'User.Edit',
                    'User.Delete',
                ]
            ],
            [
                'module' => 'Teacher Management ',
                'permissions' => [
                    'Teacher.List',
                    'Teacher.Create',
                    'Teacher.Edit',
                    'Teacher.Delete',
                ]
            ],
            [
                'module' => 'Live Management ',
                'permissions' => [
                    'Live.Go_To_Live',
                    'Live.Set_Live_Timing',
                    'FB_Group_Live',
                    'FB_Group_Access_Code',
                    'Push_Notification',
                ]
            ],
            [
                'module' => 'Slider Management ',
                'permissions' => [
                    'Slider.List',
                    'Slider.Create',
                    'Slider.Edit',
                    'Slider.Delete',
                ]
            ],
            [
                'module' => 'Book Shop Management ',
                'permissions' => [
                    'Book.List',
                    'Book.Create',
                    'Book.Edit',
                    'Book.Delete',
                ]
            ],
            [
                'module' => 'Student Opinion',
                'permissions' => [
                    'Opinion.List',
                    'Opinion.Create',
                    'Opinion.Edit',
                    'Opinion.Delete',
                ]
            ], [
                'module' => 'Transfer',
                'permissions' => [
                    'Transfer.List',
                    'Transfer.Add',
                    'Transfer.Remove',
                    'Transfer.SpendTime',
                    'Transfer.Transfer',
                    'Transfer.Email',
                    'Transfer.Notification',
                    'Transfer.Community',
                    'Transfer.Profile',
                ]
            ], [
                'module' => 'Settings',
                'permissions' => [
                    'Our_Talk',
                    'Setting',
                    'Setting.Account',
                    'Setting.Basic',
                ]
            ], [
                'module' => 'Contact',
                'permissions' => [
                    'Contact.List',
                    'Contact.Edit',
                    'Contact.Delete',
                ]
            ], [
                'module' => 'Faq',
                'permissions' => [
                    'Faq.List',
                    'Faq.Create',
                    'Faq.Edit',
                    'Faq.Delete',
                ]
            ],
        ];

        foreach ($all_permissions as $permissions) {
            $module = $permissions['module'];
            foreach ($permissions['permissions'] as $permission) {
                $storePermission = Permission::create([
                    'name' => $permission,
                    'module' => $module,
                ]);
                $super_admin->givePermissionTo($storePermission);
                $storePermission->assignRole($super_admin);
            }
        }
        $admin = User::where('type', 'super_admin')->first();
        $admin->assignRole($super_admin);
    }
}
