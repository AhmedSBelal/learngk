<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'user_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'user_create',
            ],
            [
                'id' => 13,
                'title' => 'user_edit',
            ],
            [
                'id' => 14,
                'title' => 'user_show',
            ],
            [
                'id' => 15,
                'title' => 'user_delete',
            ],
            [
                'id' => 16,
                'title' => 'user_access',
            ],
            [
                'id' => 17,
                'title' => 'article_create',
            ],
            [
                'id' => 18,
                'title' => 'article_edit',
            ],
            [
                'id' => 19,
                'title' => 'article_show',
            ],
            [
                'id' => 20,
                'title' => 'article_delete',
            ],
            [
                'id' => 21,
                'title' => 'article_access',
            ],
            [
                'id' => 22,
                'title' => 'site_setting_access',
            ],
            [
                'id' => 23,
                'title' => 'site_language_create',
            ],
            [
                'id' => 24,
                'title' => 'site_language_edit',
            ],
            [
                'id' => 25,
                'title' => 'site_language_show',
            ],
            [
                'id' => 26,
                'title' => 'site_language_delete',
            ],
            [
                'id' => 27,
                'title' => 'site_language_access',
            ],
            [
                'id' => 28,
                'title' => 'setting_create',
            ],
            [
                'id' => 29,
                'title' => 'setting_edit',
            ],
            [
                'id' => 30,
                'title' => 'setting_show',
            ],
            [
                'id' => 31,
                'title' => 'setting_delete',
            ],
            [
                'id' => 32,
                'title' => 'setting_access',
            ],
            [
                'id' => 33,
                'title' => 'site_translation_access',
            ],
            [
                'id' => 34,
                'title' => 'course_create',
            ],
            [
                'id' => 35,
                'title' => 'course_edit',
            ],
            [
                'id' => 36,
                'title' => 'course_show',
            ],
            [
                'id' => 37,
                'title' => 'course_delete',
            ],
            [
                'id' => 38,
                'title' => 'course_access',
            ],
            [
                'id' => 39,
                'title' => 'german_course_access',
            ],
            [
                'id' => 40,
                'title' => 'course_type_create',
            ],
            [
                'id' => 41,
                'title' => 'course_type_edit',
            ],
            [
                'id' => 42,
                'title' => 'course_type_show',
            ],
            [
                'id' => 43,
                'title' => 'course_type_delete',
            ],
            [
                'id' => 44,
                'title' => 'course_type_access',
            ],
            [
                'id' => 45,
                'title' => 'study_work_create',
            ],
            [
                'id' => 46,
                'title' => 'study_work_edit',
            ],
            [
                'id' => 47,
                'title' => 'study_work_show',
            ],
            [
                'id' => 48,
                'title' => 'study_work_delete',
            ],
            [
                'id' => 49,
                'title' => 'study_work_access',
            ],
            [
                'id' => 50,
                'title' => 'faq_create',
            ],
            [
                'id' => 51,
                'title' => 'faq_edit',
            ],
            [
                'id' => 52,
                'title' => 'faq_show',
            ],
            [
                'id' => 53,
                'title' => 'faq_delete',
            ],
            [
                'id' => 54,
                'title' => 'faq_access',
            ],
            [
                'id' => 55,
                'title' => 'enroll_edit',
            ],
            [
                'id' => 56,
                'title' => 'enroll_show',
            ],
            [
                'id' => 57,
                'title' => 'enroll_delete',
            ],
            [
                'id' => 58,
                'title' => 'enroll_access',
            ],
            [
                'id' => 59,
                'title' => 'contact_edit',
            ],
            [
                'id' => 60,
                'title' => 'contact_show',
            ],
            [
                'id' => 61,
                'title' => 'contact_delete',
            ],
            [
                'id' => 62,
                'title' => 'contact_access',
            ],
            [
                'id' => 63,
                'title' => 'gallery_create',
            ],
            [
                'id' => 64,
                'title' => 'gallery_edit',
            ],
            [
                'id' => 65,
                'title' => 'gallery_show',
            ],
            [
                'id' => 66,
                'title' => 'gallery_delete',
            ],
            [
                'id' => 67,
                'title' => 'gallery_access',
            ],
            [
                'id' => 68,
                'title' => 'team_create',
            ],
            [
                'id' => 69,
                'title' => 'team_edit',
            ],
            [
                'id' => 70,
                'title' => 'team_show',
            ],
            [
                'id' => 71,
                'title' => 'team_delete',
            ],
            [
                'id' => 72,
                'title' => 'team_access',
            ],
            [
                'id' => 73,
                'title' => 'review_create',
            ],
            [
                'id' => 74,
                'title' => 'review_edit',
            ],
            [
                'id' => 75,
                'title' => 'review_show',
            ],
            [
                'id' => 76,
                'title' => 'review_delete',
            ],
            [
                'id' => 77,
                'title' => 'review_access',
            ],
            [
                'id' => 78,
                'title' => 'profile_password_edit',
            ],
            [
                'id' => 79,
                'title' => 'translation_access',
            ],
            [
                'id' => 80,
                'title' => 'feature_create',
            ],
            [
                'id' => 81,
                'title' => 'feature_edit',
            ],
            [
                'id' => 82,
                'title' => 'feature_show',
            ],
            [
                'id' => 83,
                'title' => 'feature_delete',
            ],
            [
                'id' => 84,
                'title' => 'feature_access',
            ],
            [
                'id' => 85,
                'title' => 'job_create',
            ],
            [
                'id' => 86,
                'title' => 'job_edit',
            ],
            [
                'id' => 87,
                'title' => 'job_show',
            ],
            [
                'id' => 88,
                'title' => 'job_delete',
            ],
            [
                'id' => 89,
                'title' => 'job_access',
            ],
            [
                'id' => 90,
                'title' => 'job_application_create',
            ],
            [
                'id' => 91,
                'title' => 'job_application_edit',
            ],
            [
                'id' => 92,
                'title' => 'job_application_show',
            ],
            [
                'id' => 93,
                'title' => 'job_application_delete',
            ],
            [
                'id' => 94,
                'title' => 'job_application_access',
            ],
            [
                'id' => 95,
                'title' => 'work_access',
            ],
            [
                'id' => 96,
                'title' => 'dashboard_access'
            ]
        ];

        Permission::insert($permissions);
    }
}
