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
            'slug' => 'the-leader',
            'traits' => ['Berani', 'Dominan', 'Visioner'],
            'description' => 'Kamu terlahir sebagai pemimpin — jiwa yang merintis, membuka jalan, dan tak pernah gentar menghadapi kegelapan. Angka 1 membawa energi matahari: terang, tegas, dan penuh daya cipta. Kamu adalah api yang menyala pertama kali.',
            'essence_name' => 'Essence I — The Leader',
            'notes' => [
                'top' => 'Bergamot, Pink Pepper',
                'middle' => 'Cedarwood, Leather',
                'base' => 'Vetiver, Amber',
            ],
            'fragrance_description' => 'Aroma yang tegas dan berwibawa, seperti langkah pertama di tanah baru. Bergamot memberi kesegaran berani, Cedarwood memberi kekokohan, dan Vetiver memberi akar yang dalam.',
            'ajian' => 'Aku adalah yang pertama melangkah. Aku membawa cahaya ke tempat yang gelap. Setiap langkahku membuka jalan. Setiap keberanianku mengubah dunia.',
            'sugesti' => 'Gunakan saat akan memulai sesuatu yang baru, memimpin rapat, atau menghadapi tantangan besar. Semprotkan di pergelangan tangan kiri — dekat dengan nadi kehidupan.',
            'element' => 'Api',
            'color' => '#C41E3A',
            'price' => 1380000,
        ],
        2 => [
            'number' => 2,
            'name' => 'The Harmonizer',
            'slug' => 'the-harmonizer',
            'traits' => ['Lembut', 'Empati', 'Penjaga'],
            'description' => 'Kamu adalah jembatan antar jiwa — pendengar, penjaga keseimbangan, dan pembawa kedamaian. Angka 2 membawa energi bulan: lembut, intuitif, dan penuh kasih. Kamu menyentuh hati tanpa perlu berteriak.',
            'essence_name' => 'Essence II — The Harmonizer',
            'notes' => [
                'top' => 'Lavender, Pear',
                'middle' => 'Rose, Jasmine',
                'base' => 'Sandalwood, White Musk',
            ],
            'fragrance_description' => 'Aroma yang menenangkan dan memeluk, seperti bisikan di taman malam. Lavender memberi ketenangan, Rose memberi keindahan hati, dan Sandalwood memberi kehangatan abadi.',
            'ajian' => 'Aku adalah ketenangan di tengah badai. Aku mendengar apa yang tak terucap. Kasihku menjadi jembatan. Kehadiranku menjadi rumah.',
            'sugesti' => 'Gunakan saat ingin menciptakan kedekatan, mediasi, atau saat butuh ketenangan batin. Semprotkan di belakang telinga — tempat dimana bisikan terdengar paling lembut.',
            'element' => 'Air',
            'color' => '#6B9BD2',
            'price' => 1380000,
        ],
        3 => [
            'number' => 3,
            'name' => 'The Creator',
            'slug' => 'the-creator',
            'traits' => ['Kreatif', 'Ekspresif', 'Optimis'],
            'description' => 'Kamu adalah seniman kehidupan — yang mewarnai dunia dengan ide, suara, dan keindahan. Angka 3 membawa energi bintang: berkilau, memikat, dan penuh inspirasi. Kamu mengubah yang biasa menjadi luar biasa.',
            'essence_name' => 'Essence III — The Creator',
            'notes' => [
                'top' => 'Grapefruit, Neroli',
                'middle' => 'Ylang-Ylang, Iris',
                'base' => 'Patchouli, Vanilla',
            ],
            'fragrance_description' => 'Aroma yang ceria dan memesona, seperti kanvas yang baru dilukis. Grapefruit memberi semangat kreatif, Ylang-Ylang memberi keindahan, dan Vanilla memberi kehangatan imajinasi.',
            'ajian' => 'Aku adalah warna di dunia abu-abu. Aku menciptakan keindahan dari kekosongan. Suaraku menggetarkan jiwa. Karyaku menjadi abadi.',
            'sugesti' => 'Gunakan saat akan berkarya, tampil di panggung, atau butuh inspirasi. Semprotkan di dada — dekat dengan jantung kreativitas.',
            'element' => 'Udara',
            'color' => '#FFB347',
            'price' => 1380000,
        ],
        4 => [
            'number' => 4,
            'name' => 'The Stabilizer',
            'slug' => 'the-stabilizer',
            'traits' => ['Kokoh', 'Setia', 'Disiplin'],
            'description' => 'Kamu adalah fondasi — yang membangun dengan kesabaran, ketelitian, dan kesetiaan tanpa batas. Angka 4 membawa energi bumi: kokoh, dapat diandalkan, dan tak tergoyahkan. Kamu adalah pilar yang menopang segalanya.',
            'essence_name' => 'Essence IV — The Stabilizer',
            'notes' => [
                'top' => 'Sage, Juniper Berry',
                'middle' => 'Geranium, Nutmeg',
                'base' => 'Oakmoss, Cedarwood',
            ],
            'fragrance_description' => 'Aroma yang membumi dan kokoh, seperti akar pohon tua. Sage memberi kebijaksanaan, Geranium memberi keseimbangan, dan Oakmoss memberi kekuatan yang tenang.',
            'ajian' => 'Aku adalah batu karang di tengah ombak. Aku membangun apa yang bertahan. Kesabaranku adalah kekuatanku. Kesetiaanku adalah warisanku.',
            'sugesti' => 'Gunakan saat perlu fokus, menyelesaikan pekerjaan penting, atau menghadapi situasi yang butuh ketabahan. Semprotkan di leher — simbol keteguhan.',
            'element' => 'Tanah',
            'color' => '#8B7355',
            'price' => 1380000,
        ],
        5 => [
            'number' => 5,
            'name' => 'The Adventurer',
            'slug' => 'the-adventurer',
            'traits' => ['Bebas', 'Dinamis', 'Penasaran'],
            'description' => 'Kamu adalah angin — yang tak bisa dikurung, selalu bergerak, dan membawa perubahan ke mana pun kau pergi. Angka 5 membawa energi petualangan: dinamis, penasaran, dan penuh kejutan. Kamu menghidupi setiap momen.',
            'essence_name' => 'Essence V — The Adventurer',
            'notes' => [
                'top' => 'Lime, Ginger',
                'middle' => 'Cardamom, Sea Salt Accord',
                'base' => 'Driftwood, Musk',
            ],
            'fragrance_description' => 'Aroma yang segar dan tak terduga, seperti angin laut di pagi buta. Lime memberi kejutan, Cardamom memberi kehangatan petualangan, dan Driftwood memberi jejak perjalanan.',
            'ajian' => 'Aku adalah angin yang tak bisa dikurung. Aku menemukan kebebasan di setiap langkah. Dunia adalah rumahku. Setiap pengalaman adalah guruku.',
            'sugesti' => 'Gunakan saat traveling, memulai petualangan baru, atau butuh keberanian untuk keluar dari zona nyaman. Semprotkan di pergelangan tangan — untuk membawa semangat petualangan.',
            'element' => 'Angin',
            'color' => '#2E8B57',
            'price' => 1380000,
        ],
        6 => [
            'number' => 6,
            'name' => 'The Nurturer',
            'slug' => 'the-nurturer',
            'traits' => ['Pengayom', 'Hangat', 'Harmonis'],
            'description' => 'Kamu adalah rumah — tempat kembali, tempat merasa aman, tempat menemukan cinta. Angka 6 membawa energi kasih sayang: hangat, melindungi, dan menyembuhkan. Kamu memberi tanpa mengharap kembali.',
            'essence_name' => 'Essence VI — The Nurturer',
            'notes' => [
                'top' => 'Peony, Mandarin',
                'middle' => 'Cinnamon, Honey Accord',
                'base' => 'Amber, Tonka Bean',
            ],
            'fragrance_description' => 'Aroma yang hangat dan memeluk, seperti rumah yang selalu menunggu. Peony memberi kelembutan, Cinnamon memberi kehangatan, dan Amber memberi kenyamanan abadi.',
            'ajian' => 'Aku adalah rumah bagi yang membutuhkan. Kasihku menyembuhkan luka. Pelukanku menghangatkan jiwa. Kehadiranku memberi rasa aman.',
            'sugesti' => 'Gunakan saat berkumpul keluarga, merawat orang tercinta, atau saat ingin menciptakan suasana hangat. Semprotkan di bahu — tempat di mana orang bersandar.',
            'element' => 'Bumi',
            'color' => '#CD5C5C',
            'price' => 1380000,
        ],
        7 => [
            'number' => 7,
            'name' => 'The Seeker',
            'slug' => 'the-seeker',
            'traits' => ['Bijak', 'Spiritual', 'Misterius'],
            'description' => 'Kamu adalah pencari kebenaran — yang menyelami kedalaman, membaca yang tersembunyi, dan membawa kebijaksanaan dari tempat-tempat sunyi. Angka 7 membawa energi mistis: spiritual, analitis, dan penuh wawasan.',
            'essence_name' => 'Essence VII — The Seeker',
            'notes' => [
                'top' => 'Bergamot, Black Pepper',
                'middle' => 'Oud, Frankincense',
                'base' => 'Dark Musk, Amber',
            ],
            'fragrance_description' => 'Aroma yang dalam dan misterius, seperti doa di tengah malam. Bergamot memberi kejernihan pikiran, Oud memberi kedalaman spiritual, dan Dark Musk memberi misteri yang memikat.',
            'ajian' => 'Aku mendengar bisikan alam semesta. Aku menemukan jawaban di keheningan. Kebijaksanaanku melampaui yang terlihat. Jiwaku menjelajah tanpa batas.',
            'sugesti' => 'Gunakan saat bermeditasi, belajar, atau mencari jawaban atas pertanyaan besar dalam hidup. Semprotkan di kening — pintu intuisi.',
            'element' => 'Ether',
            'color' => '#4B0082',
            'price' => 1380000,
        ],
        8 => [
            'number' => 8,
            'name' => 'The Powerhouse',
            'slug' => 'the-powerhouse',
            'traits' => ['Ambisius', 'Tegas', 'Berwibawa'],
            'description' => 'Kamu adalah kekuatan — yang mengubah visi menjadi kenyataan, yang membangun kerajaan dari ketiadaan. Angka 8 membawa energi kemakmuran: ambisius, tegas, dan penuh otoritas. Kamu lahir untuk meraih puncak.',
            'essence_name' => 'Essence VIII — The Powerhouse',
            'notes' => [
                'top' => 'Saffron, Elemi',
                'middle' => 'Agarwood, Tobacco',
                'base' => 'Oud, Benzoin',
            ],
            'fragrance_description' => 'Aroma yang megah dan berwibawa, seperti singgasana yang diukir dari emas. Saffron memberi kemewahan, Agarwood memberi kekuatan, dan Oud memberi otoritas yang tak terbantahkan.',
            'ajian' => 'Aku dilahirkan untuk berkuasa atas takdirku. Aku mengubah batu menjadi emas. Kekuatanku membangun, bukan merusak. Kemakmuranku mengalir tanpa batas.',
            'sugesti' => 'Gunakan saat negosiasi bisnis, presentasi penting, atau saat ingin memancarkan wibawa. Semprotkan di kedua sisi leher — simbol otoritas.',
            'element' => 'Logam',
            'color' => '#B8860B',
            'price' => 1380000,
        ],
        9 => [
            'number' => 9,
            'name' => 'The Visionary',
            'slug' => 'the-visionary',
            'traits' => ['Idealis', 'Intuitif', 'Universal'],
            'description' => 'Kamu adalah jiwa tua — yang memahami siklus, merasakan semuanya lebih dalam, dan membawa cahaya untuk banyak orang. Angka 9 membawa energi kebijaksanaan universal: idealis, penuh belas kasih, dan visioner. Kamu adalah penutup siklus yang bijak.',
            'essence_name' => 'Essence IX — The Visionary',
            'notes' => [
                'top' => 'Iris, Violet Leaf',
                'middle' => 'Myrrh, Labdanum',
                'base' => 'Sandalwood, Incense',
            ],
            'fragrance_description' => 'Aroma yang transenden dan agung, seperti asap kemenyan di kuil kuno. Iris memberi kehalusan, Myrrh memberi kedalaman spiritual, dan Incense memberi koneksi dengan yang ilahi.',
            'ajian' => 'Aku melihat apa yang belum terlihat. Aku merasakan apa yang belum terasa. Cahayaku menerangi banyak jiwa. Perjalananku melampaui diriku sendiri.',
            'sugesti' => 'Gunakan saat bermeditasi mendalam, melakukan kebaikan untuk orang lain, atau saat merasakan panggilan jiwa. Semprotkan di ubun-ubun — puncak spiritual.',
            'element' => 'Cahaya',
            'color' => '#9370DB',
            'price' => 1380000,
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
        foreach ($this->archetypes as $archetype) {
            if ($archetype['slug'] === $slug) {
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
