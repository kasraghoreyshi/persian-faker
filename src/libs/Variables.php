<?php

namespace Kasraghoreyshi\PersianFaker\libs;

class Variables {

    const VARIABLES = [
        // list e kalamate farsi tarjihan faghede aadad va sefaat bashand
        'words' => ["خط", "شب", "صف", "آب", "آخر", "نان", "آتش", "نمک", "باغ", "میز", "مهد", "بدل", "برق", "ملت", "ملک", "ملل", "مشک", "صندلی", "ابزار", "پل", "پیچ", "محل", "گوشی", "کلمه", "تیم", "هتل", "کامپیوتر", "دایره", "صوت", "سایت", "پایه", "هنر", "موسیقی", "نوازش", "ساختار", "علم", "مربع", "غذا", "قضا", "پرنده", "مدرسه", "نور", "پول", "برنامه", "لباس", "عطر", "طبیعت", "آسمان", "عدد", "دانه", "کمک", "آشیانه", "عدالت", "دریا", "موج", "ساحل", "درخت", "لیوان", "کاغذ", "پارو", "برف", "الماس", "خودرو", "ساز", "دیجیتال", "میوه", "مدار", "الکتریک", "قفل", "تصویر", "دوربین", "پوشاک", "رنگ", "صندوق", "کلید", "خیابان", "چای", "محفل", "ثروت", "فیلم", "سریال", "ماکت", "ژاکت", "اتوبوس", "بلیط", "دامنه", "شیر", "جنگل", "بانک", "جام", "جایزه", "کشاورز", "کنترل", "دکان", "اسکله", "لوازم", "آرایش", "پوستر", "نقاشی", "قلم", "گردو", "ساعت", "چرخ", "گلیم", "فرش", "مجله", "روزنامه", "تاکسی", "اپلیکیشن", "دفتر", "دفترچه", "سلول", "شن", "دارو", "قرص", "شهر", "دریاچه", "بالین", "بالش", "قهوه", "آلاچیق"],
        'lorem' => "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد."
    ];

    function variable($name){

        if (array_key_exists($name, self::VARIABLES)) return self::VARIABLES[$name];

        return null;

    }
}
