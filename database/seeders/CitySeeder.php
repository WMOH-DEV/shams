<?php

namespace Database\Seeders;

use App\Models\admin\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'تبوك',
            'الرياض',
            'الطائف',
            'مكة المكرمة',
            'حائل',
            'بريدة',
            'الهفوف',
            'الدمام',
            'المدينة المنورة',
            'ابها',
            'جازان',
            'جدة',
            'المجمعة',
            'الخبر',
            'حفر الباطن',
            'خميس مشيط',
            'احد رفيده',
            'القطيف',
            'عنيزة',
            'قرية العليا',
            'الجبيل',
            'النعيرية',
            'الظهران',
            'الوجه',
            'بقيق',
            'الزلفي',
            'خيبر',
            'الغاط',
            'املج',
            'رابغ',
            'عفيف',
            'ثادق',
            'سيهات',
            'تاروت',
            'ينبع',
            'شقراء',
            'الدوادمي',
            'الدرعية',
            'القويعية',
            'المزاحمية',
            'بدر',
            'الخرج',
            'الدلم',
            'الشنان',
            'الخرمة',
            'الجموم',
            'المجاردة',
            'السليل',
            'تثليث',
            'بيشة',
            'الباحة',
            'القنفذة',
            'محايل',
            'ثول',
            'ضبا',
            'تربه',
            'صفوى',
            'عنك',
            'طريف',
            'عرعر',
            'القريات',
            'سكاكا',
            'رفحاء',
            'دومة الجندل',
            'الرس',
            'المذنب',
            'الخفجي',
            'رياض الخبراء',
            'البدائع',
            'رأس تنورة',
            'البكيرية',
            'الشماسية',
            'الحريق',
            'حوطة بني تميم',
            'ليلى',
            'بللسمر',
            'شرورة',
            'نجران',
            'صبيا',
            'ابو عريش',
            'صامطة',
            'احد المسارحة',
            'مدينة الملك عبدالله الاقتصادية',
        ];

        foreach ($cities as $city){
            City::create([
                'name' => $city]);
        }

    }
}
