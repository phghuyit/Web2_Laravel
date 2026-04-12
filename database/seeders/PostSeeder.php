<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            // Post 1 – Ebook deal / guide
            [
                'topic_id'    => 1,
                'title'       => 'Top 10 Ebook Hay Nhất Năm 2025 – Bạn Đã Đọc Chưa?',
                'slug'        => 'top-10-ebook-hay-nhat-nam-2025',
                'detail'      => '<p>Năm 2025 chứng kiến sự bùng nổ của thị trường sách điện tử với hàng loạt tựa sách đình đám ra mắt trên toàn cầu. Từ tiểu thuyết lãng mạn kỳ ảo (<em>romantasy</em>) đến sách phi hư cấu truyền cảm hứng, ebook ngày càng trở thành lựa chọn ưa thích của độc giả hiện đại nhờ tính tiện lợi và giá thành phải chăng.</p>
<p>Dưới đây là 10 cuốn ebook nổi bật nhất năm 2025 được tổng hợp từ danh sách bestseller của Amazon Kindle, Barnes &amp; Noble Nook và các nền tảng đọc sách hàng đầu thế giới:</p>
<ol>
  <li><strong>Onyx Storm</strong> – Rebecca Yarros: Phần tiếp theo của series Empyrean, thống trị danh sách bestseller New York Times trong 8 tuần liên tiếp. Câu chuyện kết hợp giữa rồng, phép thuật và tình yêu cuốn hút không thể bỏ qua.</li>
  <li><strong>The Let Them Theory</strong> – Mel Robbins: Cuốn sách phi hư cấu số 1 Amazon 2025, với hơn 1,7 triệu bản được bán ra. Tác giả chia sẻ công cụ tư duy giúp hàng triệu người thay đổi cuộc sống.</li>
  <li><strong>Sunrise on the Reaping</strong> – Suzanne Collins: Phần thứ 5 của series The Hunger Games, kể về câu chuyện của Haymitch Abernathy. Phim chuyển thể dự kiến ra rạp tháng 11/2026.</li>
  <li><strong>The Housemaid</strong> – Freida McFadden: Tiểu thuyết kinh dị tâm lý đầy twist bất ngờ, liên tục tái bản và được độc giả toàn cầu săn đón.</li>
  <li><strong>The Crash</strong> – Freida McFadden: Thriller thứ hai của tác giả trong top 10 bestseller, chứng minh sức hút không thể phủ nhận của Freida McFadden.</li>
  <li><strong>Fourth Wing</strong> – Rebecca Yarros: Phần đầu của series Empyrean vẫn tiếp tục được tải về với số lượng khổng lồ dù đã ra mắt từ năm trước.</li>
  <li><strong>The Anxious Generation</strong> – Jonathan Haidt: Phân tích sâu sắc về tác động của mạng xã hội đến sức khỏe tâm thần của thế hệ trẻ, được các chuyên gia giáo dục khuyến đọc.</li>
  <li><strong>James</strong> – Percival Everett: Tiểu thuyết văn học đoạt giải Pulitzer, kể lại câu chuyện Huckleberry Finn từ góc nhìn của Jim – người nô lệ bỏ trốn.</li>
  <li><strong>Nobody\'s Girl</strong> – Virginia Roberts Giuffre: Hồi ký chấn động dẫn đầu danh sách sách phi hư cấu NYT trong 4 tuần liên tiếp.</li>
  <li><strong>The Body Keeps the Score</strong> – Bessel van der Kolk: Cuốn sách về chấn thương tâm lý tiếp tục bám trụ danh sách bestseller tuần thứ 6 liên tiếp trong năm 2025.</li>
</ol>
<p>Tất cả các tựa sách trên đều có phiên bản ebook với mức giá từ 7–15 USD trên các nền tảng lớn. Hãy tải về và bắt đầu hành trình đọc sách của bạn ngay hôm nay!</p>',
                'image'       => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=800&q=80',
                'post_type'   => 'post',
                'description' => 'Khám phá 10 cuốn ebook bán chạy nhất năm 2025 – từ romantasy đình đám đến sách phi hư cấu truyền cảm hứng, tất cả đều có sẵn để tải về ngay.',
                'created_by'  => 1,
                'updated_by'  => null,
                'status'      => 1,
                'views'       => 1240,
                'published_at' => '2025-06-15 08:00:00',
                'created_at'  => '2025-06-15 07:30:00',
                'updated_at'  => '2025-06-15 07:30:00',
            ],

            // Post 2 – Bestseller series spotlight
            [
                'topic_id'    => 2,
                'title'       => 'Series Empyrean Của Rebecca Yarros – Cơn Bão Romantasy Không Thể Cưỡng Lại',
                'slug'        => 'series-empyrean-rebecca-yarros-con-bao-romantasy',
                'detail'      => '<p>Nếu bạn chưa nghe đến tên <strong>Rebecca Yarros</strong> hay series <strong>Empyrean</strong>, có lẽ bạn đã bỏ lỡ hiện tượng văn học lớn nhất của năm 2024–2025. Bộ truyện kết hợp hoàn hảo giữa fantasy sử thi và tình yêu lãng mạn, tạo nên thể loại "romantasy" đang làm mưa làm gió trên toàn cầu.</p>

<h2>Bộ Series Gồm Những Tập Nào?</h2>
<ul>
  <li><strong>Fourth Wing</strong> (2023) – Tập 1: Violet Sorrengail bước vào học viện cưỡi rồng Basgiath War College trong sợ hãi, nhưng lại được con rồng mạnh nhất chọn làm kỵ sĩ. Tại đây, cô gặp Xaden Riorson – kẻ thù không đội trời chung và cũng là người đàn ông nguy hiểm nhất cô từng gặp.</li>
  <li><strong>Iron Flame</strong> (2023) – Tập 2: Violet phải đối mặt với sự thật tàn khốc về cuộc chiến và quyết định của Xaden. Bí mật của Basgiath dần được hé lộ, đẩy cô vào tình thế ngàn cân treo sợi tóc.</li>
  <li><strong>Onyx Storm</strong> (2025) – Tập 3: Tập mới nhất vừa ra mắt đầu năm 2025, bán hơn 2 triệu bản chỉ trong vài tuần. Violet và Xaden đối mặt với mối đe dọa lớn hơn bao giờ hết khi ranh giới giữa đồng minh và kẻ thù ngày càng mờ nhạt.</li>
</ul>

<h2>Tại Sao Bạn Nên Đọc?</h2>
<p>Series Empyrean không chỉ là câu chuyện tình yêu – đây là một thế giới hoành tráng với hệ thống phép thuật độc đáo, những con rồng có cá tính riêng, và các nhân vật được xây dựng chiều sâu. Tác giả Rebecca Yarros khéo léo đan xen giữa hành động căng thẳng và những khoảnh khắc lãng mạn khiến người đọc không thể đặt sách xuống.</p>
<p>Cả ba tập đều có sẵn dưới dạng ebook trên Kindle, Apple Books và Kobo. Phiên bản audiobook cũng nhận được đánh giá xuất sắc từ cộng đồng.</p>
<blockquote><em>"Đây là bộ series romantasy hay nhất tôi từng đọc trong 10 năm trở lại đây." – Goodreads Review, 5 sao</em></blockquote>',
                'image'       => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=800&q=80',
                'post_type'   => 'post',
                'description' => 'Tìm hiểu về series Empyrean của Rebecca Yarros – bộ truyện romantasy đang khuynh đảo thế giới với hơn 2 triệu bản Onyx Storm bán ra chỉ trong vài tuần.',
                'created_by'  => 1,
                'updated_by'  => 2,
                'status'      => 1,
                'views'       => 3875,
                'published_at' => '2025-03-10 09:00:00',
                'created_at'  => '2025-03-10 08:00:00',
                'updated_at'  => '2025-03-12 10:00:00',
            ],

            // Post 3 – New release announcement
            [
                'topic_id'    => 3,
                'title'       => 'Sách Mới Ra Mắt Tháng 3/2025 – Những Tựa Sách Không Thể Bỏ Lỡ',
                'slug'        => 'sach-moi-ra-mat-thang-3-2025',
                'detail'      => '<p>Tháng 3/2025 là tháng vàng cho những tín đồ mê sách khi hàng loạt tựa sách được mong đợi nhất năm chính thức ra mắt. Từ tiểu thuyết văn học đoạt giải thưởng đến sách tự giúp bản thân, đây là những cuốn sách bạn nên thêm vào danh sách đọc ngay bây giờ.</p>

<h2>Tiểu Thuyết Fiction Nổi Bật</h2>
<p><strong>Onyx Storm – Rebecca Yarros (Ra mắt 21/01/2025)</strong><br>
Dù ra mắt cuối tháng 1 nhưng cơn sốt Onyx Storm vẫn chưa hề hạ nhiệt. Tập 3 của series Empyrean tiếp tục thống trị danh sách bestseller NYT, Amazon và hầu hết các nhà sách lớn. Violet Sorrengail bước vào một hành trình nguy hiểm hơn bao giờ hết khi liên minh cũ rạn nứt và bóng tối bao phủ thế giới của những kỵ sĩ rồng.</p>

<p><strong>Intermezzo – Sally Rooney</strong><br>
Tiểu thuyết mới nhất của "nữ hoàng văn học đương đại" Sally Rooney tiếp tục nhận được vô số lời khen ngợi. Câu chuyện về hai anh em Peter và Ivan sau cái chết của cha, mỗi người tìm đến tình yêu theo cách riêng của mình. Rooney một lần nữa chứng minh tài năng khắc họa tâm lý nhân vật đương đại của mình.</p>

<h2>Sách Phi Hư Cấu &amp; Phát Triển Bản Thân</h2>
<p><strong>The Let Them Theory – Mel Robbins</strong><br>
Với triết lý đơn giản nhưng mạnh mẽ "hãy để mặc họ" (let them), Mel Robbins chỉ ra cách thoát khỏi vòng lặp lo lắng về suy nghĩ của người khác. Cuốn sách này đã thay đổi góc nhìn của hơn 1,7 triệu độc giả trên toàn thế giới.</p>

<p><strong>The Anxious Generation – Jonathan Haidt</strong><br>
Nhà tâm lý học xã hội Jonathan Haidt đưa ra bằng chứng thuyết phục rằng việc trẻ em sử dụng điện thoại thông minh và mạng xã hội từ sớm đang gây ra cuộc khủng hoảng sức khỏe tâm thần nghiêm trọng. Cuốn sách là tài liệu bắt buộc đọc cho phụ huynh và nhà giáo dục.</p>

<h2>Lịch Ra Mắt Sách Còn Lại Trong Quý 1/2025</h2>
<p>Ngoài các tựa sách trên, độc giả có thể mong đợi thêm nhiều tên tuổi lớn sẽ ra mắt trong những tuần tới. Hãy theo dõi trang web của chúng tôi để không bỏ lỡ bất kỳ thông tin nào về các tựa sách mới nhất!</p>',
                'image'       => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=800&q=80',
                'post_type'   => 'post',
                'description' => 'Danh sách những cuốn sách mới ra mắt tháng 3/2025 đáng đọc nhất – từ romantasy, tiểu thuyết văn học đến sách phát triển bản thân.',
                'created_by'  => 1,
                'updated_by'  => null,
                'status'      => 1,
                'views'       => 892,
                'published_at' => '2025-03-01 07:00:00',
                'created_at'  => '2025-03-01 06:30:00',
                'updated_at'  => '2025-03-01 06:30:00',
            ],

            // Post 4 – Ebook reading guide / tips page
            [
                'topic_id'    => 1,
                'title'       => 'Hướng Dẫn Đọc Ebook Cho Người Mới Bắt Đầu – Chọn Nền Tảng Nào Tốt Nhất?',
                'slug'        => 'huong-dan-doc-ebook-cho-nguoi-moi-bat-dau',
                'detail'      => '<p>Bạn muốn chuyển sang đọc sách điện tử nhưng không biết bắt đầu từ đâu? Đừng lo – bài viết này sẽ giúp bạn hiểu rõ các nền tảng ebook phổ biến nhất, cách chọn thiết bị đọc sách phù hợp và những mẹo nhỏ để tận hưởng trải nghiệm đọc sách tốt nhất.</p>

<h2>Tại Sao Nên Đọc Ebook?</h2>
<ul>
  <li><strong>Tiết kiệm không gian:</strong> Hàng nghìn cuốn sách trong một thiết bị nhỏ gọn.</li>
  <li><strong>Giá thành thấp hơn:</strong> Ebook thường rẻ hơn 20–40% so với sách giấy, và nhiều tựa cổ điển hoàn toàn miễn phí.</li>
  <li><strong>Đọc mọi lúc mọi nơi:</strong> Chỉ cần điện thoại hoặc máy tính bảng, bạn có thể đọc sách ngay cả khi đang chờ xe buýt.</li>
  <li><strong>Điều chỉnh cỡ chữ và độ sáng:</strong> Phù hợp với người có vấn đề về thị lực.</li>
  <li><strong>Tìm kiếm và ghi chú dễ dàng:</strong> Highlight, ghi chú và tìm kiếm từ khóa trong tích tắc.</li>
</ul>

<h2>So Sánh Các Nền Tảng Ebook Hàng Đầu</h2>
<h3>1. Amazon Kindle</h3>
<p>Nền tảng ebook lớn nhất thế giới với kho sách khổng lồ. Kindle Unlimited cho phép đọc không giới hạn hàng triệu đầu sách với giá ~$9.99/tháng. Thiết bị Kindle Paperwhite được đánh giá là tốt nhất cho mắt nhờ màn hình e-ink không gây mỏi.</p>

<h3>2. Apple Books</h3>
<p>Tích hợp hoàn hảo trên hệ sinh thái Apple. Giao diện đẹp, trải nghiệm mượt mà. Phù hợp nếu bạn đã dùng iPhone hoặc iPad.</p>

<h3>3. Google Play Books</h3>
<p>Lựa chọn tốt cho người dùng Android. Đồng bộ tốt giữa các thiết bị, hỗ trợ upload ebook định dạng PDF và EPUB cá nhân.</p>

<h3>4. Kobo</h3>
<p>Ít phổ biến hơn Kindle nhưng không bị ràng buộc bởi hệ sinh thái Amazon. Thiết bị Kobo Clara 2E thân thiện với môi trường, làm từ vật liệu tái chế.</p>

<h2>Mẹo Đọc Ebook Hiệu Quả</h2>
<ol>
  <li>Đặt mục tiêu số trang mỗi ngày (20–30 trang là hợp lý cho người mới).</li>
  <li>Sử dụng chế độ đọc ban đêm (dark mode) để bảo vệ mắt.</li>
  <li>Tắt thông báo điện thoại khi đọc sách để tránh bị phân tâm.</li>
  <li>Tham gia các cộng đồng đọc sách trực tuyến như Goodreads để trao đổi cảm nhận.</li>
  <li>Tận dụng các đợt sale ebook – Amazon và Apple Books thường giảm giá sâu vào mùa lễ.</li>
</ol>

<p>Hy vọng bài hướng dẫn này sẽ giúp bạn bước vào thế giới ebook một cách dễ dàng và thú vị. Hãy bắt đầu với một tựa sách bạn yêu thích và để câu chuyện dẫn lối!</p>',
                'image'       => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                'post_type'   => 'page',
                'description' => 'Hướng dẫn chi tiết cho người mới bắt đầu đọc ebook: so sánh các nền tảng Kindle, Apple Books, Kobo và những mẹo đọc sách hiệu quả.',
                'created_by'  => 1,
                'updated_by'  => 1,
                'status'      => 1,
                'views'       => 2150,
                'published_at' => '2025-01-20 10:00:00',
                'created_at'  => '2025-01-20 09:00:00',
                'updated_at'  => '2025-02-05 14:00:00',
            ],

            // Post 5 – Hunger Games new book review
            [
                'topic_id'    => 2,
                'title'       => 'Review Sách: "Sunrise on the Reaping" – Câu Chuyện Của Haymitch Trong The Hunger Games',
                'slug'        => 'review-sach-sunrise-on-the-reaping-hunger-games',
                'detail'      => '<p>Sau nhiều năm chờ đợi, Suzanne Collins đã quay trở lại vũ trụ <strong>The Hunger Games</strong> với tập thứ 5 mang tên <em>Sunrise on the Reaping</em> – câu chuyện lần này xoay quanh nhân vật được yêu thích <strong>Haymitch Abernathy</strong>, người chiến thắng Đấu trường Sinh tử năm thứ 50.</p>

<h2>Tóm Tắt Nội Dung</h2>
<p>Câu chuyện diễn ra 24 năm trước sự kiện trong cuốn sách đầu tiên. Chúng ta gặp Haymitch khi còn là một thiếu niên 16 tuổi tại vùng District 12 – nghèo khó, thông minh và đang yêu lần đầu. Khi tên anh được gọi tại buổi Chọn Lựa (<em>Reaping</em>), hành trình sống còn của Haymitch trong Hunger Games lần thứ 50 – Lễ Kỷ Niệm Thứ Tư (<em>Fourth Quarter Quell</em>) – bắt đầu.</p>
<p>Đây là kỳ Hunger Games đặc biệt khi số lượng cống phẩm từ mỗi vùng bị nhân đôi, đẩy mức độ tàn khốc lên đỉnh điểm. Qua góc nhìn của Haymitch trẻ, độc giả hiểu được tại sao anh trở thành người đàn ông cay đắng và rượu chè trong series gốc.</p>

<h2>Điểm Mạnh Của Cuốn Sách</h2>
<ul>
  <li><strong>Chiều sâu nhân vật:</strong> Suzanne Collins đã tạo ra một Haymitch hoàn toàn khác với hình ảnh trong loạt phim. Phiên bản trẻ của anh đầy hy vọng, tình yêu và lý tưởng – khiến bi kịch của anh càng thêm xót xa.</li>
  <li><strong>Bối cảnh lịch sử phong phú:</strong> Người đọc hiểu sâu hơn về Capitol, về cơ chế của các Trò Chơi và nguồn gốc của Uprising (cuộc nổi dậy) sau này.</li>
  <li><strong>Hành động căng thẳng:</strong> Các cảnh đấu trường được xây dựng kịch tính và đáng sợ, không thua kém bất kỳ phần nào trong series gốc.</li>
  <li><strong>Thông điệp sâu sắc:</strong> Tác giả tiếp tục khéo léo lồng ghép các chủ đề về quyền lực, tuyên truyền và giá của sự tự do.</li>
</ul>

<h2>Điểm Cần Lưu Ý</h2>
<p>Nếu bạn kỳ vọng một câu chuyện "happy ending" thì đây không phải cuốn sách dành cho bạn. Collins không hề ngần ngại mang lại những trang viết nặng nề và đau lòng – đúng như tinh thần của toàn bộ series The Hunger Games.</p>

<h2>Đánh Giá Tổng Thể</h2>
<p>⭐⭐⭐⭐½ (4.5/5 sao)</p>
<p><em>Sunrise on the Reaping</em> là một phần bổ sung xuất sắc cho vũ trụ The Hunger Games. Cuốn sách không chỉ thỏa mãn fan cũ mà còn có thể đứng độc lập như một tác phẩm bi kịch hoàn chỉnh. Phim chuyển thể dự kiến ra rạp tháng 11/2026 hứa hẹn sẽ là một bom tấn điện ảnh.</p>
<p>Hiện sách đã có sẵn ở định dạng ebook trên Amazon Kindle và Apple Books với giá khoảng 14.99 USD.</p>',
                'image'       => 'https://images.unsplash.com/photo-1476275466078-4007374efbbe?w=800&q=80',
                'post_type'   => 'post',
                'description' => 'Review chi tiết "Sunrise on the Reaping" – tập 5 của The Hunger Games kể về tuổi trẻ của Haymitch Abernathy. Cuốn sách bán hơn 1,6 triệu bản năm 2025.',
                'created_by'  => 1,
                'updated_by'  => null,
                'status'      => 1,
                'views'       => 4320,
                'published_at' => '2025-04-05 08:00:00',
                'created_at'  => '2025-04-05 07:00:00',
                'updated_at'  => '2025-04-05 07:00:00',
            ],
        ];

        DB::table('posts')->insert($posts);
    }
}
