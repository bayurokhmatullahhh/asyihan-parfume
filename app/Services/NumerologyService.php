<?php

namespace App\Services;

class NumerologyService
{
    /**
     * The 9 archetypes with complete data.
     */
    protected array $archetypes = [
        1 => [
            'number' => 1,
            'name' => 'Sang Penggagas',
            'badge' => 'THE PIONEER',
            'subtitle_id' => 'Sang Penggagas & Perintis Perubahan',
            'display_title' => 'SANG PENGGAGAS',
            'short_desc' => 'Anda tidak menunggu. Anda memulai. Berpikir cepat, bertindak lebih cepat, dan berani mengambil risiko untuk menciptakan sesuatu yang baru.',
            'slug' => 'the-leader',
            'traits' => ['Berani', 'Mandiri', 'Tegas', 'Inisiatif', 'Pemimpin'],
            'quote' => 'Saya Tidak Menunggu. Saya Memulai.',
            'description' => 'Anda adalah pemimpin alami. Berpikir cepat, bertindak lebih cepat. Anda tidak takut mengambil risiko dan selalu mencari cara untuk menciptakan sesuatu yang baru. Ketegasan dan kemandirian Anda menginspirasi orang lain untuk bergerak maju.',
            'essence_name' => 'ASYIHAN ESSENCE I — SANG PENGGAGAS',
            'aroma_resonan' => 'Bergamot, Grapefruit, & Pink Pepper',
            'aroma_notes_top_title' => 'Bergamot, Grapefruit & Pink Pepper',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, tajam, dan penuh energi',
            'aroma_notes_base_title' => 'Cedarwood, Amber & Vetiver',
            'aroma_notes_base_desc' => 'Memberi fondasi yang kuat, hangat, dan tahan lama',
            'formula_extract' => 'Ekstrak murni Bergamot, Grapefruit, Pink Pepper, Ginger, Cedarwood, Amber, dan Vetiver.',
            'notes' => [
                'top' => 'Bergamot, Grapefruit, Pink Pepper',
                'middle' => 'Ginger, Cardamom, Geranium',
                'base' => 'Cedarwood, Amber, Vetiver, Musk',
            ],
            'fragrance_description' => 'Aroma yang diawali dengan kesan pertama yang segar, tajam dan penuh energi dari Bergamot, Grapefruit, dan Pink Pepper, dibalut kehangatan Ginger, Cardamom, dan Geranium yang membangun keberanian dari dalam, serta bertumpu pada fondasi Cedarwood, Amber, Vetiver, dan Musk yang kuat, hangat, dan tahan lama.',
            'ajian' => 'Saya tidak menunggu. Saya memulai.',
            'ajian_short' => 'Saya tidak menunggu. Saya memulai.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam. Fokus pada tujuanmu. Ingat siapa dirimu.',
            'element' => 'Api',
            'color' => '#C41E3A',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_1_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Ir. Soekarno',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Proklamator & Presiden pertama RI — perintis kemerdekaan dengan api visi yang tak pernah padam.',
                    'lahir' => '6 Juni 1901',
                ],
                [
                    'nama' => 'Steve Jobs',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Co-founder Apple — penggagas revolusi teknologi yang mengubah cara dunia berinteraksi.',
                    'lahir' => '24 Februari 1955',
                ],
                [
                    'nama' => 'Elon Musk',
                    'asal' => 'Afrika Selatan / AS',
                    'deskripsi' => 'Visioner Tesla & SpaceX — bermimpi membawa manusia ke Mars dan mengubah energi bumi.',
                    'lahir' => '28 Juni 1971',
                ],
                [
                    'nama' => 'BJ Habibie',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Ilmuwan & Presiden RI ke-3 — pelopor teknologi kedirgantaraan Asia yang diakui dunia.',
                    'lahir' => '25 Juni 1936',
                ],
                [
                    'nama' => 'Walt Disney',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Penggagas kerajaan hiburan imajinatif — membuktikan bahwa mimpi besar bisa menjadi nyata.',
                    'lahir' => '5 Desember 1901',
                ],
                [
                    'nama' => 'Napoleon Bonaparte',
                    'asal' => 'Prancis',
                    'deskripsi' => 'Pemimpin militer legendaris — ahli strategi yang mendirikan kembali tatanan Eropa dari nol.',
                    'lahir' => '15 Agustus 1769',
                ],
                [
                    'nama' => 'Chairul Tanjung',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Pengusaha "Si Anak Singkong" — membuktikan bahwa tekad adalah modal utama meraih puncak.',
                    'lahir' => '16 Juni 1962',
                ],
            ],
        ],
        2 => [
            'number' => 2,
            'name' => 'Sang Penghubung',
            'badge' => 'THE MEDIATOR',
            'subtitle_id' => 'Sang Penghubung & Penjaga Harmoni',
            'display_title' => 'SANG PENGHUBUNG',
            'short_desc' => 'Anda peka terhadap perasaan orang lain. Anda menghubungkan hati, bukan sekadar kata. Kehadiran Anda menghadirkan rasa aman.',
            'slug' => 'the-harmonizer',
            'traits' => ['Intuitif', 'Empatik', 'Penenang', 'Penghubung', 'Supportif'],
            'quote' => 'Saya Memahami Tanpa Harus Dijelaskan.',
            'description' => 'Anda peka terhadap perasaan orang lain. Anda menghubungkan hati, bukan sekadar kata. Kehadiran Anda menghadirkan rasa aman, dimana pun Anda berada. Anda memiliki kepekaan yang tinggi, intuitif, lembut, dan mampu membuat orang lain merasa dipahami dan aman.',
            'essence_name' => 'ASYIHAN ESSENCE II — SANG PENGHUBUNG',
            'aroma_resonan' => 'Pear, Peony, & White Musk',
            'aroma_notes_top_title' => 'Pear, Mandarin & Bergamot',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, lembut, dan menenangkan',
            'aroma_notes_base_title' => 'White Musk & Sandalwood',
            'aroma_notes_base_desc' => 'Memberi fondasi yang nyaman, lembut, dan menenangkan sepanjang hari',
            'formula_extract' => 'Ekstrak murni Pear, Mandarin, Peony, Jasmine, White Musk, Sandalwood, dan Cashmere Wood.',
            'notes' => [
                'top' => 'Pear, Mandarin, Bergamot',
                'middle' => 'Peony, Jasmine, Iris',
                'base' => 'White Musk, Sandalwood, Cashmere Wood',
            ],
            'fragrance_description' => 'Kesan pertama yang segar, lembut, dan menenangkan dari Pear dan Mandarin, bertransisi ke nuansa floral lembut Peony dan Jasmine yang intim dan elegan, lalu ditutup dengan fondasi White Musk dan Sandalwood yang nyaman sepanjang hari.',
            'ajian' => 'Saya hadir. Saya terhubung.',
            'ajian_short' => 'Saya memahami tanpa harus dijelaskan.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam. Rasakan kehadiran Anda. Hubungkan hati, bukan sekadar kata.',
            'element' => 'Air',
            'color' => '#6B9BD2',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_2_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Abdurrahman Wahid (Gus Dur)',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Presiden RI ke-4 — jembatan pluralisme yang menghubungkan semua lapisan masyarakat dengan humor dan kasih.',
                    'lahir' => '7 September 1940',
                ],
                [
                    'nama' => 'Nelson Mandela',
                    'asal' => 'Afrika Selatan',
                    'deskripsi' => 'Pemimpin anti-apartheid — memaafkan dan merangkul semua pihak demi harmoni bangsanya.',
                    'lahir' => '18 Juli 1918',
                ],
                [
                    'nama' => 'Mahatma Gandhi',
                    'asal' => 'India',
                    'deskripsi' => 'Bapak bangsa India — jembatan perubahan besar melalui jalan damai dan kasih sayang universal.',
                    'lahir' => '2 Oktober 1869',
                ],
                [
                    'nama' => 'Oprah Winfrey',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Media mogul & filantropis — menghubungkan jutaan hati melalui empati dan kisah manusiawi.',
                    'lahir' => '29 Januari 1954',
                ],
                [
                    'nama' => 'Sri Sultan Hamengkubuwono X',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Raja Yogyakarta — penghubung tradisi dan modernitas yang dihormati lintas generasi.',
                    'lahir' => '2 April 1946',
                ],
                [
                    'nama' => 'Eleanor Roosevelt',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Ibu negara & diplomat — suara kemanusiaan yang menjembatani hak asasi semua bangsa.',
                    'lahir' => '11 Oktober 1884',
                ],
                [
                    'nama' => 'Tri Rismaharini',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Mantan Walikota Surabaya — penghubung pemerintah dan warga melalui kebijakan yang berpihak pada rakyat.',
                    'lahir' => '20 November 1961',
                ],
            ],
        ],
        3 => [
            'number' => 3,
            'name' => 'Sang Komunikator',
            'badge' => 'THE COMMUNICATOR',
            'subtitle_id' => 'Sang Komunikator & Seniman Jiwa',
            'display_title' => 'SANG KOMUNIKATOR',
            'short_desc' => 'Anda membawa ide, cerita, dan inspirasi. Kata-kata Anda mampu menggerakkan, menghibur, dan mengangkat energi orang lain.',
            'slug' => 'the-creator',
            'traits' => ['Ekspresif', 'Kreatif', 'Optimis', 'Inspiratif', 'Karismatik'],
            'quote' => 'Energi Saya Berbicara Sebelum Saya Berbicara.',
            'description' => 'Anda membawa ide, cerita, dan inspirasi. Kata-kata Anda mampu menggerakkan, menghibur, dan mengangkat energi orang lain. Di mana pun Anda berada, Anda membuat suasana menjadi hidup. Anda ekspresif, kreatif, optimis, dan tidak takut mengekspresikan diri.',
            'essence_name' => 'ASYIHAN ESSENCE III — SANG KOMUNIKATOR',
            'aroma_resonan' => 'Lemon, Neroli, & Vanilla',
            'aroma_notes_top_title' => 'Lemon, Mandarin & Bergamot',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, ceria, dan membangkitkan semangat',
            'aroma_notes_base_title' => 'Vanilla & Tonka Bean',
            'aroma_notes_base_desc' => 'Fondasi hangat, lembut, dan meninggalkan kesan yang menyenangkan',
            'formula_extract' => 'Ekstrak murni Lemon, Mandarin, Neroli, Orange Blossom, Vanilla Madagaskar, dan Tonka Bean.',
            'notes' => [
                'top' => 'Lemon, Mandarin, Bergamot',
                'middle' => 'Neroli, Orange Blossom, Jasmine',
                'base' => 'Vanilla, Tonka Bean, White Musk',
            ],
            'fragrance_description' => 'Aroma segar dan ceria dari trio Citrus yang membangkitkan semangat, diperkaya keanggunan Neroli dan Orange Blossom yang memikat, serta disempurnakan kehangatan Vanilla dan Tonka Bean yang manis dan menyenangkan.',
            'ajian' => 'Saya berani terlihat. Saya berani bersuara.',
            'ajian_short' => 'Energi saya berbicara sebelum saya berbicara.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam. Tampilkan suara dan ide Anda. Biarkan energi baik menginspirasi orang lain.',
            'element' => 'Udara',
            'color' => '#FFB347',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_3_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Pramoedya Ananta Toer',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Sastrawan besar Indonesia — kata-katanya menjadi jembatan antara jiwa manusia dan realita sejarah.',
                    'lahir' => '6 Februari 1925',
                ],
                [
                    'nama' => 'Raisa Andriana',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Diva pop Indonesia — komunikator emosi lewat melodi yang menyentuh jutaan pendengar.',
                    'lahir' => '6 Juni 1990',
                ],
                [
                    'nama' => 'J.K. Rowling',
                    'asal' => 'Inggris',
                    'deskripsi' => 'Penulis Harry Potter — mengkomunikasikan nilai keberanian dan persahabatan kepada seluruh dunia.',
                    'lahir' => '31 Juli 1965',
                ],
                [
                    'nama' => 'Soekarno',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Orator ulung Indonesia — kata-katanya mampu membakar semangat jutaan jiwa dalam sekejap.',
                    'lahir' => '6 Juni 1901',
                ],
                [
                    'nama' => 'Taylor Swift',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Penyanyi & penulis lagu — mengkomunikasikan perasaan universal sehingga menyentuh hati miliaran orang.',
                    'lahir' => '13 Desember 1989',
                ],
                [
                    'nama' => 'Will Smith',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Aktor & motivator — mengkomunikasikan semangat dan harapan lewat layar dan kata-kata yang menggetarkan.',
                    'lahir' => '25 September 1968',
                ],
                [
                    'nama' => 'Andrea Hirata',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Penulis "Laskar Pelangi" — komunikator mimpi anak Belitung yang menginspirasi generasi muda Indonesia.',
                    'lahir' => '24 Oktober 1967',
                ],
            ],
        ],
        4 => [
            'number' => 4,
            'name' => 'Sang Pembangun',
            'badge' => 'THE BUILDER',
            'subtitle_id' => 'Sang Pembangun & Pilar Kehidupan',
            'display_title' => 'SANG PEMBANGUN',
            'short_desc' => 'Anda adalah fondasi yang membuat segalanya berdiri. Praktis, disiplin, dan dapat diandalkan.',
            'slug' => 'the-stabilizer',
            'traits' => ['Stabil', 'Disiplin', 'Terstruktur', 'Bertanggung Jawab', 'Dapat Diandalkan'],
            'quote' => 'Saya Membangun Sesuatu yang Bertahan.',
            'description' => 'Anda adalah fondasi yang membuat segalanya berdiri. Praktis, disiplin, dan dapat diandalkan. Anda mengubah kekacauan menjadi keteraturan, ide menjadi kenyataan, dan mimpi menjadi struktur. Anda stabil, bertanggung jawab, dan terstruktur.',
            'essence_name' => 'ASYIHAN ESSENCE IV — SANG PEMBANGUN',
            'aroma_resonan' => 'Bergamot, Lavender, & Cedarwood',
            'aroma_notes_top_title' => 'Bergamot, Green Apple & Cypress',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, hijau, dan membawa energi fokus',
            'aroma_notes_base_title' => 'Cedarwood, Vetiver & Oakmoss',
            'aroma_notes_base_desc' => 'Memberi fondasi yang kokoh, membumi, dan tahan lama',
            'formula_extract' => 'Ekstrak murni Bergamot, Green Apple, Cypress, Lavender, Clary Sage, Cedarwood, dan Oakmoss.',
            'notes' => [
                'top' => 'Bergamot, Green Apple, Cypress',
                'middle' => 'Lavender, Geranium, Clary Sage',
                'base' => 'Cedarwood, Vetiver, Oakmoss, Patchouli',
            ],
            'fragrance_description' => 'Aroma segar dan fokus dari Bergamot dan Cypress, dipadukan nuansa herbal Lavender yang menenangkan dan terarah, berakar pada keteguhan Cedarwood, Vetiver, dan Oakmoss yang kokoh membumi.',
            'ajian' => 'Saya tenang. Saya terarah. Saya membangun.',
            'ajian_short' => 'Saya membangun sesuatu yang bertahan.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam. Fokus pada tujuan yang ingin Anda capai. Ingat, setiap langkah Anda membangun masa depan Anda.',
            'element' => 'Tanah',
            'color' => '#8B7355',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_4_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Ciputra',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Raja properti Indonesia — membangun kota demi kota dari ketiadaan dengan disiplin dan visi jangka panjang.',
                    'lahir' => '24 Agustus 1931',
                ],
                [
                    'nama' => 'Bill Gates',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Co-founder Microsoft — membangun fondasi era komputer personal yang mengubah peradaban manusia.',
                    'lahir' => '28 Oktober 1955',
                ],
                [
                    'nama' => 'Warren Buffett',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Investor legendaris — membangun kekayaan dengan kesabaran, disiplin, dan prinsip nilai jangka panjang.',
                    'lahir' => '30 Agustus 1930',
                ],
                [
                    'nama' => 'Henry Ford',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Pendiri Ford Motor Company — membangun industri otomotif modern dengan sistem produksi massal.',
                    'lahir' => '30 Juli 1863',
                ],
                [
                    'nama' => 'Joko Widodo',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Presiden RI ke-7 — pembangun infrastruktur yang mengubah wajah konektivitas seluruh nusantara.',
                    'lahir' => '21 Juni 1961',
                ],
                [
                    'nama' => 'Mochtar Riady',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Pendiri Lippo Group — membangun kerajaan bisnis dari Eropa hingga Asia dengan fondasi yang kokoh.',
                    'lahir' => '12 Mei 1929',
                ],
                [
                    'nama' => 'Angela Merkel',
                    'asal' => 'Jerman',
                    'deskripsi' => 'Kanselir Jerman terlama — membangun stabilitas Eropa dengan pendekatan metodis dan pragmatis.',
                    'lahir' => '17 Juli 1954',
                ],
            ],
        ],
        5 => [
            'number' => 5,
            'name' => 'Sang Penjelajah',
            'badge' => 'THE ADVENTURER',
            'subtitle_id' => 'Sang Penjelajah & Pembawa Perubahan',
            'display_title' => 'SANG PENJELAJAH',
            'short_desc' => 'Anda bebas, adaptif, dan penuh rasa ingin tahu. Anda tidak takut perubahan dan selalu siap menjelajah.',
            'slug' => 'the-adventurer',
            'traits' => ['Bebas', 'Adaptif', 'Petualang', 'Energik', 'Rasa Ingin Tahu'],
            'quote' => 'Saya Diciptakan untuk Bergerak.',
            'description' => 'Anda bebas, adaptif, dan penuh rasa ingin tahu. Anda tidak takut perubahan. Anda mencari pengalaman, menjelajah tempat baru, dan menikmati setiap kemungkinan yang datang. Dunia adalah ruang Anda untuk belajar, berkembang, dan menemukan diri.',
            'essence_name' => 'ASYIHAN ESSENCE V — SANG PENJELAJAH',
            'aroma_resonan' => 'Bergamot, Marine Accord, & Ambergris',
            'aroma_notes_top_title' => 'Bergamot, Lemon & Pink Pepper',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, ceria, dan membangkitkan semangat petualang',
            'aroma_notes_base_title' => 'Ambergris, Vetiver & Cedarwood',
            'aroma_notes_base_desc' => 'Fondasi hangat dan tahan lama yang membumi dan menenangkan',
            'formula_extract' => 'Ekstrak murni Bergamot, Pink Pepper, Marine Accord, Violet Leaf, Ambergris, dan Vetiver.',
            'notes' => [
                'top' => 'Bergamot, Lemon, Grapefruit, Pink Pepper',
                'middle' => 'Marine Accord, Jasmine, Violet Leaf, Clary Sage',
                'base' => 'Ambergris, Vetiver, Cedarwood, Musk',
            ],
            'fragrance_description' => 'Percikan kesegaran Citrus dan Pink Pepper yang membangkitkan gairah petualangan, diembus kesegaran Marine Accord dan Violet Leaf bagai angin laut bebas, lalu mendarat pada kehangatan Ambergris dan Vetiver yang menenangkan.',
            'ajian' => 'Saya terbuka pada kemungkinan berikutnya.',
            'ajian_short' => 'Saya diciptakan untuk bergerak.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam. Ingat arah tujuan dan nikmati prosesnya. Bergeraklah. Dunia menanti Anda.',
            'element' => 'Angin',
            'color' => '#2E8B57',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_5_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Richard Branson',
                    'asal' => 'Inggris',
                    'deskripsi' => 'Pendiri Virgin Group — penjelajah bisnis, laut, dan antariksa yang tidak pernah berhenti bereksperimen.',
                    'lahir' => '18 Juli 1950',
                ],
                [
                    'nama' => 'Ernest Hemingway',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Novelis penjelajah — menjadikan setiap sudut dunia sebagai kanvas tulisannya yang abadi.',
                    'lahir' => '21 Juli 1899',
                ],
                [
                    'nama' => 'Christiano Ronaldo',
                    'asal' => 'Portugal',
                    'deskripsi' => 'Bintang sepak bola dunia — penjelajah kompetisi dari Portugal ke Inggris, Spanyol, Italia, hingga Arab.',
                    'lahir' => '5 Februari 1985',
                ],
                [
                    'nama' => 'Megawati Soekarnoputri',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Presiden RI ke-5 — penjelajah panggung politik yang menembus batas sebagai pemimpin perempuan pertama.',
                    'lahir' => '23 Januari 1947',
                ],
                [
                    'nama' => 'Marco Polo',
                    'asal' => 'Italia',
                    'deskripsi' => 'Penjelajah abad pertengahan — membuka jalur sutra dan menghubungkan Eropa dengan Asia.',
                    'lahir' => '15 September 1254',
                ],
                [
                    'nama' => 'Sheila Majid',
                    'asal' => 'Malaysia',
                    'deskripsi' => 'Penyanyi jazz Asia — penjelajah genre musik yang melampaui batas negara dan generasi.',
                    'lahir' => '5 Januari 1965',
                ],
                [
                    'nama' => 'Anies Baswedan',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Politisi & mantan Gubernur DKI — penjelajah ide dan gagasan segar dalam lanskap perpolitikan Indonesia.',
                    'lahir' => '7 Mei 1969',
                ],
            ],
        ],
        6 => [
            'number' => 6,
            'name' => 'Sang Pengasuh',
            'badge' => 'THE NURTURER',
            'subtitle_id' => 'Sang Pengasuh & Penyembuh Jiwa',
            'display_title' => 'SANG PENGASUH',
            'short_desc' => 'Anda adalah pelindung alami yang penuh kasih. Selalu hadir merawat, melindungi, menenangkan, dan menumbuhkan kebaikan serta keharmonisan.',
            'slug' => 'the-nurturer',
            'traits' => ['Pengasuh', 'Peduli', 'Menumbuhkan', 'Aman', 'Penyayang'],
            'quote' => 'Saya Merawat dengan Kasih, Saya Tumbuh Bersama Kehidupan.',
            'description' => 'Anda adalah pelindung alami yang penuh kasih. Anda intuitif, sabar, dan selalu hadir untuk orang lain. Anda menciptakan ruang aman, mendukung pertumbuhan, dan menumbuhkan kebaikan di setiap lingkungan yang Anda sentuh. Kehadiran Anda membawa rasa tenang, nyaman, dan penuh kehangatan.',
            'essence_name' => 'ASYIHAN ESSENCE VI — SANG PENGASUH',
            'aroma_resonan' => 'Bergamot, Jasmine, & Sandalwood',
            'aroma_notes_top_title' => 'Bergamot, Orange Blossom & Mandarin',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, manis lembut, dan menenangkan seperti pelukan hangat di pagi hari',
            'aroma_notes_base_title' => 'Sandalwood, Vanilla & Musk',
            'aroma_notes_base_desc' => 'Memberi fondasi yang hangat, lembut, dan menenangkan jiwa yang membawa rasa aman',
            'formula_extract' => 'Ekstrak murni Bergamot, Orange Blossom, Mandarin, Jasmine, Neroli, Sandalwood, Vanilla, dan Musk.',
            'notes' => [
                'top' => 'Bergamot, Orange Blossom, Mandarin, Green Tea',
                'middle' => 'Jasmine, Neroli, Lily of the Valley, Ylang Ylang, White Freesia',
                'base' => 'Sandalwood, Vanilla, Musk, Amber, Cedarwood',
            ],
            'fragrance_description' => 'Aroma yang diawali dengan kesegaran manis dan lembut dari Bergamot dan Orange Blossom seperti pelukan hangat di pagi hari, disusul nuansa floral Jasmine dan Neroli yang penuh kasih dan intim, serta ditopang fondasi Sandalwood, Vanilla, dan Musk yang menghadirkan rasa aman dan kedamaian jiwa.',
            'ajian' => 'Saya merawat. Saya melindungi. Saya menumbuhkan. Saya menghangatkan.',
            'ajian_short' => 'Saya merawat dengan kasih, saya tumbuh bersama kehidupan.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Rasakan kasih dan kehangatan yang hadir. Rawat diri dan orang di sekitar Anda dengan penuh cinta.',
            'element' => 'Bumi',
            'color' => '#CD5C5C',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_6_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'R.A. Kartini',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Pahlawan emansipasi wanita Indonesia — mengasuh cita-cita pendidikan untuk semua dengan jiwa penuh kasih.',
                    'lahir' => '21 April 1879',
                ],
                [
                    'nama' => 'Mother Teresa',
                    'asal' => 'Albania / India',
                    'deskripsi' => 'Biarawati & pemenang Nobel Perdamaian — seluruh hidupnya didedikasikan untuk mengasuh kaum miskin dan sakit.',
                    'lahir' => '26 Agustus 1910',
                ],
                [
                    'nama' => 'Princess Diana',
                    'asal' => 'Inggris',
                    'deskripsi' => 'Putri rakyat Inggris — pengasuh jiwa yang tak kenal batas, dari penderita AIDS hingga korban ranjau darat.',
                    'lahir' => '1 Juli 1961',
                ],
                [
                    'nama' => 'Malala Yousafzai',
                    'asal' => 'Pakistan',
                    'deskripsi' => 'Aktivis pendidikan termuda pemenang Nobel — mengasuh hak belajar anak perempuan di seluruh dunia.',
                    'lahir' => '12 Juli 1997',
                ],
                [
                    'nama' => 'Sri Mulyani Indrawati',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Menteri Keuangan terbaik dunia — mengasuh ekonomi Indonesia dengan kepedulian dan integritas tinggi.',
                    'lahir' => '26 Agustus 1962',
                ],
                [
                    'nama' => 'Oprah Winfrey',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Media mogul & filantropis — jiwa pengasuh yang menyuburkan semangat jutaan jiwa dengan empatinya.',
                    'lahir' => '29 Januari 1954',
                ],
                [
                    'nama' => 'Yohanes Surya',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Fisikawan & pendidik — mengasuh bakat anak-anak terpencil Indonesia menjadi juara olimpiade sains dunia.',
                    'lahir' => '6 November 1963',
                ],
            ],
        ],
        7 => [
            'number' => 7,
            'name' => 'Sang Analis',
            'badge' => 'THE MYSTIC',
            'subtitle_id' => 'Sang Analis & Pencari Kebenaran Hakiki',
            'display_title' => 'SANG ANALIS',
            'short_desc' => 'Anda adalah pengamat tajam dan pemikir mendalam. Mampu melihat pola, memahami sebab-akibat, serta membawa kejelasan dan pencerahan.',
            'slug' => 'the-seeker',
            'traits' => ['Analitis', 'Cerdas', 'Wawasan', 'Jernih', 'Bijaksana'],
            'quote' => 'Saya Menganalisis dengan Jernih, Saya Memahami dengan Dalam, Saya Melangkah dengan Tepat.',
            'description' => 'Anda adalah pengamat yang tajam dan pemikir yang mendalam. Anda mampu melihat pola, memahami sebab-akibat, dan menemukan solusi dari setiap tantangan. Anda tidak terburu-buru dalam mengambil keputusan, karena Anda tahu bahwa kebenaran lahir dari pemahaman yang utuh. Kehadiran Anda membawa kejelasan, kearifan, dan arah yang pasti.',
            'essence_name' => 'ASYIHAN ESSENCE VII — SANG ANALIS',
            'aroma_resonan' => 'Bergamot, Green Tea, & Sandalwood',
            'aroma_notes_top_title' => 'Bergamot, Lemon & Green Tea',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, bersih, dan merangsang fokus serta kejernihan pikiran',
            'aroma_notes_base_title' => 'Sandalwood, Cedarwood & Amber',
            'aroma_notes_base_desc' => 'Memberi fondasi yang kokoh, stabil, dan membumi yang menenangkan',
            'formula_extract' => 'Ekstrak murni Bergamot, Lemon, Green Tea, Jasmine, Clary Sage, Sandalwood, Cedarwood, dan Amber.',
            'notes' => [
                'top' => 'Bergamot, Lemon, Green Tea, Grapefruit, Cardamom',
                'middle' => 'Jasmine, Neroli, Lily of the Valley, Clary Sage, Geranium',
                'base' => 'Sandalwood, Cedarwood, Amber, Musk, Vetiver',
            ],
            'fragrance_description' => 'Kesegaran jernih dari Bergamot, Lemon, dan Green Tea yang merangsang fokus pikiran, berpadu lembut dengan nuansa floral Jasmine dan Clary Sage yang membuka intuisi, di atas fondasi Sandalwood, Cedarwood, dan Amber yang kokoh, stabil, dan membumi.',
            'ajian' => 'Saya melihat dengan jernih. Saya memahami dengan dalam. Saya melangkah dengan tepat.',
            'ajian_short' => 'Saya menganalisis dengan jernih, saya memahami dengan dalam, saya melangkah dengan tepat.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Fokus pada analisis dan pemahaman. Terima wawasan dan ambil keputusan dengan bijaksana.',
            'element' => 'Ether',
            'color' => '#4B0082',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_7_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Albert Einstein',
                    'asal' => 'Jerman / AS',
                    'deskripsi' => 'Fisikawan genius — analisis mendalam terhadap alam semesta menghasilkan teori relativitas yang mengubah sains.',
                    'lahir' => '14 Maret 1879',
                ],
                [
                    'nama' => 'BJ Habibie',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Ilmuwan & Presiden RI ke-3 — analis jenius yang menghitung crack propagation pesawat terbang dengan presisi luar biasa.',
                    'lahir' => '25 Juni 1936',
                ],
                [
                    'nama' => 'Nikola Tesla',
                    'asal' => 'Serbia / AS',
                    'deskripsi' => 'Penemu arus bolak-balik — analis visioner yang karyanya baru dihargai dunia seabad setelah penciptaannya.',
                    'lahir' => '10 Juli 1856',
                ],
                [
                    'nama' => 'Stephen Hawking',
                    'asal' => 'Inggris',
                    'deskripsi' => 'Fisikawan kosmologi — menganalisis lubang hitam dan alam semesta dari kursi rodanya dengan pikiran tanpa batas.',
                    'lahir' => '8 Januari 1942',
                ],
                [
                    'nama' => 'Carl Jung',
                    'asal' => 'Swiss',
                    'deskripsi' => 'Psikolog arketipe — menganalisis kedalaman jiwa manusia dan menciptakan peta bawah sadar kolektif.',
                    'lahir' => '26 Juli 1875',
                ],
                [
                    'nama' => 'Isaac Newton',
                    'asal' => 'Inggris',
                    'deskripsi' => 'Bapak fisika klasik — menganalisis gerakan apel jatuh dan menemukan hukum gravitasi universal.',
                    'lahir' => '4 Januari 1643',
                ],
                [
                    'nama' => 'Bacharuddin Jusuf Habibie',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Maestro teknologi — menganalisis ribuan kalkulasi teknik untuk menghadirkan pesawat N250 kebanggaan bangsa.',
                    'lahir' => '25 Juni 1936',
                ],
            ],
        ],
        8 => [
            'number' => 8,
            'name' => 'Sang Strategis',
            'badge' => 'THE ACHIEVER',
            'subtitle_id' => 'Sang Strategis & Penguasa Kelimpahan',
            'display_title' => 'SANG STRATEGIS',
            'short_desc' => 'Anda adalah perencana visioner yang selalu selangkah di depan. Strategis, tenang, dan mampu mewujudkan visi menjadi aksi nyata.',
            'slug' => 'the-achiever',
            'traits' => ['Strategis', 'Visioner', 'Tepat', 'Terarah', 'Bijaksana'],
            'quote' => 'Saya Menyusun Langkah dengan Visi, Saya Mewujudkan dengan Aksi.',
            'description' => 'Anda adalah perencana yang visioner dan penuh pertimbangan. Anda mampu melihat peluang, menyusun strategi, dan mengambil keputusan yang tepat waktu. Anda tidak terburu-buru, namun selalu selangkah di depan. Kehadiran Anda membawa arah, ketenangan, dan hasil yang nyata.',
            'essence_name' => 'ASYIHAN ESSENCE VIII — SANG STRATEGIS',
            'aroma_resonan' => 'Bergamot, Black Pepper, & Sandalwood',
            'aroma_notes_top_title' => 'Bergamot, Black Pepper & Cardamom',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, bersih, dan membangkitkan semangat serta fokus pikiran',
            'aroma_notes_base_title' => 'Sandalwood, Cedarwood & Amber',
            'aroma_notes_base_desc' => 'Memberi fondasi yang kokoh, stabil, dan membumi yang membawa wibawa',
            'formula_extract' => 'Ekstrak murni Bergamot, Black Pepper, Cardamom, Iris, Geranium, Sandalwood, Cedarwood, dan Musk.',
            'notes' => [
                'top' => 'Bergamot, Lemon, Green Tea, Black Pepper, Cardamom',
                'middle' => 'Jasmine, Lily of the Valley, Neroli, White Freesia, Iris, Geranium',
                'base' => 'Sandalwood, Cedarwood, Amber, Musk, Vetiver',
            ],
            'fragrance_description' => 'Aroma berwibawa diawali perpaduan segar dan rempah tegas dari Bergamot, Black Pepper, dan Cardamom yang memicu konsentrasi puncak, bertransisi ke keanggunan Iris dan Jasmine, lalu berlabuh pada fondasi Sandalwood, Cedarwood, dan Amber yang kokoh, berwibawa, dan tahan lama.',
            'ajian' => 'Saya menyusun langkah dengan visi. Saya mewujudkan dengan aksi.',
            'ajian_short' => 'Saya menyusun langkah dengan visi, saya mewujudkan dengan aksi.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Fokus pada tujuan dan langkah Anda. Jalani hari dengan strategi dan keyakinan.',
            'element' => 'Logam',
            'color' => '#B8860B',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_8_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Sandiaga Salahuddin Uno',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Pengusaha & politisi — strategi bisnisnya membuktikan bahwa kesuksesan lahir dari kerja keras dan kalkulasi cerdas.',
                    'lahir' => '28 Juni 1969',
                ],
                [
                    'nama' => 'Jack Ma',
                    'asal' => 'China',
                    'deskripsi' => 'Pendiri Alibaba — merancang strategi e-commerce yang mengubah peta perdagangan global dari nol.',
                    'lahir' => '10 September 1964',
                ],
                [
                    'nama' => 'Lee Kuan Yew',
                    'asal' => 'Singapura',
                    'deskripsi' => 'Bapak Singapura modern — arsitek strategi pembangunan yang mengubah kampung nelayan menjadi metropolis dunia.',
                    'lahir' => '16 September 1923',
                ],
                [
                    'nama' => 'John D. Rockefeller',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Pendiri Standard Oil — miliarder pertama dunia dengan strategi monopoli yang tak tertandingi di zamannya.',
                    'lahir' => '8 Juli 1839',
                ],
                [
                    'nama' => 'Prabowo Subianto',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Presiden RI ke-8 & mantan jenderal — negarawan strategis dengan visi pertahanan dan kedaulatan bangsa.',
                    'lahir' => '17 Oktober 1951',
                ],
                [
                    'nama' => 'Sun Tzu',
                    'asal' => 'China',
                    'deskripsi' => 'Filsuf & jenderal kuno — "The Art of War"-nya menjadi kitab strategi yang dipelajari pemimpin sepanjang zaman.',
                    'lahir' => '544 SM',
                ],
                [
                    'nama' => 'Hartono Bersaudara (Robert & Michael)',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Pemilik Djarum & BCA — strategi bisnis lintas generasi yang menjadikan mereka orang terkaya di Indonesia.',
                    'lahir' => '28 April 1941',
                ],
            ],
        ],
        9 => [
            'number' => 9,
            'name' => 'Sang Pembimbing',
            'badge' => 'THE PHILANTHROPIST',
            'subtitle_id' => 'Sang Pembimbing & Cahaya Kemanusiaan',
            'display_title' => 'SANG PEMBIMBING',
            'short_desc' => 'Anda adalah cahaya penuntun dan inspirator bijak. Mampu melihat potensi terbaik, memberikan bimbingan tulus, dan membawa pencerahan.',
            'slug' => 'the-humanitarian',
            'traits' => ['Visioner', 'Bijaksana', 'Inspiratif', 'Penuntun', 'Bermakna'],
            'quote' => 'Saya Membimbing Langkah Anda Menuju Tujuan.',
            'description' => 'Anda adalah cahaya bagi orang lain di tengah kegelapan. Anda mampu memberikan arah, inspirasi, dan bimbingan yang tulus. Anda melihat potensi dalam diri dan orang lain, lalu mendorongnya untuk menjadi lebih baik. Kehadiran Anda menjadi penuntun yang bijak. Anda membawa visi, nilai, dan kebijaksanaan yang menginspirasi banyak jiwa.',
            'essence_name' => 'ASYIHAN ESSENCE IX — SANG PEMBIMBING',
            'aroma_resonan' => 'Bergamot, Rose, & Sandalwood',
            'aroma_notes_top_title' => 'Bergamot, Lemon & Green Tea',
            'aroma_notes_top_desc' => 'Kesan pertama yang segar, bersih, dan membangkitkan semangat serta fokus',
            'aroma_notes_base_title' => 'Sandalwood, Cedarwood & Amber',
            'aroma_notes_base_desc' => 'Memberi fondasi yang kokoh, hangat, dan membumi yang menenangkan',
            'formula_extract' => 'Ekstrak murni Bergamot, Green Tea, Rose, Jasmine, Clary Sage, Sandalwood, Cedarwood, dan Amber.',
            'notes' => [
                'top' => 'Bergamot, Lemon, Green Tea, Cardamom',
                'middle' => 'Jasmine, Lily of the Valley, Neroli, Rose, Clary Sage',
                'base' => 'Sandalwood, Cedarwood, Amber, Musk, Vetiver',
            ],
            'fragrance_description' => 'Aroma spiritual yang anggun, dibuka oleh kesegaran Bergamot, Lemon, dan Green Tea yang membawa kedamaian, diperkaya kehangatan floral Rose, Jasmine, dan Clary Sage yang membangkitkan empati, serta disempurnakan kekokohan Sandalwood, Cedarwood, dan Amber yang tenang dan membumi.',
            'ajian' => 'Saya memimpin. Saya menginspirasi. Saya membimbing. Saya memberi arti.',
            'ajian_short' => 'Saya membimbing langkah Anda menuju tujuan.',
            'sugesti' => 'Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Niatkan tujuan dan langkah terbaik Anda. Jalani hari dengan inspirasi dan kebijaksanaan.',
            'element' => 'Cahaya',
            'color' => '#9370DB',
            'price' => 1380000,
            'bottle_image' => 'images/cards/clean/card_9_bottle.png',
            'tokoh_inspiratif' => [
                [
                    'nama' => 'Dalai Lama XIV',
                    'asal' => 'Tibet',
                    'deskripsi' => 'Pemimpin spiritual Buddhisme — membimbing jutaan jiwa menuju kedamaian batin dengan kasih universal.',
                    'lahir' => '6 Juli 1935',
                ],
                [
                    'nama' => 'Mohammad Hatta (Bung Hatta)',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Proklamator & Wakil Presiden RI pertama — pembimbing bangsa yang menjunjung integritas di atas segalanya.',
                    'lahir' => '12 Agustus 1902',
                ],
                [
                    'nama' => 'Martin Luther King Jr.',
                    'asal' => 'Amerika Serikat',
                    'deskripsi' => 'Pemimpin gerakan hak sipil — membimbing Amerika menuju keadilan dengan kekuatan mimpi dan damai.',
                    'lahir' => '15 Januari 1929',
                ],
                [
                    'nama' => 'Rabindranath Tagore',
                    'asal' => 'India',
                    'deskripsi' => 'Penyair & pemenang Nobel — membimbing jiwa Asia menuju kebangkitan spiritual lewat syair dan filosofi.',
                    'lahir' => '7 Mei 1861',
                ],
                [
                    'nama' => 'Nelson Mandela',
                    'asal' => 'Afrika Selatan',
                    'deskripsi' => 'Pembimbing rekonsiliasi bangsa — 27 tahun penjara tak memadamkan semangat membimbingnya menuju kebebasan.',
                    'lahir' => '18 Juli 1918',
                ],
                [
                    'nama' => 'Joko Widodo',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Presiden RI ke-7 — pembimbing rakyat kecil menuju kemakmuran dengan kepemimpinan yang membumi.',
                    'lahir' => '21 Juni 1961',
                ],
                [
                    'nama' => 'Buya Hamka',
                    'asal' => 'Indonesia',
                    'deskripsi' => 'Ulama, sastrawan & pejuang — pembimbing spiritual jutaan Muslim Indonesia dengan tulisan dan ceramah yang mencerahkan.',
                    'lahir' => '17 Februari 1908',
                ],
            ],
        ],
    ];

    /**
     * Calculate core number from birth date.
     */
    public function calculateFromBirthDate(string $birthDate): int
    {
        $date = \DateTime::createFromFormat('Y-m-d', $birthDate);

        if (! $date) {
            throw new \InvalidArgumentException('Invalid date format. Use Y-m-d.');
        }

        $day = (int) $date->format('d');
        $month = (int) $date->format('m');
        $year = (int) $date->format('Y');

        $sum = $this->sumDigits($day) + $this->sumDigits($month) + $this->sumDigits($year);

        return $this->reduceToSingleDigit($sum);
    }

    /**
     * Sum the digits of a number.
     */
    protected function sumDigits(int $number): int
    {
        return array_sum(str_split((string) abs($number)));
    }

    /**
     * Reduce a number to a single digit (1-9).
     */
    protected function reduceToSingleDigit(int $number): int
    {
        while ($number > 9) {
            $number = array_sum(str_split((string) $number));
        }

        return $number;
    }

    /**
     * Get archetype data by core number.
     */
    public function getArchetype(int $number): ?array
    {
        return $this->archetypes[$number] ?? null;
    }

    /**
     * Get all archetypes.
     */
    public function getAllArchetypes(): array
    {
        return $this->archetypes;
    }

    /**
     * Get archetype by slug.
     */
    public function getArchetypeBySlug(string $slug): ?array
    {
        $aliasMap = [
            'the-powerhouse' => 'the-achiever',
            'the-visionary' => 'the-humanitarian',
        ];
        $resolvedSlug = $aliasMap[$slug] ?? $slug;

        foreach ($this->archetypes as $archetype) {
            if ($archetype['slug'] === $resolvedSlug) {
                return $archetype;
            }
        }

        return null;
    }

    /**
     * Deterministically pick an inspirational figure based on birth date.
     * Same date always returns same figure; different dates with same core
     * number may return different figures.
     */
    public function getTokohForDate(int $coreNumber, string $birthDate): array
    {
        $archetype = $this->getArchetype($coreNumber);

        if (! $archetype || empty($archetype['tokoh_inspiratif'])) {
            return [
                'nama' => '-',
                'asal' => '-',
                'deskripsi' => '-',
                'lahir' => '-',
            ];
        }

        $tokohList = $archetype['tokoh_inspiratif'];
        $date = \DateTime::createFromFormat('Y-m-d', $birthDate);

        if (! $date) {
            return $tokohList[0];
        }

        $day = (int) $date->format('d');
        $month = (int) $date->format('m');
        $year = (int) $date->format('Y');

        // Deterministic index: distribute evenly across all figures
        $seed = ($day * 7) + ($month * 31) + ($year % 100);
        $index = $seed % count($tokohList);

        return $tokohList[$index];
    }

    /**
     * Get full reading for a birth date.
     */
    public function getReading(string $birthDate, string $name = ''): array
    {
        $coreNumber = $this->calculateFromBirthDate($birthDate);
        $archetype = $this->getArchetype($coreNumber);
        $tokoh = $this->getTokohForDate($coreNumber, $birthDate);

        return [
            'name' => $name,
            'birth_date' => $birthDate,
            'core_number' => $coreNumber,
            'archetype' => $archetype,
            'tokoh' => $tokoh,
        ];
    }
}
