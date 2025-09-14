<?php

namespace Database\Seeders;

use App\Models\MovieNews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieNewsSeeder extends Seeder
{
    public function run(): void
    {
        MovieNews::truncate();

        $newsArticles = [
            [
                'title' => 'Jeff Goldblum ลาอีกครั้ง! Ian Malcolm จะไม่ปรากฏใน Jurassic World Rebirth',
                'summary' => 'เจฟฟ์ โกลด์บลุม ยืนยันว่าตัวละคร Ian Malcolm จะไม่กลับมาในภาคใหม่ พร้อมให้กำลังใจนักแสดงรุ่นใหม่',
                'content' => 'เจฟฟ์ โกลด์บลุม นักแสดงผู้รับบทเอียน มัลคอล์ม ในแฟรนไชส์ Jurassic Park ได้ออกมาพูดถึงอนาคตของตัวละครของเขาในหนังภาคใหม่ Jurassic World Rebirth ในสัมภาษณ์กับนิตยสาร Total Film โดยเขากล่าวว่า "ผมมีช่วงเวลาที่ดีกับมัน ผมสนุกกับการทำงานและสนุกกับการพยายามที่จะทำให้มันออกมาดี" แม้ว่า Jurassic World Dominion จะทำรายได้กว่า 1,000 ล้านเหรียญ แต่ก็ได้รับคะแนนวิจารณ์ที่ไม่ค่อยดี จึงนำไปสู่การรีบูตครั้งใหญ่ของแฟรนไชส์ด้วยทีมนักแสดงใหม่ โกลด์บลุมกล่าวว่า "ผมคิดว่า เอียน มัลคอล์ม คงโบกมือลาไปพร้อมกับแสดงตะวันแล้ว" และให้กำลังใจนักแสดงใหม่อย่าง สการ์เลตต์ โจแฮนส์สัน และ โจนาธาน เบลี่ย์',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure',
                'release_date' => '2025-07-01',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMlUrnRvVHLBvwZo0XkdZj623NAasf7S8b9g&s',
                'author' => 'Major Cineplex Reporter',
                'reference_link' => 'https://www.majorcineplex.com/news/ian-malcolm-goodbye-jurassic-world-rebirth',
            ],
            [
                'title' => 'Jurassic World Rebirth ปล่อยตัวอย่างแรกแล้ว! เผยโลเคชันถ่ายทำในประเทศไทย',
                'summary' => 'ตัวอย่างแรกเผยให้เห็นความงามของธรรมชาติไทยที่ใช้เป็นฉากหลังสำหรับเกาะไดโนเสาร์',
                'content' => 'Jurassic World Rebirth ได้ปล่อยตัวอย่างแรกออกมาแล้ว โดยเผยให้เห็นภาพความงดงามของธรรมชาติไทยที่ถูกนำมาใช้เป็นฉากหลัง ภาพยนตร์เรื่องนี้มีการถ่ายทำในหลายจังหวัดของประเทศไทย ได้แก่ เขาพนมเบญจา จังหวัดกระบี่, เกาะกระดาน จังหวัดตรัง และอุทยานแห่งชาติอ่าวพังงา จังหวัดพังงา ซึ่งถือเป็น Soft Power ที่ยอดเยี่ยม ผู้กำกับ แกเร็ธ เอ็ดเวิร์ดส์ ที่เคยทำหนัง The Creator และมีประสบการณ์การทำงานในประเทศไทยมาก่อน เลือกใช้ความงามของธรรมชาติไทยมาเป็นฉากหลังของเกาะไดโนเสาร์ในภาคนี้ โดยในหนังจะเรียกสถานที่เหล่านี้ว่า อิสลา นูบลาร์ ซอร์นา และเกาะอื่นๆ',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure/Sci-Fi',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbXcyNG4AF0-xeXYrebpyTmDNEL5fN9MqqNw&s',
                'author' => 'LSA Thailand',
                'reference_link' => 'https://www.prachachat.net/breaking-news/news-1829160',
            ],
            [
                'title' => 'สิ่งที่ต้องรู้ก่อนดู Jurassic World Rebirth: เรื่องราวใหม่หลังจาก Dominion 5 ปี',
                'summary' => 'ภาคใหม่จะเล่าเรื่องราวหลังจาก Dominion 5 ปี เมื่อไดโนเสาร์เริ่มใกล้สูญพันธุ์และมนุษย์ต้องการสารพันธุกรรมเพื่อรักษาโรค',
                'content' => 'Jurassic World Rebirth จะเป็นเรื่องราวที่ดำเนินต่อมาจากภาค Dominion โดยจะเป็นเรื่องราวหลังจากนั้น 5 ปี เมื่อบรรดาไดโนเสาร์ที่ถูกทิ้งร้างและเริ่มกลายพันธุ์ กำลังจะสูญพันธุ์อีกครั้งจากสภาวะการเปลี่ยนแปลงของโลกที่ไม่เอื้อต่อการมีชีวิตของพวกมันอีกต่อไป มีเพียงไดโนเสาร์ 3 สายพันธุ์เท่านั้นที่มีสารพันธุกรรมที่เชื่อว่าอาจใช้ในการพัฒนายารักษาและช่วยชีวิตได้ ทำให้ Zora (สการ์เลตต์ โจแฮนส์สัน) ถูกส่งเข้าไปยังพื้นที่เพื่อสกัดสารนั้นออกมา โดยมี Duncan Kincaid (มาเฮอร์ชาลา อาลี) และ Dr. Henry Loomis (โจนาธาน เบลี่ย์) ร่วมเดินทางไปด้วย นักเขียนบท David Koepp เผยว่าจะมีการนำฉากจากนิยายต้นฉบับที่เคยถูกตัดออกจาก Jurassic Park ปี 1993 กลับมาใช้ในภาคนี้',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure/Thriller',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://f.ptcdn.info/518/088/000/mcofltjpirmwNAp11KD-o.jpg',
                'author' => '4Gamers Thailand',
            ],
            [
                'title' => 'Jurassic World Rebirth ทำรายได้เปิดตัวสัปดาห์แรก 318 ล้านเหรียญ เป็นอันดับ 2 ของแฟรนไชส์',
                'summary' => 'ภาพยนตร์ไดโนเสาร์ภาคใหม่ประสบความสำเร็จอย่างสูง ทำรายได้เปิดตัวสูงเป็นอันดับสองของแฟรนไชส์',
                'content' => 'Jurassic World Rebirth หรือ จูราสสิค เวิลด์ กำเนิดชีวิตใหม่ สามารถทำรายได้ในบ็อกซ์ออฟฟิศทั่วโลกในสัปดาห์แรกรวมกันแล้วกว่า 318 ล้านเหรียญ โดยแบ่งออกเป็นรายได้จากการเข้าฉายในทวีปอเมริกาเหนือ 147 ล้านเหรียญ และรายได้จากการเข้าฉายในภูมิภาคอื่นๆ 171 ล้านเหรียญ ทำให้กลายเป็นภาพยนตร์ที่ทำรายได้เปิดตัวในสัปดาห์แรกได้มากเป็นอันดับที่สองของแฟรนไชส์นี้ เป็นรองแค่ Jurassic World (2015) ที่เปิดตัวด้วยรายได้ทั่วโลกถึง 524.4 ล้านเหรียญ ภาพยนตร์เรื่องนี้มีทุนสร้างอยู่ที่ประมาณ 180 ล้านเหรียญ ซึ่งหมายความว่าจะมีจุดคุ้มทุนอยู่ที่ประมาณ 360 ล้านเหรียญ และคาดการณ์ว่าจะสามารถทำรายได้จนถึงจุดคุ้มทุนได้ภายในสัปดาห์ที่สองของการเข้าฉาย',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJ7siP5H0P4QpPbfgV7jH3aXKWnaFQmdNA5w&s',
                'author' => 'Major Cineplex',
                'reference_link' => 'https://www.majorcineplex.com/news/jurassic-world-rebirth-318-million-opening',
            ],
            [
                'title' => 'Jurassic World Rebirth รีวิว: กำเนิดใหม่สัตว์ล้านปีที่ยังคงเป็นของเล่นมนุษย์',
                'summary' => 'ภาพยนตร์ภาคใหม่ได้คะแนน 3/5 จาก LSA Thailand ชื่นชมการแสดงของนักแสดงนำและเทคนิคการถ่าย',
                'content' => 'Jurassic World: Rebirth ได้คะแนน 3/5 จาก LSA Thailand โดยภาพยนตร์เรื่องนี้นำแสดงโดย Scarlett Johansson รับบท Zora Bennett, Mahershala Ali รับบท Duncan Kincaid, Jonathan Bailey รับบท Dr. Henry Loomis, Rupert Friend รับบท Martin Krebs และ Manuel Garcia-Rulfo รับบท Reuben Delgado ภาพยนตร์มีจุดแข็งที่การใช้พลังดาราและเคมีที่ดีระหว่างนักแสดงนำ รวมถึงการใช้กล้องฟิล์มในการถ่ายทำเพื่อให้ได้ภาพสวยสมจริง งาน CGI ที่เนี๊ยบทุกจุดและฉากหลังที่ถ่ายในประเทศไทยที่งดงาม อย่างไรก็ตาม ภาพยนตร์ยังคงมีปัญหาเดิมของแฟรนไชส์ในการมองไดโนเสาร์เป็นเหมือนของเล่นมนุษย์ และเนื้อหาที่ค่อนข้างตรงไปตรงมาและเดาได้ง่าย',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure/Thriller/Sci-Fi',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://i2.wp.com/images.squarespace-cdn.com/content/v1/672e1e9f7812cb6bfc7efab1/1738764551935-MYSIG1XL6B7JCZCQVF2K/Jurassic+World+Rebirth.jpg?w=1160&ssl=1',
                'author' => 'LSA Thailand',
                'reference_link' => 'https://today.line.me/th/v3/article/5yl2yvy',
            ],
            [
                'title' => '"Jurassic World Rebirth" ดัน Soft Power ไทย! ณเดชน์ พากย์ไทย เตรียมฉาย 2 ก.ค.',
                'summary' => 'เมเจอร์ ซีนีเพล็กซ์ จัดงาน Gala Premiere ยิ่งใหญ่ พร้อม ณเดชน์ คูกิมิยะ พากย์เสียงไทย',
                'content' => 'เมเจอร์ ซีนีเพล็กซ์ กรุ้ป ผนึก เป๊ปซี่, ห้าดาว และ UIP Thailand เปิดการผจญภัยบทใหม่กับ Soft Power ความสวยงามของสถานที่ท่องเที่ยวไทยผ่านภาพยนตร์ "Jurassic World Rebirth" โดยได้ ณเดชน์ คูกิมิยะ พากย์เสียงไทยเป็น ดร.เฮนรี ลูมิส งานจัดขึ้น ณ โรงภาพยนตร์ไอคอน ซีเนคอนิค พร้อมด้วยการจำลองบรรยากาศเกาะลับที่ถูกซ่อนไว้ใน Jurassic Park ความพิเศษของภาพยนตร์เรื่องนี้คือมีฉากสำคัญถ่ายทำในประเทศไทยที่เนรมิตให้กลายเป็นเกาะไดโนเสาร์สุดยิ่งใหญ่ นอกจากนี้ยังมีกิจกรรม "JURASSIC PLANET" ตั้งแต่วันที่ 2-12 กรกฎาคม 2568 ณ ฮอลลีวู้ด ฮอลล์ ชั้น 1 เมเจอร์ ซีนีเพล็กซ์ รัชโยธิน ให้เพลิดเพลินไปกับเหล่าไดโนเสาร์แบบเสมือนจริงหลากหลายสายพันธุ์และเทคโนโลยี AR',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://siamturakij.com/assets/uploads/img_news/28/main/1751457038_28.jpg',
                'author' => 'StarEnews',
                'reference_link' => 'https://starenews.com/jurassic-world-rebirth-thailand-premiere/?amp=1',
            ],
            [
                'title' => 'สัมภาษณ์พิเศษ Scarlett Johansson: ภาพยนตร์ไดโนเสาร์คือความฝันในวัยเด็กของฉัน',
                'summary' => 'Scarlett Johansson เปิดใจถึงความรู้สึกที่ได้เข้าร่วมแฟรนไชส์ Jurassic Park ที่เธอหลงใหลมาตั้งแต่เด็ก',
                'content' => 'Scarlett Johansson ดาราสาวชื่อดัง คือหนึ่งในนักแสดงที่โดดเด่นที่สุดใน "Jurassic World: Rebirth" (2025) เธอได้เปิดเผยรายละเอียดเบื้องหลังในการสัมภาษณ์พิเศษว่า การได้เข้าร่วมแฟรนไชส์นี้คือความฝันที่เป็นจริง "ฉันคลั่งไคล้หนังเรื่องนี้มาก และฉันก็นอนในเต๊นท์ลูกสุนัข Jurassic Park ในห้องนอนของฉัน ซึ่งฉันพักร่วมกับน้องสาวเป็นเวลาหนึ่งปี" โจแฮนส์สันกล่าวถึงความรักอันยืนยาวของเธอที่มีต่อแฟรนไชส์นี้ ภาพยนตร์เรื่องนี้เป็นภาคที่เจ็ดในซีรีส์ Jurassic Park ครบรอบ 22 ปีนับตั้งแต่ภาคแรกเข้าฉาย ณ วันที่ 9 กรกฎาคม ภาพยนตร์ทำรายได้ทั่วโลกไปแล้ว 343 ล้านดอลลาร์ ในเวียดนาม ทำรายได้ 28,000 ล้านดอง และมีงบประมาณการสร้าง 250 ล้านเหรียญสหรัฐ',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure/Sci-Fi',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAPg90mGG8MHnbJ9sQE8z0OC5QRrDtEDH3MA&s',
                'author' => 'Vietnam Plus',
                'reference_link' => 'https://www.vietnam.vn/th/phong-van-doc-quyen-scarlett-johansson-phim-khung-long-la-giac-mo-tu-be-cua-toi',
            ],
            [
                'title' => 'โปรแกรมหนัง 2025: Jurassic World Rebirth นำทัพหนังใหม่เดือนกรกฎาคม',
                'summary' => 'รวมตารางหนังใหม่ปี 2025 โดย Jurassic World Rebirth เป็นหนึ่งในหนังเด่นที่จะเข้าฉายเดือนกรกฎาคม',
                'content' => 'ตารางฉายหนัง 2025 เต็มไปด้วยภาพยนตร์น่าติดตามมากมาย โดย Jurassic World Rebirth หรือ จูราสสิค เวิลด์ กำเนิดชีวิตใหม่ กำหนดฉาย 2 กรกฎาคม 2025 เป็นหนึ่งในหนังเด่นของเดือนกรกฎาคม ร่วมกับหนังเด่นอื่นๆ เช่น The Supernatural Sweet Shop: The Movie, The Book of Solutions, เปิด DOOR เห็นผี, Smurfs, Noise, The Legend of Ochi และ แว่วเสียงหวีด นอกจากนี้ยังมีหนังเด่นในเดือนอื่นๆ อีกมากมาย ไม่ว่าจะเป็น Avatar: Fire and Ash ที่กำหนดฉายเดือนธันวาคม 2025 และ Five Nights at Freddy\'s 2 ที่จะเข้าฉายเดือนธันวาคมเช่นกัน ทำให้ปี 2025 เป็นปีที่เต็มไปด้วยภาพยนตร์คุณภาพมากมาย',
                'movie_title' => 'Jurassic World Rebirth',
                'genre' => 'Action/Adventure',
                'release_date' => '2025-07-02',
                'director' => 'Gareth Edwards',
                'image_url' => 'https://preview.redd.it/with-jurassic-world-rebirth-opening-in-july-2-2025-theres-v0-37m8nj1n5m9e1.jpeg?auto=webp&s=33b4a900672279b42ad10481a7c3dc996aaa5174',
                'author' => 'Kapook Movie',
                'reference_link' => 'https://movie.kapook.com/view284413.html',
            ],
            [
                'title' => 'Superman 2025 ฮีโร่ผู้มากอบกู้หนังซูเปอร์ฮีโร่ที่แท้ทรู',
                'summary' => ' Superman 2025 ก็ไม่ได้ถูกคาดหวังใดๆ แต่นี่คือหนังที่มาปลุกชีพเหล่าซูเปอร์ฮีโร่ให้ฟื้นตื่นขึ้นอีกครั้ง... สามารถติดตามต่อได้ที่ : https://www.dailynews.co.th/articles/4903069/',
                'content' => 'Superman ดีแล้ว คุณอาจคิดผิดถนัด! เพราะสิ่งที่ผู้กำกับ เจมส์ กันน์ เสิร์ฟมาใน Superman 2025 มันไม่ใช่แค่หนังซูเปอร์ฮีโร่ธรรมดาๆ แต่มันคือปรากฏการณ์! คือการปฏิวัติ! คือสิ่งที่ทำให้วงการหนังซูเปอร์ฮีโร่กลับมามีชีวิตชีวาอีกครั้งแบบที่ไม่เคยมีมาก่อน!... สามารถติดตามต่อได้ที่ : https://www.dailynews.co.th/articles/4903069/',
                'movie_title' => 'Superman',
                'genre' => 'Super Hero',
                'release_date' => '2025-07-10',
                'director' => ' James Gunn',
                'image_url' => 'https://www.dailynews.co.th/wp-content/uploads/2025/07/11-13.jpg',
                'author' => 'Daily News Onnline',
                'reference_link' => 'https://www.ktc.co.th/article/entertainment/movie/new-movie-releases-thailand-2025',
            ],
            [
                'title' => 'F1 หนังรถสูตรหนึ่ง นำแสดงโดย แบรด พิทท์ เตรียมเข้าโรง มิถุนายน 2025',
                'summary' => 'หลังจากที่มีการถ่ายทำกันไปได้พักใหญ่ ตลอดจนมีการเผยวันฉาย ที่สุดแล้ว ภาพยนตร์เกี่ยวกับการแข่งขัน Formula 1 หรือ รถสูตรหนึ่ง ที่นำแสดงและอำนวยการสร้างโดย แบรด พิทท์ นักแสดงเจ้าของรางวัลออสการ์ ก็เผยชื่อเรื่องเสียที นั่นคือ F1 ',
                'content' => 'F1 จะเข้าฉายในโรงภาพยนตร์ทั่วโลก 25 มิถุนายน 2025 และเข้าฉายในสหรัฐอเมริกา 27 มิถุนายน 2025',
                'movie_title' => 'F: The Movie',
                'genre' => 'Action, Sport, Adventure',
                'release_date' => '2025-07-27',
                'director' => 'Joseph Kosinski',
                'image_url' => 'https://mainstand.co.th/storage/news/content/388_F1BradPitt001.jpg',
                'author' => 'Mainstand',
                'reference_link' => 'https://www.ktc.co.th/article/entertainment/movie/new-movie-releases-thailand-2025',
            ],
        ];

        foreach ($newsArticles as $article) {
            MovieNews::create($article);
        }
    }
}
