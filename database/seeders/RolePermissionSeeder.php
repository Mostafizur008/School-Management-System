<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // Permission List as array

      $permissions = [

          [
          'group_name' => 'Dashboard',
          'permissions' => [
              'Dashboard.view',
          ],
          ],
          [
          'group_name' => 'Admin',
          'permissions' => [
              // Admin Permissions
              'Admin.create',
              'Admin.view',
              'Admin.edit',
              'Admin.delete',
          ]
          ],
            [
             'group_name' => 'Employee',
             'permissions' => [
                // Employee Permissions
                'Employee.create',
                'Employee.view',
                'Employee.edit',
                'Employee.delete',
                // Salary Permission
                'E_Salary.view'
            ]
            ],
            [
            'group_name' => 'Student Management',
            'permissions' => [
                // Student Permissions
                'Student.create',
                'Student.view',
                'Student.edit',
                // All Fee Permission
                'Reg_fee.view',
                'Monthly_fee.view',
                'Yearly_fee.view',
                'Exam_fee.view',
                'Id.view',
            ]
            ],
            [
            'group_name' => 'Certificate Management',
            'permissions' => [
                // Student Certificate Permissions
                'Marksheet.view',
                'Testimonal.view',
                'Transfer.view',
            ]
            ],
            [
            'group_name' => 'Settings',
            'permissions' => [
                // Setting Permissions
                'Setting.view',
                'Setting.edit',
            ]
            ],
            [
            'group_name' => 'Role',
            'permissions' => [
               // Role Permissions
               'Role.create',
               'Role.view',
               'Role.edit',
               'Role.delete',
            ]
            ],
            [
            'group_name' => 'Profile',
            'permissions' => [
               // Profile Permissions
              'Profile.view',
              'Profile.edit',
              'Change_password.view',
              'Change_password.edit',
            ]
            ],
            [
            'group_name' => 'School Management',
            'permissions' => [
               // Class Permissions
               'Class.create',
               'Class.view',
               'Class.edit',
               'Class.delete',
               // Session Permissions
               'Session.create',
               'Session.view',
               'Session.edit',
               'Session.delete',
               // Shift Permissions
               'Shift.create',
               'Shift.view',
               'Shift.edit',
               'Shift.delete',
               // Subject Permissions
               'Subject.create',
               'Subject.view',
               'Subject.edit',
               'Subject.delete',
               // Syllabus Permissions
               'Syllabus.create',
               'Syllabus.view',
               'Syllabus.edit',
               'Syllabus.delete',
               // Building Permissions
               'Building.create',
               'Building.view',
               'Building.edit',
               'Building.delete',
               // Floor Permissions
               'Floor.create',
               'Floor.view',
               'Floor.edit',
               'Floor.delete',
               // Room Permissions
               'Room.create',
               'Room.view',
               'Room.edit',
               'Room.delete',
            ]
            ],
            [
            'group_name' => 'Exam Management',
            'permissions' => [
               // Exam Permissions
               'Exam.create',
               'Exam.view',
               'Exam.edit',
               'Exam.delete',
               // Short_code Permissions
               'Short_code.create',
               'Short_code.view',
               'Short_code.edit',
               'Short_code.delete',
               // Exam_mark Permissions
               'Exam_mark.create',
               'Exam_mark.view',
               'Exam_mark.edit',
               'Exam_mark.delete',
               // Routine Permissions
               'Routine.create',
               'Routine.view',
               'Routine.edit',
               'Routine.delete',
               // Exam Permissions
               'Mark.create',
               'Mark.view',
               'Mark.edit',
               // Grade Permissions
               'Grade.create',
               'Grade.view',
               'Grade.edit',
               'Grade.detail',
               // Admit Permissions
               'Admit.view',
            ]
            ],
            [
            'group_name' => 'System Management',
            'permissions' => [
                // Type Permissions
                'Type.create',
                'Type.view',
                'Type.edit',
                'Type.delete',
                // Instution Permissions
                'Institution.create',
                'Institution.view',
                'Institution.edit',
                'Institution.delete',
                // Passing Permissions
                'Passing.create',
                'Passing.view',
                'Passing.edit',
                'Passing.delete',
                // Country Permissions
                'Country.create',
                'Country.view',
                'Country.edit',
                // District Permissions
                'District.create',
                'District.view',
                'District.edit',
                // Upazila Permissions
                'Upazila.create',
                'Upazila.view',
                'Upazila.edit',
            ]
            ],
            [
            'group_name' => 'Library Management',
            'permissions' => [
                // Publisher Permissions
                'Publisher.create',
                'Publisher.view',
                'Publisher.edit',
                'Publisher.delete',
                // Author Permissions
                'Author.create',
                'Author.view',
                'Author.edit',
                'Author.delete',
                // B-Category Permissions
                'B-Category.create',
                'B-Category.view',
                'B-Category.edit',
                'B-Category.delete',
                // Book Permissions
                'Book.create',
                'Book.view',
                'Book.edit',
                'Book.delete',
                // Book-issue Permissions
                'Book_issue.create',
                'Book_issue.view',
                'Book_issue.edit',
                'Book_issue.delete',
            ]
            ],
        ];

         // Do same for the admin guard for tutorial purposes
         $roleAdmin = Role::create(['name' => 'admin']);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup,]);
                $roleAdmin->givePermissionTo($permission);
                $permission->assignRole($roleAdmin);
            }
        }
    }
}
