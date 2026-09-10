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
            'name' => 'The Leader',
            'badge' => 'THE PIONEER',
            'subtitle_id' => 'Sang Penggerak',
            'display_title' => 'THE LEADER (Sang Penggerak)',
            'short_desc' => 'Pribadi mandiri, penuh inisiatif, berani mengambil risiko, dan berjiwa pemimpin sejati.',
            'slug' => 'the-leader',
            'traits' => ['Berani', 'Dominan', 'Visioner'],
            'quote' => 'Jiwa perintis yang membuka jalan, memimpin dengan keberanian dan visi yang tak pernah padam.',
            'description' => 'Kamu terlahir sebagai pemimpin — jiwa yang merintis, membuka jalan, dan tak pernah gentar menghadapi kegelapan. Angka 1 membawa energi matahari: terang, tegas, dan penuh daya cipta. Kamu adalah api yang menyala pertama kali.',
            'essence_name' => 'ASYIHAN ESSENCE I — THE LEADER',
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
        ],
        2 => [
            'number' => 2,
            'name' => 'The Harmonizer',
            'badge' => 'THE MEDIATOR',
            'subtitle_id' => 'Sang Penyelaras',
            'display_title' => 'THE HARMONIZER (Sang Penyelaras)',
            'short_desc' => 'Penuh empati, peka, diplomatik, membawa kedamaian, dan pandai merawat hubungan jiwa.',
            'slug' => 'the-harmonizer',
            'traits' => ['Lembut', 'Empatik', 'Penjaga'],
            'quote' => 'Jembatan antar jiwa — pendengar, penjaga keseimbangan, dan pembawa kedamaian yang mendalam.',
            'description' => 'Kamu adalah jembatan antar jiwa — pendengar, penjaga keseimbangan, dan pembawa kedamaian. Angka 2 membawa energi bulan: lembut, intuitif, dan penuh kasih. Kamu menyentuh hati tanpa perlu berteriak.',
            'essence_name' => 'ASYIHAN ESSENCE II — THE HARMONIZER',
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
        ],
        3 => [
            'number' => 3,
            'name' => 'The Creator',
            'badge' => 'THE COMMUNICATOR',
            'subtitle_id' => 'Sang Kreator Jiwa',
            'display_title' => 'THE CREATOR (Sang Kreator Jiwa)',
            'short_desc' => 'Penuh ekspresi, optimis, berjiwa seni tinggi, dan memancarkan keceriaan sosial.',
            'slug' => 'the-creator',
            'traits' => ['Kreatif', 'Ekspresif', 'Optimis'],
            'quote' => 'Seniman kehidupan yang mewarnai dunia dengan ide, ekspresi murni, dan imajinasi tanpa batas.',
            'description' => 'Kamu adalah seniman kehidupan — yang mewarnai dunia dengan ide, suara, dan keindahan. Angka 3 membawa energi bintang: berkilau, memikat, dan penuh inspirasi. Kamu mengubah yang biasa menjadi luar biasa.',
            'essence_name' => 'ASYIHAN ESSENCE III — THE CREATOR',
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
        ],
        4 => [
            'number' => 4,
            'name' => 'The Stabilizer',
            'badge' => 'THE BUILDER',
            'subtitle_id' => 'Sang Pembangun',
            'display_title' => 'THE STABILIZER (Sang Pembangun)',
            'short_desc' => 'Disiplin, praktis, setia, menyukai keteraturan, dan menjadi pilar pondasi kehidupan.',
            'slug' => 'the-stabilizer',
            'traits' => ['Setia', 'Tangguh', 'Terpercaya'],
            'quote' => 'Pilar kokoh yang menopang dengan kesabaran, integritas tinggi, dan kesetiaan tak tergoyahkan.',
            'description' => 'Kamu adalah fondasi — yang membangun dengan kesabaran, ketelitian, dan kesetiaan tanpa batas. Angka 4 membawa energi bumi: kokoh, dapat diandalkan, dan tak tergoyahkan. Kamu adalah pilar yang menopang segalanya.',
            'essence_name' => 'ASYIHAN ESSENCE IV — THE STABILIZER',
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
        ],
        5 => [
            'number' => 5,
            'name' => 'The Catalyst',
            'badge' => 'THE ADVENTURER',
            'subtitle_id' => 'Sang Petualang',
            'display_title' => 'THE CATALYST (Sang Petualang)',
            'short_desc' => 'Dinamis, fleksibel, pencinta kebebasan sejati, magnet perubahan, dan penuh karisma.',
            'slug' => 'the-adventurer',
            'traits' => ['Bebas', 'Dinamis', 'Berani'],
            'quote' => 'Jiwa merdeka yang dinamis, selalu bergerak bebas, dan berani menjelajahi setiap cakrawala baru.',
            'description' => 'Kamu adalah angin — yang tak bisa dikurung, selalu bergerak, dan membawa perubahan ke mana pun kau pergi. Angka 5 membawa energi petualangan: dinamis, penasaran, dan penuh kejutan. Kamu menghidupi setiap momen.',
            'essence_name' => 'ASYIHAN ESSENCE V — THE CATALYST',
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
        ],
        6 => [
            'number' => 6,
            'name' => 'The Healer',
            'badge' => 'THE NURTURER',
            'subtitle_id' => 'Sang Pengayom Kasih',
            'display_title' => 'THE HEALER (Sang Pengayom Kasih)',
            'short_desc' => 'Penuh kasih, bertanggung jawab, harmonis, protektif, serta pencipta kenyamanan rumah.',
            'slug' => 'the-nurturer',
            'traits' => ['Penyayang', 'Peduli', 'Hangat'],
            'quote' => 'Rumah perlindungan penuh cinta, mengayomi jiwa dengan ketulusan hati dan kehangatan sejati.',
            'description' => 'Kamu adalah rumah — tempat kembali, tempat merasa aman, tempat menemukan cinta. Angka 6 membawa energi kasih sayang: hangat, melindungi, dan menyembuhkan. Kamu memberi tanpa mengharap kembali.',
            'essence_name' => 'ASYIHAN ESSENCE VI — THE HEALER',
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
        ],
        7 => [
            'number' => 7,
            'name' => 'The Seeker',
            'badge' => 'THE MYSTIC',
            'subtitle_id' => 'Sang Pencari Kebenaran & Kedalaman Spiritual',
            'display_title' => 'THE SEEKER (Sang Pencari Hakekat)',
            'short_desc' => 'Intuitif, analitis, kontemplatif, mencintai kesendirian untuk mencari kebenaran hakiki.',
            'slug' => 'the-seeker',
            'traits' => ['Bijak', 'Spiritual', 'Misterius'],
            'quote' => 'Untuk jiwa yang mencari makna, menyelami kebenaran, dan membawa kebijaksanaan dalam setiap langkah.',
            'description' => 'Individu dengan angka 7 memiliki intuisi mistis yang tajam, haus akan pengetahuan mendalam, serta ketenangan batin yang memikat. Aroma berkarakter woody dan resin membantu memperkuat fokus meditatif dan koneksi batin.',
            'essence_name' => 'ASYIHAN ESSENCE VII — THE SEEKER',
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
        ],
        8 => [
            'number' => 8,
            'name' => 'The Achiever',
            'badge' => 'THE ACHIEVER',
            'subtitle_id' => 'Sang Penguasa Kelimpahan',
            'display_title' => 'THE ACHIEVER (Sang Penguasa Kelimpahan)',
            'short_desc' => 'Penuh otoritas, visioner materi & spiritual, tangguh mengejar kesuksesan, dan berwibawa.',
            'slug' => 'the-achiever',
            'traits' => ['Ambisius', 'Fokus', 'Disiplin'],
            'quote' => 'Kekuatan ambisius yang fokus dan berdisiplin tinggi, mewujudkan cita-cita besar menuju puncak kejayaan.',
            'description' => 'Kamu adalah kekuatan — yang mengubah visi menjadi kenyataan, yang membangun kerajaan dari ketiadaan. Angka 8 membawa energi kemakmuran: ambisius, tegas, dan penuh otoritas. Kamu lahir untuk meraih puncak.',
            'essence_name' => 'ASYIHAN ESSENCE VIII — THE ACHIEVER',
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
        ],
        9 => [
            'number' => 9,
            'name' => 'The Humanitarian',
            'badge' => 'THE PHILANTHROPIST',
            'subtitle_id' => 'Sang Bijak Kemanusiaan',
            'display_title' => 'THE HUMANITARIAN (Sang Bijak Kemanusiaan)',
            'short_desc' => 'Toleran, berjiwa mulia, dermawan, berwawasan universal, serta menginspirasi perubahan dunia.',
            'slug' => 'the-humanitarian',
            'traits' => ['Bijak', 'Pengayom', 'Visioner'],
            'quote' => 'Jiwa luhur yang bijak dan visioner, mengayomi semesta dan menebar cahaya pencerahan abadi.',
            'description' => 'Kamu adalah jiwa tua — yang memahami siklus, merasakan semuanya lebih dalam, dan membawa cahaya untuk banyak orang. Angka 9 membawa energi kebijaksanaan universal: idealis, penuh belas kasih, dan visioner. Kamu adalah penutup siklus yang bijak.',
            'essence_name' => 'ASYIHAN ESSENCE IX — THE HUMANITARIAN',
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
        ],
    ];

    /**
     * Calculate core number from birth date.
     */
    public function calculateFromBirthDate(string $birthDate): int
    {
        // Parse the date
        $date = \DateTime::createFromFormat('Y-m-d', $birthDate);

        if (! $date) {
            throw new \InvalidArgumentException('Invalid date format. Use Y-m-d.');
        }

        $day = (int) $date->format('d');
        $month = (int) $date->format('m');
        $year = (int) $date->format('Y');

        // Sum all digits
        $sum = $this->sumDigits($day) + $this->sumDigits($month) + $this->sumDigits($year);

        // Reduce to single digit
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
     * Get full reading for a birth date.
     */
    public function getReading(string $birthDate, string $name = ''): array
    {
        $coreNumber = $this->calculateFromBirthDate($birthDate);
        $archetype = $this->getArchetype($coreNumber);

        return [
            'name' => $name,
            'birth_date' => $birthDate,
            'core_number' => $coreNumber,
            'archetype' => $archetype,
        ];
    }
}
