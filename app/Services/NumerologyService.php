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
            'short_desc' => 'Pribadi mandiri, penuh inisiatif, berani mengambil risiko, dan berjiwa pemimpin sejati.',
            'slug' => 'the-leader',
            'traits' => ['Berani', 'Dominan', 'Visioner'],
            'quote' => 'Jiwa perintis yang membuka jalan, memimpin dengan keberanian dan visi yang tak pernah padam.',
            'description' => 'Kamu terlahir sebagai pemimpin — jiwa yang merintis, membuka jalan, dan tak pernah gentar menghadapi kegelapan. Angka 1 membawa energi matahari: terang, tegas, dan penuh daya cipta. Kamu adalah api yang menyala pertama kali.',
            'essence_name' => 'ASYIHAN ESSENCE I — SANG PENGGAGAS',
            'aroma_resonan' => 'Citrus, Cedarwood, & Pink Pepper',
            'aroma_notes_top_title' => 'Bergamot & Pink Pepper',
            'aroma_notes_top_desc' => 'Memberi kesegaran berani dan memicu fokus kepemimpinan',
            'aroma_notes_base_title' => 'Cedarwood & Vetiver',
            'aroma_notes_base_desc' => 'Kekokohan prinsip dan akar kepercayaan diri yang kuat',
            'formula_extract' => 'Ekstrak murni Bergamot Calabria, Cedarwood Atlas, dan Vetiver Bourbon.',
            'notes' => [
                'top' => 'Bergamot, Pink Pepper',
                'middle' => 'Cedarwood, Leather',
                'base' => 'Vetiver, Amber',
            ],
            'fragrance_description' => 'Aroma yang tegas dan berwibawa, seperti langkah pertama di tanah baru. Bergamot memberi kesegaran berani, Cedarwood memberi kekokohan, dan Vetiver memberi akar yang dalam.',
            'ajian' => 'Aku adalah yang pertama melangkah. Aku membawa cahaya ke tempat yang gelap. Setiap langkahku membuka jalan. Setiap keberanianku mengubah dunia.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat akan memulai sesuatu yang baru, memimpin rapat, atau menghadapi tantangan besar. Semprotkan di pergelangan tangan kiri — dekat dengan nadi kehidupan.',
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
            'short_desc' => 'Penuh empati, peka, diplomatik, membawa kedamaian, dan pandai merawat hubungan jiwa.',
            'slug' => 'the-harmonizer',
            'traits' => ['Lembut', 'Empatik', 'Penjaga'],
            'quote' => 'Jembatan antar jiwa — pendengar, penjaga keseimbangan, dan pembawa kedamaian yang mendalam.',
            'description' => 'Kamu adalah jembatan antar jiwa — pendengar, penjaga keseimbangan, dan pembawa kedamaian. Angka 2 membawa energi bulan: lembut, intuitif, dan penuh kasih. Kamu menyentuh hati tanpa perlu berteriak.',
            'essence_name' => 'ASYIHAN ESSENCE II — SANG PENGHUBUNG',
            'aroma_resonan' => 'Jasmine Sambac, Lavender, & White Musk',
            'aroma_notes_top_title' => 'Lavender & Pear',
            'aroma_notes_top_desc' => 'Menenangkan batin dan menghadirkan kejernihan emosional',
            'aroma_notes_base_title' => 'Sandalwood & White Musk',
            'aroma_notes_base_desc' => 'Kehangatan pelukan batin dan harmoni cinta yang abadi',
            'formula_extract' => 'Ekstrak murni Lavender Provence, Rose Damascena, dan White Musk lembut.',
            'notes' => [
                'top' => 'Lavender, Pear',
                'middle' => 'Rose, Jasmine',
                'base' => 'Sandalwood, White Musk',
            ],
            'fragrance_description' => 'Aroma yang menenangkan dan memeluk, seperti bisikan di taman malam. Lavender memberi ketenangan, Rose memberi keindahan hati, dan Sandalwood memberi kehangatan abadi.',
            'ajian' => 'Aku adalah ketenangan di tengah badai. Aku mendengar apa yang tak terucap. Kasihku menjadi jembatan. Kehadiranku menjadi rumah.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat ingin menciptakan kedekatan, mediasi, atau saat butuh ketenangan batin. Semprotkan di belakang telinga — tempat dimana bisikan terdengar paling lembut.',
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
            'short_desc' => 'Penuh ekspresi, optimis, berjiwa seni tinggi, dan memancarkan keceriaan sosial.',
            'slug' => 'the-creator',
            'traits' => ['Kreatif', 'Ekspresif', 'Optimis'],
            'quote' => 'Seniman kehidupan yang mewarnai dunia dengan ide, ekspresi murni, dan imajinasi tanpa batas.',
            'description' => 'Kamu adalah seniman kehidupan — yang mewarnai dunia dengan ide, suara, dan keindahan. Angka 3 membawa energi bintang: berkilau, memikat, dan penuh inspirasi. Kamu mengubah yang biasa menjadi luar biasa.',
            'essence_name' => 'ASYIHAN ESSENCE III — SANG KOMUNIKATOR',
            'aroma_resonan' => 'Neroli, Sparkling Citrus, & Vanilla',
            'aroma_notes_top_title' => 'Grapefruit & Neroli',
            'aroma_notes_top_desc' => 'Membuka kanal inspirasi kreatif dan antusiasme sosial',
            'aroma_notes_base_title' => 'Patchouli & Vanilla',
            'aroma_notes_base_desc' => 'Daya pikat magnetis dan imajinasi tanpa batas',
            'formula_extract' => 'Ekstrak murni Neroli Tunisia, Grapefruit Segar, dan Vanilla Madagaskar.',
            'notes' => [
                'top' => 'Grapefruit, Neroli',
                'middle' => 'Ylang-Ylang, Iris',
                'base' => 'Patchouli, Vanilla',
            ],
            'fragrance_description' => 'Aroma yang ceria dan memesona, seperti kanvas yang baru dilukis. Grapefruit memberi semangat kreatif, Ylang-Ylang memberi keindahan, dan Vanilla memberi kehangatan imajinasi.',
            'ajian' => 'Aku adalah warna di dunia abu-abu. Aku menciptakan keindahan dari kekosongan. Suaraku menggetarkan jiwa. Karyaku menjadi abadi.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat akan berkarya, tampil di panggung, atau butuh inspirasi. Semprotkan di dada — dekat dengan jantung kreativitas.',
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
            'short_desc' => 'Disiplin, praktis, setia, menyukai keteraturan, dan menjadi pilar pondasi kehidupan.',
            'slug' => 'the-stabilizer',
            'traits' => ['Setia', 'Tangguh', 'Terpercaya'],
            'quote' => 'Pilar kokoh yang menopang dengan kesabaran, integritas tinggi, dan kesetiaan tak tergoyahkan.',
            'description' => 'Kamu adalah fondasi — yang membangun dengan kesabaran, ketelitian, dan kesetiaan tanpa batas. Angka 4 membawa energi bumi: kokoh, dapat diandalkan, dan tak tergoyahkan. Kamu adalah pilar yang menopang segalanya.',
            'essence_name' => 'ASYIHAN ESSENCE IV — SANG PEMBANGUN',
            'aroma_resonan' => 'Vetiver, Patchouli, & Oakmoss',
            'aroma_notes_top_title' => 'Sage & Juniper Berry',
            'aroma_notes_top_desc' => 'Ketajaman pikiran logis dan disiplin diri yang teguh',
            'aroma_notes_base_title' => 'Oakmoss & Cedarwood',
            'aroma_notes_base_desc' => 'Kekuatan membumi tak tergoyahkan seperti batu karang',
            'formula_extract' => 'Ekstrak murni Clary Sage, Oakmoss Perancis, dan Cedarwood Virginia.',
            'notes' => [
                'top' => 'Sage, Juniper Berry',
                'middle' => 'Geranium, Nutmeg',
                'base' => 'Oakmoss, Cedarwood',
            ],
            'fragrance_description' => 'Aroma yang membumi dan kokoh, seperti akar pohon tua. Sage memberi kebijaksanaan, Geranium memberi keseimbangan, dan Oakmoss memberi kekuatan yang tenang.',
            'ajian' => 'Aku adalah batu karang di tengah ombak. Aku membangun apa yang bertahan. Kesabaranku adalah kekuatanku. Kesetiaanku adalah warisanku.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat perlu fokus, menyelesaikan pekerjaan penting, atau menghadapi situasi yang butuh ketabahan. Semprotkan di leher — simbol keteguhan.',
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
            'short_desc' => 'Dinamis, fleksibel, pencinta kebebasan sejati, magnet perubahan, dan penuh karisma.',
            'slug' => 'the-adventurer',
            'traits' => ['Bebas', 'Dinamis', 'Berani'],
            'quote' => 'Jiwa merdeka yang dinamis, selalu bergerak bebas, dan berani menjelajahi setiap cakrawala baru.',
            'description' => 'Kamu adalah angin — yang tak bisa dikurung, selalu bergerak, dan membawa perubahan ke mana pun kau pergi. Angka 5 membawa energi petualangan: dinamis, penasaran, dan penuh kejutan. Kamu menghidupi setiap momen.',
            'essence_name' => 'ASYIHAN ESSENCE V — SANG PENJELAJAH',
            'aroma_resonan' => 'Cardamom, Bergamot, & Black Pepper',
            'aroma_notes_top_title' => 'Lime & Ginger',
            'aroma_notes_top_desc' => 'Percikan energi dinamis dan gairah eksplorasi bebas',
            'aroma_notes_base_title' => 'Driftwood & Musk',
            'aroma_notes_base_desc' => 'Karisma magnet perubahan yang selalu memikat sekeliling',
            'formula_extract' => 'Ekstrak murni Cardamom Guatemala, Zesty Lime, dan Driftwood.',
            'notes' => [
                'top' => 'Lime, Ginger',
                'middle' => 'Cardamom, Sea Salt Accord',
                'base' => 'Driftwood, Musk',
            ],
            'fragrance_description' => 'Aroma yang segar dan tak terduga, seperti angin laut di pagi buta. Lime memberi kejutan, Cardamom memberi kehangatan petualangan, dan Driftwood memberi jejak perjalanan.',
            'ajian' => 'Aku adalah angin yang tak bisa dikurung. Aku menemukan kebebasan di setiap langkah. Dunia adalah rumahku. Setiap pengalaman adalah guruku.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat traveling, memulai petualangan baru, atau butuh keberanian untuk keluar dari zona nyaman. Semprotkan di pergelangan tangan — untuk membawa semangat petualangan.',
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
            'short_desc' => 'Penuh kasih, bertanggung jawab, harmonis, protektif, serta pencipta kenyamanan rumah.',
            'slug' => 'the-nurturer',
            'traits' => ['Penyayang', 'Peduli', 'Hangat'],
            'quote' => 'Rumah perlindungan penuh cinta, mengayomi jiwa dengan ketulusan hati dan kehangatan sejati.',
            'description' => 'Kamu adalah rumah — tempat kembali, tempat merasa aman, tempat menemukan cinta. Angka 6 membawa energi kasih sayang: hangat, melindungi, dan menyembuhkan. Kamu memberi tanpa mengharap kembali.',
            'essence_name' => 'ASYIHAN ESSENCE VI — SANG PENGASUH',
            'aroma_resonan' => 'Damask Rose, Fig, & Tonka Bean',
            'aroma_notes_top_title' => 'Peony & Mandarin',
            'aroma_notes_top_desc' => 'Kelembutan kasih sayang dan ketenangan rumah tangga',
            'aroma_notes_base_title' => 'Amber & Tonka Bean',
            'aroma_notes_base_desc' => 'Aura perlindungan batin dan rasa aman yang meneduhkan',
            'formula_extract' => 'Ekstrak murni Bulgarian Rose, Sweet Mandarin, dan Amber Resin hangat.',
            'notes' => [
                'top' => 'Peony, Mandarin',
                'middle' => 'Cinnamon, Honey Accord',
                'base' => 'Amber, Tonka Bean',
            ],
            'fragrance_description' => 'Aroma yang hangat dan memeluk, seperti rumah yang selalu menunggu. Peony memberi kelembutan, Cinnamon memberi kehangatan, dan Amber memberi kenyamanan abadi.',
            'ajian' => 'Aku adalah rumah bagi yang membutuhkan. Kasihku menyembuhkan luka. Pelukanku menghangatkan jiwa. Kehadiranku memberi rasa aman.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat berkumpul keluarga, merawat orang tercinta, atau saat ingin menciptakan suasana hangat. Semprotkan di bahu — tempat di mana orang bersandar.',
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
            'short_desc' => 'Intuitif, analitis, kontemplatif, mencintai kesendirian untuk mencari kebenaran hakiki.',
            'slug' => 'the-seeker',
            'traits' => ['Bijak', 'Spiritual', 'Misterius'],
            'quote' => 'Untuk jiwa yang mencari makna, menyelami kebenaran, dan membawa kebijaksanaan dalam setiap langkah.',
            'description' => 'Individu dengan angka 7 memiliki intuisi mistis yang tajam, haus akan pengetahuan mendalam, serta ketenangan batin yang memikat. Aroma berkarakter woody dan resin membantu memperkuat fokus meditatif dan koneksi batin.',
            'essence_name' => 'ASYIHAN ESSENCE VII — SANG ANALIS',
            'aroma_resonan' => 'Woody & Frankincense',
            'aroma_notes_top_title' => 'Bergamot Calabria & Olibanum Oman',
            'aroma_notes_top_desc' => 'Menenangkan pikiran dan membuka intuisi batin',
            'aroma_notes_base_title' => 'Sacred Sandalwood Mysore & Amber',
            'aroma_notes_base_desc' => 'Memberi ketenangan dan rasa grounding spiritual',
            'formula_extract' => 'Ekstrak murni Olibanum Oman, Sandalwood Mysore, dan Bergamot Calabria.',
            'notes' => [
                'top' => 'Bergamot, Saffron',
                'middle' => 'Oud, Frankincense',
                'base' => 'Dark Musk, Patchouli',
            ],
            'fragrance_description' => 'Aroma yang dalam dan misterius, seperti doa di tengah malam. Bergamot memberi kejernihan pikiran, Oud memberi kedalaman spiritual, dan Dark Musk memberi misteri yang memikat.',
            'ajian' => 'Aku mendengar bisikan alam semesta. Aku menemukan jawaban di keheningan. Kebijaksanaanku melampaui yang terlihat. Jiwaku menjelajah tanpa batas.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat bermeditasi, belajar, atau mencari jawaban atas pertanyaan besar dalam hidup. Semprotkan di kening — pintu intuisi.',
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
            'short_desc' => 'Penuh otoritas, visioner materi & spiritual, tangguh mengejar kesuksesan, dan berwibawa.',
            'slug' => 'the-achiever',
            'traits' => ['Ambisius', 'Fokus', 'Disiplin'],
            'quote' => 'Kekuatan ambisius yang fokus dan berdisiplin tinggi, mewujudkan cita-cita besar menuju puncak kejayaan.',
            'description' => 'Kamu adalah kekuatan — yang mengubah visi menjadi kenyataan, yang membangun kerajaan dari ketiadaan. Angka 8 membawa energi kemakmuran: ambisius, tegas, dan penuh otoritas. Kamu lahir untuk meraih puncak.',
            'essence_name' => 'ASYIHAN ESSENCE VIII — SANG STRATEGIS',
            'aroma_resonan' => 'Agarwood (Oud), Amber, & Leather',
            'aroma_notes_top_title' => 'Saffron & Elemi',
            'aroma_notes_top_desc' => 'Aura kemewahan, ketegasan visi, dan keberanian eksekusi',
            'aroma_notes_base_title' => 'Oud Kalimantan & Benzoin',
            'aroma_notes_base_desc' => 'Otoritas tertinggi dan daya tarik kemakmuran tanpa batas',
            'formula_extract' => 'Ekstrak murni Agarwood Kalimantan, Iranian Saffron, dan Smoked Leather.',
            'notes' => [
                'top' => 'Saffron, Elemi',
                'middle' => 'Agarwood, Tobacco',
                'base' => 'Oud, Benzoin',
            ],
            'fragrance_description' => 'Aroma yang megah dan berwibawa, seperti singgasana yang diukir dari emas. Saffron memberi kemewahan, Agarwood memberi kekuatan, dan Oud memberi otoritas yang tak terbantahkan.',
            'ajian' => 'Aku dilahirkan untuk berkuasa atas takdirku. Aku mengubah batu menjadi emas. Kekuatanku membangun, bukan merusak. Kemakmuranku mengalir tanpa batas.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat negosiasi bisnis, presentasi penting, atau saat ingin memancarkan wibawa. Semprotkan di kedua sisi leher — simbol otoritas.',
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
            'short_desc' => 'Toleran, berjiwa mulia, dermawan, berwawasan universal, serta menginspirasi perubahan dunia.',
            'slug' => 'the-humanitarian',
            'traits' => ['Bijak', 'Pengayom', 'Visioner'],
            'quote' => 'Jiwa luhur yang bijak dan visioner, mengayomi semesta dan menebar cahaya pencerahan abadi.',
            'description' => 'Kamu adalah jiwa tua — yang memahami siklus, merasakan semuanya lebih dalam, dan membawa cahaya untuk banyak orang. Angka 9 membawa energi kebijaksanaan universal: idealis, penuh belas kasih, dan visioner. Kamu adalah penutup siklus yang bijak.',
            'essence_name' => 'ASYIHAN ESSENCE IX — SANG PEMBIMBING',
            'aroma_resonan' => 'Rare Florals, Incense, & White Amber',
            'aroma_notes_top_title' => 'Iris Florence & Violet Leaf',
            'aroma_notes_top_desc' => 'Kehalusan rasa cinta semesta dan pandangan visioner',
            'aroma_notes_base_title' => 'Myrrh & Sacred Incense',
            'aroma_notes_base_desc' => 'Koneksi dengan yang ilahi dan pencerahan spiritual abadi',
            'formula_extract' => 'Ekstrak murni Tuscan Iris, Sacred Incense Kuil, dan Somalian Myrrh.',
            'notes' => [
                'top' => 'Iris, Violet Leaf',
                'middle' => 'Myrrh, Labdanum',
                'base' => 'Sandalwood, Incense',
            ],
            'fragrance_description' => 'Aroma yang transenden dan agung, seperti asap kemenyan di kuil kuno. Iris memberi kehalusan, Myrrh memberi kedalaman spiritual, dan Incense memberi koneksi dengan yang ilahi.',
            'ajian' => 'Aku melihat apa yang belum terlihat. Aku merasakan apa yang belum terasa. Cahayaku menerangi banyak jiwa. Perjalananku melampaui diriku sendiri.',
            'ajian_short' => 'Asih nu nyawiji dina rasa...',
            'sugesti' => 'Gunakan saat bermeditasi mendalam, melakukan kebaikan untuk orang lain, atau saat merasakan panggilan jiwa. Semprotkan di ubun-ubun — puncak spiritual.',
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
