<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'id' => 1,
                'key' => 'logo',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:33:40',
                'updated_at' => '2022-03-15 18:33:40'
            ],
            [
                'id' => 2,
                'key' => 'multiple images',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:36:08',
                'updated_at' => '2025-04-19 21:45:51'
            ],
            [
                'id' => 3,
                'key' => 'breadcrumb',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:36:31',
                'updated_at' => '2022-03-15 18:36:31'
            ],
            [
                'id' => 4,
                'key' => 'address',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:36:38',
                'updated_at' => '2022-03-15 18:36:38'
            ],
            [
                'id' => 5,
                'key' => 'phone-one',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:36:46',
                'updated_at' => '2022-03-15 18:36:46'
            ],
            [
                'id' => 6,
                'key' => 'phone-two',
                'date' => '2025-04-19 18:47:22',
                'number' => 50890949,
                'created_at' => '2022-03-15 18:36:54',
                'updated_at' => '2025-04-19 21:51:49'
            ],
            [
                'id' => 7,
                'key' => 'phone-whatsapp',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:01',
                'updated_at' => '2022-03-15 18:37:01'
            ],
            [
                'id' => 8,
                'key' => 'email',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:14',
                'updated_at' => '2022-03-15 18:37:14'
            ],
            [
                'id' => 9,
                'key' => 'facebook',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:23',
                'updated_at' => '2022-03-15 18:37:23'
            ],
            [
                'id' => 10,
                'key' => 'instagram',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:31',
                'updated_at' => '2022-03-15 18:37:31'
            ],
            [
                'id' => 11,
                'key' => 'https://twitter.com/KuwaitLgk',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:40',
                'updated_at' => '2022-03-26 20:11:26'
            ],
            [
                'id' => 12,
                'key' => 'linkedin',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:49',
                'updated_at' => '2022-03-15 18:37:49'
            ],
            [
                'id' => 13,
                'key' => 'map',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:37:56',
                'updated_at' => '2022-03-15 18:37:56'
            ],
            [
                'id' => 14,
                'key' => 'footer-desc',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:38:12',
                'updated_at' => '2022-03-15 18:38:12'
            ],
            [
                'id' => 15,
                'key' => 'home_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:38:22',
                'updated_at' => '2022-03-15 18:38:22'
            ],
            [
                'id' => 16,
                'key' => 'home_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:38:31',
                'updated_at' => '2022-03-15 18:38:31'
            ],
            [
                'id' => 17,
                'key' => 'about_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:38:40',
                'updated_at' => '2022-03-15 18:38:40'
            ],
            [
                'id' => 18,
                'key' => 'about_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:38:55',
                'updated_at' => '2022-03-15 18:38:55'
            ],
            [
                'id' => 19,
                'key' => 'course_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:04',
                'updated_at' => '2022-03-15 18:39:04'
            ],
            [
                'id' => 20,
                'key' => 'course_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:10',
                'updated_at' => '2022-03-15 18:39:10'
            ],
            [
                'id' => 21,
                'key' => 'study_work_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:19',
                'updated_at' => '2022-03-15 18:39:19'
            ],
            [
                'id' => 22,
                'key' => 'study_work_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:25',
                'updated_at' => '2022-03-15 18:39:25'
            ],
            [
                'id' => 23,
                'key' => 'blog_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:34',
                'updated_at' => '2022-03-15 18:39:34'
            ],
            [
                'id' => 24,
                'key' => 'blog_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:41',
                'updated_at' => '2022-03-15 18:39:41'
            ],
            [
                'id' => 25,
                'key' => 'review_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:48',
                'updated_at' => '2022-03-15 18:39:48'
            ],
            [
                'id' => 26,
                'key' => 'review_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:39:56',
                'updated_at' => '2022-03-15 18:39:56'
            ],
            [
                'id' => 27,
                'key' => 'team_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:03',
                'updated_at' => '2022-03-15 18:40:03'
            ],
            [
                'id' => 28,
                'key' => 'team_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:09',
                'updated_at' => '2022-03-15 18:40:09'
            ],
            [
                'id' => 29,
                'key' => 'job_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:17',
                'updated_at' => '2022-03-15 18:40:17'
            ],
            [
                'id' => 30,
                'key' => 'job_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:24',
                'updated_at' => '2022-03-15 18:40:24'
            ],
            [
                'id' => 31,
                'key' => 'gallery_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:31',
                'updated_at' => '2022-03-15 18:40:31'
            ],
            [
                'id' => 32,
                'key' => 'gallery_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:40',
                'updated_at' => '2022-03-15 18:40:40'
            ],
            [
                'id' => 33,
                'key' => 'faq_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:49',
                'updated_at' => '2022-03-15 18:40:49'
            ],
            [
                'id' => 34,
                'key' => 'faq_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:40:57',
                'updated_at' => '2022-03-15 18:40:57'
            ],
            [
                'id' => 35,
                'key' => 'contact_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:41:04',
                'updated_at' => '2022-03-15 18:41:04'
            ],
            [
                'id' => 36,
                'key' => 'contact_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:41:12',
                'updated_at' => '2022-03-15 18:41:12'
            ],
            [
                'id' => 37,
                'key' => 'about-section-one',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:41:21',
                'updated_at' => '2022-03-15 18:41:21'
            ],
            [
                'id' => 38,
                'key' => 'about-section-two',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:41:28',
                'updated_at' => '2022-03-15 18:41:28'
            ],
            [
                'id' => 39,
                'key' => 'about-section-three',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-15 18:41:35',
                'updated_at' => '2022-03-15 18:41:35'
            ],
            [
                'id' => 40,
                'key' => 'login_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 01:52:58',
                'updated_at' => '2022-03-17 01:52:58'
            ],
            [
                'id' => 41,
                'key' => 'login_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 01:53:17',
                'updated_at' => '2022-03-17 01:53:17'
            ],
            [
                'id' => 42,
                'key' => 'register_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 01:53:32',
                'updated_at' => '2022-03-17 01:53:32'
            ],
            [
                'id' => 43,
                'key' => 'register_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 01:53:45',
                'updated_at' => '2022-03-17 01:53:45'
            ],
            [
                'id' => 44,
                'key' => 'about-section-four',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 05:40:46',
                'updated_at' => '2022-03-17 05:40:46'
            ],
            [
                'id' => 45,
                'key' => 'about-section-five',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 05:41:01',
                'updated_at' => '2022-03-17 05:41:01'
            ],
            [
                'id' => 46,
                'key' => 'about-section-six',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 05:41:07',
                'updated_at' => '2022-03-17 05:41:07'
            ],
            [
                'id' => 47,
                'key' => 'about-section-seven',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 05:41:13',
                'updated_at' => '2022-03-17 05:41:13'
            ],
            [
                'id' => 48,
                'key' => 'course-desc-page',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-17 23:03:32',
                'updated_at' => '2022-03-17 23:03:32'
            ],
            [
                'id' => 49,
                'key' => 'privacy_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-18 00:37:28',
                'updated_at' => '2022-03-18 00:37:28'
            ],
            [
                'id' => 50,
                'key' => 'privacy_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-18 00:37:36',
                'updated_at' => '2022-03-18 00:37:36'
            ],
            [
                'id' => 51,
                'key' => 'terms_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-18 00:37:46',
                'updated_at' => '2022-03-18 00:37:46'
            ],
            [
                'id' => 52,
                'key' => 'terms_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-18 00:37:52',
                'updated_at' => '2022-03-18 00:37:52'
            ],
            [
                'id' => 53,
                'key' => 'privacy-page',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-18 00:44:09',
                'updated_at' => '2022-03-18 00:44:09'
            ],
            [
                'id' => 54,
                'key' => 'terms-page',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-18 00:44:14',
                'updated_at' => '2022-03-18 00:44:14'
            ],
            [
                'id' => 55,
                'key' => 'whatsapp',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-19 02:00:42',
                'updated_at' => '2022-03-19 02:00:42'
            ],
            [
                'id' => 56,
                'key' => 'test_seo_description',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-19 02:01:20',
                'updated_at' => '2022-03-19 02:01:20'
            ],
            [
                'id' => 57,
                'key' => 'test_seo_keywords',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-19 02:01:29',
                'updated_at' => '2022-03-19 02:01:29'
            ],
            [
                'id' => 58,
                'key' => 'enroll-affiliation-term',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-20 18:28:43',
                'updated_at' => '2022-03-20 18:28:43'
            ],
            [
                'id' => 59,
                'key' => 'enroll-withdrawal-term',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-20 18:32:31',
                'updated_at' => '2022-03-20 18:32:31'
            ],
            [
                'id' => 60,
                'key' => 'enroll-contract',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-20 18:33:18',
                'updated_at' => '2022-03-20 18:33:18'
            ],
            [
                'id' => 61,
                'key' => 'youtube',
                'date' => null,
                'number' => null,
                'created_at' => '2022-03-23 01:03:15',
                'updated_at' => '2022-03-23 01:03:15'
            ],
            [
                'id' => 62,
                'key' => 'hero images',
                'date' => null,
                'number' => null,
                'created_at' => '2025-04-22 18:56:02',
                'updated_at' => '2025-04-22 18:56:02'
            ]
        ];

        DB::table('settings')->insert($settings);
    }
}
