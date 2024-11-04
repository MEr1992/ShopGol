<?php

$lang = [
    // ******************* Products *************************
    'count_product' => 'تعداد محصول',
    'thumbnail' => 'تصویر بندانگشتی',
    'download_count' => 'تعداد دانلود',
    'size' => 'اندازه',
    'level' => 'سطح',
    'views' => 'بازدیدها',
    'youtube' => 'یوتیوب',
    'content' => 'محتوا',
    'all' => 'همه',
    'users' => 'کاربران',
    'site_texts' => 'تنظیمات سایت',
    'keywords' => 'کلیدواژه‌ها',
    'keyword' => 'کلیدواژه',
    'topic' => 'دسته‌بندی',
    'topics' => 'دسته‌بندی‌ها',
    'biography' => 'بیوگرافی',
    'blog' => 'وبلاگ',
    'creator' => 'ایجاد کننده',
    'editor' => 'ویرایشگر',
    'created_at' => 'تاریخ ثبت',
    'comments' => 'نظرات',
    'profile' => 'پروفایل',
    'birthdate' => 'تاریخ تولد',
    'code' => 'کد',
    'title_en' => 'عنوان',
    'description_en' => 'توضیحات',
    'display_status' => 'وضعیت نمایش',
    'display' => 'نمایش',
    'text_en' => 'متن',
    'active' => 'فعال',
    'inactive' => 'غیرفعال',
    'new_password_confirmation' => 'تأیید رمز عبور',
    'change' => 'تغییر',
    'view_more' => 'مشاهده بیشتر',
    'title_fa' => 'عنوان',
    'text_fa' => 'توضیح',
    'photo' => 'تصویر',
    'view_info' => 'مشاهده جزییات',
    'detail' => 'جزییات',
    'image_pdf' => 'تصاویر (pdf)',
    'audio' => 'صوت',
    'about'=>'درباره',
    'files'=>'فایلها',
    'count'=>'تعداد',
    'report'=>'گزارش',
    'more_detail'=>'جزییات بیشتر',
];

$menus = include(__DIR__.'/./menus.php');
$lang = array_merge($lang, $menus);

$login = include(__DIR__.'/./login.php');
$lang = array_merge($lang, $login);

$menus = include(__DIR__.'/./menus.php');
$lang = array_merge($lang, $menus);

$breadcrumbs = include(__DIR__.'/./breadcrumbs.php');
$lang = array_merge($lang, $breadcrumbs);

$adminPublic = include(__DIR__.'/./admin-public.php');
$lang = array_merge($lang, $adminPublic);

if (\App::getLocale() == 'en') {
    $lang2 = include(__DIR__.'/./fa-words.php');
    $lang = array_merge($lang, $lang2);
}

return $lang;
?>
