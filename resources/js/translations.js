/**
 * ASYIHAN — Bilingual Translation Engine
 * Handles automatic Indonesian ↔ English translation via DOM text replacement.
 * Language preference stored in localStorage for cross-page persistence.
 */

const AsyihanTranslator = (() => {
    "use strict";

    // ────────────────────────────────────────────────────────
    // Translation Dictionary: Indonesian → English
    // ────────────────────────────────────────────────────────
    const dictionary = {
        // ── Navbar & Header ──
        "Masuk": "Sign In",
        "Daftar": "Register",
        "Keluar Portal": "Sign Out",
        "Profil Jiwa": "My Profile",
        "Peti Persembahan": "My Cart",
        "Keranjang": "Cart",
        "Gerbang Astral": "Astral Gateway",
        "Gerbang Astral (Admin)": "Astral Gateway (Admin)",
        "Daftar Akun": "Create Account",
        "Keranjang Pesanan": "Order Cart",

        // ── Homepage Hero & CTA ──
        "Temukan wewangian yang diciptakan dari esensi karakter Anda. Lahir dari Asih, dipandu oleh numerologi, dan diracik untuk keabadian.":
            "Discover fragrances created from the essence of your character. Born from Asih, guided by numerology, and crafted for eternity.",
        "LIHAT SEMUA ESSENCE": "VIEW ALL ESSENCES",
        "ASYIHAN adalah pertemuan antara kearifan Nusantara, kemewahan tradisi wewangian Timur Tengah, dan keunikan karakter setiap manusia.":
            "ASYIHAN is the convergence of Indonesian wisdom, the luxury of Middle Eastern fragrance traditions, and the uniqueness of every human character.",
        "9 Essence. 9 Karakter. 9 Aroma. Temukan yang paling sesuai dengan dirimu.":
            "9 Essences. 9 Characters. 9 Scents. Find the one that resonates with your soul.",
        "9 Karakter.": "9 Characters.",
        "9 Aroma.": "9 Scents.",
        "9 Essence.": "9 Essences.",
        "Temukan yang paling sesuai dengan dirimu.": "Find the one that resonates with your soul.",

        // ── Numerology Calculator ──
        "Hitung Angka Inti": "Calculate Your Core Number",
        "Masukkan nama & tanggal lahir manual": "Enter your name & date of birth",
        "NAMA LENGKAP": "FULL NAME",
        "Masukkan nama lengkap Anda": "Enter your full name",
        "TANGGAL LAHIR (INPUT MANUAL)": "DATE OF BIRTH (MANUAL INPUT)",
        "Ketik angka langsung": "Type numbers directly",
        "TGL": "DAY",
        "BLN": "MTH",
        "THN": "YR",
        "NOMOR TELEPON": "PHONE NUMBER",
        "TEMUKAN ESENSI JIWAKU": "DISCOVER MY SOUL ESSENCE",
        "Dihitung dengan reduksi numerologi Pythagoras 1–9.": "Calculated using Pythagorean numerology reduction 1–9.",
        "GERBANG ESENSI": "GATEWAY OF ESSENCE",
        "Koneksi Karakter & Scent": "Character & Scent Connection",
        "Setiap Angka Kelahiran Menyimpan Aroma Sejati": "Every Birth Number Holds a True Fragrance",
        "Kombinasi hari, bulan, dan tahun kelahiranmu adalah frekuensi kosmik yang menentukan kepribadian terdalammu. ASYIHAN menerjemahkan getaran tersebut menjadi racikan aroma sakral.":
            "The combination of your day, month, and year of birth is a cosmic frequency that defines your deepest personality. ASYIHAN translates those vibrations into a sacred aroma blend.",
        "Temukan angka intimu, selaraskan energi jiwamu, dan temukan formula aroma ASYIHAN yang ditakdirkan untukmu.":
            "Find your intimate number, align your soul energy, and discover the ASYIHAN aroma formula destined for you.",
        "HASIL NUMEROLOGI SAKRAL": "SACRED NUMEROLOGY RESULT",
        "Nama Anda": "Your Name",
        "Hitung Ulang ↺": "Recalculate ↺",
        "ANGKA INTI": "CORE NUMBER",
        "KARAKTERISTIK JIWAMU": "YOUR SOUL CHARACTERISTICS",
        "TOKOH INSPIRATIF SEJIWA DENGANMU": "INSPIRATIONAL FIGURE WITH YOUR SOUL",
        "REKOMENDASI PARFUM": "PERFUME RECOMMENDATION",
        "AJIAN JIWA": "SOUL INCANTATION",
        "INVESTASI PERSONAL": "PERSONAL INVESTMENT",
        "Ritual Lengkap": "Full Ritual",
        "ORDER SEKARANG": "ORDER NOW",
        "UNDUH PDF": "DOWNLOAD PDF",
        "Format tanggal tidak valid.": "Invalid date format.",
        "Menghitung Esensi...": "Calculating Essence...",

        // ── Calculator Page Specific ──
        "GUNAKAN KALKULATOR NUMEROLOGI": "USE THE NUMEROLOGY CALCULATOR",
        "Masukkan tanggal lahir Anda untuk melihat reduksi angka Pythagoras":
            "Enter your date of birth to see the Pythagorean number reduction",

        // ── Filosofi Asih Section ──
        "FILOSOFI ASIH": "THE PHILOSOPHY OF ASIH",
        "Lebih dari sekadar wewangian, ASYIHAN adalah sebuah perjalanan spiritual. Terlahir dari kearifan Nusantara Kuno, memadukan tradisi mistis dengan kemewahan perfumery Timur Tengah.":
            "More than just a fragrance, ASYIHAN is a spiritual journey. Born from ancient Indonesian wisdom, blending mystical traditions with the luxury of Middle Eastern perfumery.",
        "Asal Mula 'Asih'": "The Origin of 'Asih'",
        "Dalam bahasa Nusantara, 'Asih' bermakna kasih sayang yang mendalam, cinta yang tulus, dan kepedulian yang tak bersyarat. Ia adalah energi fundamental yang mengikat alam semesta.":
            "In the language of the Indonesian archipelago, 'Asih' means profound compassion, sincere love, and unconditional care. It is the fundamental energy that binds the universe.",
        "ASYIHAN mengambil esensi ini, meraciknya bukan hanya untuk mengharumkan raga, tetapi untuk membangkitkan 'Asih' di dalam jiwa. Setiap tetes adalah pengingat akan koneksi kita dengan Sang Pencipta dan alam semesta.":
            "ASYIHAN captures this essence, blending it not just to perfume the body, but to awaken 'Asih' within the soul. Every drop is a reminder of our connection to the Creator and the universe.",
        "Geometri Suci": "Sacred Geometry",
        "Mengungkap makna tersembunyi dibalik lambang ASYIHAN.": "Revealing the hidden meaning behind the ASYIHAN emblem.",
        "Aksara Awal": "The First Letter",
        "Huruf 'A' merepresentasikan awal, sebuah pintu gerbang menuju penemuan diri. Dalam konteks spiritual, ia adalah simbol dari 'Alif', fondasi dari segala penciptaan.":
            "The letter 'A' represents the beginning, a gateway to self-discovery. In a spiritual context, it is the symbol of 'Alif', the foundation of all creation.",
        "Lingkaran Keabadian": "Circle of Eternity",
        "Lingkaran sempurna melambangkan kesatuan, siklus kehidupan yang tak terputus, dan energi universal yang melingkupi kita. Ia mewakili ketidakterbatasan esensi jiwa.":
            "The perfect circle symbolizes unity, the unbroken cycle of life, and the universal energy that surrounds us. It represents the infinity of the soul's essence.",
        "Numerologi 1-9": "Numerology 1-9",
        "Angka-angka ini bukan sekadar urutan, melainkan representasi dari sembilan karakter dasar manusia dalam numerologi. Setiap angka memiliki frekuensi dan aromanya sendiri.":
            "These numbers are not merely a sequence, but a representation of the nine fundamental human characters in numerology. Each number has its own frequency and fragrance.",
        "Garis Geometris": "Geometric Lines",
        "Garis-garis yang menghubungkan elemen-elemen ini menggambarkan jalinan takdir. Ia menunjukkan bagaimana karakter kita (1-9) berinteraksi dengan energi semesta (Lingkaran) melalui titik awal kesadaran (A).":
            "The lines connecting these elements illustrate the weave of destiny. They show how our character (1-9) interacts with universal energy (Circle) through the starting point of awareness (A).",
        "Temukan Esensimu": "Discover Your Essence",

        // ── About Page ──
        "Filosofi & Kisah": "Philosophy & Story",
        "TENTANG ASYIHAN": "ABOUT ASYIHAN",
        "\"Ada hal-hal dalam hidup yang tidak dapat dilihat, tetapi dapat dirasakan.":
            "\"There are things in life that cannot be seen, but can be felt.",
        "Kasih. Rindu. Pesona. Ingatan.\"": "Love. Longing. Charm. Memory.\"",
        "Orang Nusantara mengenalnya melalui satu kata sederhana:": "The people of the Indonesian archipelago know it through one simple word:",
        "Asih bukan sekadar mencintai. Ia adalah rasa yang membuat manusia mendekat, menjaga, mengingat, dan meninggalkan kebaikan dalam hati manusia lainnya.":
            "Asih is more than just loving. It is a feeling that draws people closer, protects, remembers, and leaves goodness in the hearts of others.",
        "Dari ASIH Menjadi ASYIHAN": "From ASIH to ASYIHAN",
        "Dari ASIH, lahirlah": "From ASIH was born",
        "Sebuah kata dari tanah Nusantara yang sejak lama membawa makna tentang rasa, pesona, dan daya yang membuat seseorang dikenang.":
            "A word from the Indonesian archipelago that has long carried meaning about feeling, charm, and the power that makes someone unforgettable.",
        "Kemudian kami memberinya sebuah perjalanan baru:": "Then we gave it a new journey:",
        "ASYIHAN menjadi ASYIHAN": "ASYIHAN becomes ASYIHAN",
        "Sebuah nama yang akarnya tetap berpijak di tanah Nusantara, tetapi aromanya mengembara jauh menuju negeri-negeri tempat Oud dibakar, Musk diwariskan, Amber dihangatkan, dan wewangian menjadi bagian dari kehormatan serta identitas seseorang.":
            "A name rooted in the Indonesian archipelago, but whose fragrance wanders far to lands where Oud is burned, Musk is inherited, Amber is warmed, and perfume becomes part of one's honor and identity.",
        "Mengapa Aroma Kita Harus Sama?": "Why Should Our Scent Be the Same?",
        "ASYIHAN percaya bahwa kemewahan sejati bukanlah tentang memakai aroma yang sama dengan banyak orang. Sebab setiap manusia dilahirkan berbeda.":
            "ASYIHAN believes that true luxury is not about wearing the same fragrance as everyone else. Because every human is born different.",
        "Kita datang dengan tanggal yang berbeda. Membawa angka yang berbeda. Menjalani perjalanan yang berbeda. Memiliki kekuatan, kelembutan, luka, keberanian, dan impian yang berbeda.":
            "We arrive with different dates. Carrying different numbers. Walking different paths. Possessing different strengths, gentleness, wounds, courage, and dreams.",
        "Di ASYIHAN, angka bukanlah sekadar angka. Ia adalah pintu untuk memahami karakter.":
            "At ASYIHAN, numbers are not just numbers. They are the gateway to understanding character.",
        "Karakter Diterjemahkan Menjadi Aroma": "Character Translated into Fragrance",
        "Setiap elemen alam merepresentasikan kedalaman jiwa manusia.": "Every natural element represents the depth of the human soul.",
        "KAYU": "WOOD",
        "Untuk Keteguhan & Ketabahan": "For Resilience & Steadfastness",
        "REMPAH": "SPICE",
        "Untuk Gairah & Semangat": "For Passion & Spirit",
        "BUNGA": "FLOWER",
        "Untuk Kelembutan & Empati": "For Tenderness & Empathy",
        "RESIN": "RESIN",
        "Untuk Kontemplasi & Kedalaman": "For Contemplation & Depth",
        "TANAH": "EARTH",
        "Untuk Kestabilan & Fondasi": "For Stability & Foundation",
        "ETER": "ETHER",
        "Untuk Intuisi & Kemuliaan": "For Intuition & Nobility",

        // ── Collection Page ──
        "Koleksi Wewangian Sakral": "Sacred Fragrance Collection",
        "Klik untuk melihat detail": "Click to view details",

        // ── Contact Page ──
        "HUBUNGI KAMI": "CONTACT US",
        "Kami Siap Mendampingi": "We're Ready to Accompany",
        "Perjalanan Esensimu": "Your Essence Journey",
        "Ingin berkonsultasi mengenai pembacaan numerologi, pemilihan aroma arketipe khusus, pemesanan sakral untuk perhelatan dan korporasi, atau sekadar menanyakan jejak pesanan Anda? Para kurator kami siap menyapa jiwa Anda.":
            "Want to consult about numerology readings, special archetype aroma selection, sacred orders for events and corporates, or simply inquire about your order status? Our curators are ready to greet your soul.",
        "KONSULTASI SPIRITUAL CEPAT": "QUICK SPIRITUAL CONSULTATION",
        "Respon langsung untuk analisis angka inti dan konfirmasi pesanan aroma personal.":
            "Direct response for core number analysis and personal aroma order confirmation.",
        "BUKA WHATSAPP ↗": "OPEN WHATSAPP ↗",
        "KOLEKTIF & RITUAL MISTIS": "COLLECTIVE & MYSTIC RITUALS",
        "Simak ajian mingguan, kupas tuntas 9 karakter wewangian, dan live sniffing virtual.":
            "Explore weekly incantations, dive deep into 9 fragrance characters, and virtual live sniffing sessions.",
        "UPDATE & INSPIRASI HARIAN": "DAILY UPDATES & INSPIRATION",
        "IKUTI INSTAGRAM ›": "FOLLOW INSTAGRAM ›",
        "KOLABORASI & BISNIS": "COLLABORATION & BUSINESS",
        "KIRIM PESAN": "SEND MESSAGE",
        "Nama Anda *": "Your Name *",
        "Alamat Email *": "Email Address *",
        "Subjek Pesan": "Message Subject",
        "Pesan Anda *": "Your Message *",
        "Tulis pesanmu di sini... Kami siap membantu perjalanan esensimu.":
            "Write your message here... We're ready to help your essence journey.",
        "KIRIM PESAN JIWA": "SEND SOUL MESSAGE",
        "SETIAP HARI • 09.00 - 21.00 WIB": "EVERY DAY • 09:00 - 21:00 WIB",
        "Jam Operasional": "Operating Hours",
        "Waktu Respons": "Response Time",
        "Bahasa": "Language",

        // ── Contact Page FAQs ──
        "Apa itu ASYIHAN?": "What is ASYIHAN?",
        "ASYIHAN adalah brand parfum yang menghadirkan pengalaman wewangian dengan pendekatan personal. Melalui koleksi parfum dan konsep numerologi, ASYIHAN mengajak pelanggan menemukan aroma yang sesuai dengan preferensi dan karakter mereka.":
            "ASYIHAN is a fragrance brand presenting personalized scent experiences. Through perfume collections and numerology concepts, ASYIHAN invites customers to discover aromas tailored to their preferences and character.",
        "Apakah parfum ASYIHAN cocok untuk pria dan wanita?": "Is ASYIHAN perfume suitable for men and women?",
        "Pilihan parfum dapat disesuaikan dengan karakter aroma yang disukai, bukan hanya berdasarkan gender. Silakan lihat deskripsi setiap produk atau hubungi tim kami untuk mendapatkan rekomendasi.":
            "Fragrance selection can be tailored to scent character preferences rather than gender alone. Please see each product description or contact our team for recommendations.",
        "Apa itu numerologi ASYIHAN?": "What is ASYIHAN numerology?",
        "Numerologi ASYIHAN merupakan pendekatan personal yang menghubungkan tanggal lahir dengan interpretasi numerologi untuk membantu pelanggan mengeksplorasi pengalaman aroma.":
            "ASYIHAN numerology is a personal approach connecting birth dates with numerological interpretations to help customers explore scent experiences.",
        "Apakah ASYIHAN melayani pesanan khusus / custom fragrance?": "Does ASYIHAN accept custom orders / bespoke fragrance?",
        "Tidak, Saat ini kami belum melayani *bespoke fragrance formulation* untuk pernikahan sakral, perhelatan eksklusif, dan cenderamata korporasi, dll.":
            "No, currently we do not offer *bespoke fragrance formulation* for sacred weddings, exclusive events, corporate souvenirs, etc.",
        "PERTANYAAN UMUM (FAQ)": "FREQUENTLY ASKED QUESTIONS (FAQ)",

        // ── Order & Cart ──
        "KOLEKSI MAHAKARYA & PEMESANAN SAKRAL": "MASTERPIECE COLLECTION & SACRED ORDERING",
        "SEMUA KOLEKSI (ALL OFFERINGS)": "ALL COLLECTIONS (ALL OFFERINGS)",
        "MAHAKARYA PILIHAN TAKDIR": "MASTERPIECES CHOSEN BY DESTINY",
        "MENAMPILKAN": "SHOWING",
        "FORMULA MISTIK": "MYSTIC FORMULAS",
        "Tambah ke Keranjang": "Add to Cart",
        "TAMBAH KE PETI PERSEMBAHAN": "ADD TO SACRED CART",
        "Keranjang Pesanan Sakral": "Sacred Order Cart",
        "BERANDA": "HOME",
        "KERANJANG PESANAN": "ORDER CART",
        "MANIFESTASI PILIHAN BATIN": "MANIFESTATION OF INNER CHOICES",
        "Pilih wewangian & mahakarya batiniah yang ingin Anda manifestasikan untuk diproses ke gerbang pemesanan.":
            "Select the fragrances & inner masterpieces you wish to manifest for processing at the order gateway.",
        "HAPUS SEMUA PESANAN": "CLEAR ALL ORDERS",
        "Peti Persembahan Masih Hening": "The Sacred Cart Is Still Empty",
        "Belum ada esensi wewangian yang dipilih. Temukan formula yang selaras dengan angka kelahiran Anda atau jelajahi koleksi mahakarya kami.":
            "No fragrance essence selected yet. Find the formula aligned with your birth number or explore our masterpiece collection.",
        "Hitung Frekuensi Takdir": "Calculate Destiny Frequency",
        "Jelajahi Altar Koleksi": "Explore Collection Altar",
        "Pilih Semua": "Select All",
        "Hapus Terpilih": "Delete Selected",
        "RINGKASAN PESANAN": "ORDER SUMMARY",
        "TOTAL INVESTASI SAKRAL": "TOTAL SACRED INVESTMENT",
        "Total Harga": "Total Price",
        "Subtotal": "Subtotal",
        "CHECKOUT & SELESAIKAN PESANAN": "CHECKOUT & COMPLETE ORDER",
        "LANJUT KE CHECKOUT": "PROCEED TO CHECKOUT",
        "Silakan pilih minimal 1 item": "Please select at least 1 item",
        "Kosongkan keranjang untuk Semua pesanan?": "Clear the cart for all orders?",

        // ── Checkout / Payment ──
        "Beranda": "Home",
        "Gerbang Pembayaran": "Payment Gateway",
        "GERBANG TRANSAKSI SAKRAL": "SACRED TRANSACTION GATEWAY",
        "Selesaikan Penyelarasan Mahakarya": "Complete Your Masterpiece Alignment",
        "Status Transaksi": "Transaction Status",
        "Kedaluwarsa / Dibatalkan": "Expired / Cancelled",
        "Menunggu Pembayaran": "Awaiting Payment",
        "BATAS WAKTU PEMBAYARAN (24 JAM)": "PAYMENT TIME LIMIT (24 HOURS)",
        "Selesaikan sebelum:": "Complete before:",
        "Batas waktu pembayaran 24 jam telah berakhir. Pesanan ini telah otomatis dibatalkan oleh sistem.":
            "The 24-hour payment window has expired. This order has been automatically cancelled by the system.",
        "TOTAL YANG HARUS DIBAYAR": "TOTAL AMOUNT DUE",
        "BAYAR SEKARANG VIA MIDTRANS": "PAY NOW VIA MIDTRANS",
        "KEMBALI KE BERANDA": "RETURN TO HOME",
        "Kembali ke Beranda": "Return to Home",
        "DETAIL PESANAN": "ORDER DETAILS",
        "Nomor Pesanan": "Order Number",
        "Tanggal Pemesanan": "Order Date",
        "Metode Pembayaran": "Payment Method",

        // ── Auth ──
        "Pintu Penyelarasan": "Portal of Alignment",
        "MASUK PORTAL": "ENTER PORTAL",
        "Sinkronisasikan frekuensi auramu untuk melihat catatan takdir & pesanan sakral.":
            "Synchronize your aura frequency to view your destiny records & sacred orders.",
        "Alamat Email": "Email Address",
        "Kata Sandi": "Password",
        "Ingat Sesi Jiwa Ini": "Remember This Soul Session",
        "MASUK KE PORTAL": "ENTER PORTAL",
        "Jiwa baru?": "New soul?",
        "Daftar di sini": "Register here",
        "Inisiasi Jiwa Baru": "New Soul Initiation",
        "DAFTAR AKUN": "CREATE ACCOUNT",
        "Bergabunglah dengan lingkaran eksklusif ASYIHAN untuk memelihara wewangian takdir Anda.":
            "Join the exclusive ASYIHAN circle to nurture your destiny fragrance.",
        "Nama Lengkap": "Full Name",
        "Nama Jiwa Anda": "Your Soul Name",
        "Nomor WhatsApp": "WhatsApp Number",
        "Konfirmasi Kata Sandi": "Confirm Password",
        "AKTIFKAN PORTAL JIWA": "ACTIVATE SOUL PORTAL",
        "Sudah memiliki akun?": "Already have an account?",
        "Masuk di sini": "Sign in here",

        // ── Profile ──
        "PORTAL JIWA": "SOUL PORTAL",
        "Profil Jiwa Anda": "Your Soul Profile",
        "INFORMASI JIWA": "SOUL INFORMATION",
        "Nama": "Name",
        "Email": "Email",
        "Telepon": "Phone",
        "Bergabung sejak": "Member since",
        "Edit Profil": "Edit Profile",
        "Ubah Kata Sandi": "Change Password",
        "RIWAYAT PESANAN": "ORDER HISTORY",

        // ── Legal Pages ──
        "Kebijakan Privasi": "Privacy Policy",
        "Syarat & Ketentuan": "Terms & Conditions",
        "Pengiriman & Pengembalian": "Shipping & Returns",
        "Legal & Privasi": "Legal & Privacy",
        "Perlindungan & Keamanan Data Pribadi Anda": "Protection & Security of Your Personal Data",
        "Kebijakan Privasi Kami": "Our Privacy Policy",
        "Kami menghargai privasi Anda. Informasi pribadi yang dikumpulkan hanya digunakan untuk keperluan layanan dan meningkatkan pengalaman Anda bersama ASYIHAN.":
            "We value your privacy. Personal information collected is only used for service purposes and enhancing your experience with ASYIHAN.",
        "Disclaimer / Sanggahan Hasil Numerologi": "Disclaimer / Numerology Results Disclaimer",
        "Layanan ASYIHAN menyajikan analisis dan perhitungan numerologi sebagai metode penumbuhan sugesti serta dorongan energi positif untuk mengenali potensi diri. Seluruh hasil perhitungan numerologi dan rekomendasi wewangian yang dihasilkan":
            "ASYIHAN services present numerology analysis and calculations as a method of cultivating positive suggestion and energy encouragement to recognize self-potential. All numerology calculation results and fragrance recommendations produced",
        "bukanlah hal yang mutlak, pasti, atau kebenaran absolut": "are not absolute, certain, or absolute truth",
        "melainkan panduan inspiratif untuk memandu penyesuaian aroma diri Anda.": ", but an inspirational guide to align your personal scent.",
        "Poin-Poin Penting": "Key Points",
        "Perlindungan Data": "Data Protection",
        "Data tidak dibagikan ke pihak ketiga tanpa izin dari Anda.": "Data is never shared with third parties without your permission.",
        "Sifat Hasil": "Nature of Results",
        "Hasil numerologi bertujuan menumbuhkan sugesti positif & bukan mutlak.": "Numerology results aim to cultivate positive suggestion & are not absolute.",
        "Penghapusan Data": "Data Deletion",
        "Anda dapat meminta penghapusan data kapan saja dengan menghubungi kami.": "You may request data deletion at any time by contacting us.",
        "Jika Anda memiliki pertanyaan lebih lanjut mengenai kebijakan privasi kami, silakan hubungi tim concierge kami melalui halaman":
            "If you have further questions regarding our privacy policy, please contact our concierge team via the",

        // ── Shipping & Returns ──
        "Kebijakan Pengiriman & Pengembalian Produk ASYIHAN": "ASYIHAN Product Shipping & Return Policy",
        "Komitmen Layanan Pengiriman": "Shipping Service Commitment",
        "Kami berusaha memberikan layanan pengiriman terbaik.": "We strive to deliver the finest shipping service.",
        "Estimasi Pengiriman": "Shipping Estimation",
        "Estimasi pengiriman: 3–7 hari kerja.": "Estimated delivery: 3–7 business days.",
        "Syarat Pengembalian": "Return Terms",
        "Barang dapat dikembalikan dalam 14 hari jika rusak atau tidak sesuai.": "Items may be returned within 14 days if damaged or mismatched.",
        "Biaya Pengiriman": "Shipping Cost",
        "Biaya pengiriman tidak dapat dikembalikan.": "Shipping fees are non-refundable.",
        "Membutuhkan bantuan terkait status pesanan atau pengembalian? Hubungi tim concierge kami melalui halaman":
            "Need assistance regarding order status or returns? Contact our concierge team via",

        // ── Terms of Service ──
        "Legal & Syarat Layanan": "Legal & Terms of Service",
        "Syarat & Ketentuan Layanan ASYIHAN": "ASYIHAN Terms & Conditions of Service",
        "Persetujuan Layanan": "Service Agreement",
        "Dengan menggunakan layanan ini, Anda setuju pada syarat dan ketentuan berikut:":
            "By using this service, you agree to the following terms and conditions:",
        "Seluruh fitur kalkulator dan hasil perhitungan numerologi pada platform ASYIHAN disediakan untuk tujuan edukasi, refleksi diri, serta penumbuhan sugesti positif. Hasil analisis numerologi dan saran wewangian yang disajikan":
            "All calculator features and numerology calculation results on the ASYIHAN platform are provided for educational purposes, self-reflection, and positive suggestion cultivation. The numerology analysis results and fragrance suggestions presented",
        "bukanlah suatu kebenaran mutlak atau kepastian yang mengikat": "are not an absolute truth or binding certainty",
        "melainkan inspirasi untuk membangun harmoni energi dalam keseharian Anda.": ", but inspiration to build energy harmony in your daily life.",
        "Penggunaan Pribadi": "Personal Use",
        "Konten hanya untuk penggunaan pribadi dan non-komersial.": "Content is strictly for personal and non-commercial use.",
        "Sifat Numerologi": "Nature of Numerology",
        "Hasil bersifat penumbuhan sugesti positif & bukan mutlak.": "Results are intended for positive suggestion & are not absolute.",
        "Larangan Penyalahgunaan": "Prohibition of Misuse",
        "Dilarang menyalahgunakan layanan untuk tujuan ilegal.": "Misusing the service for illegal purposes is strictly prohibited.",
        "Perubahan Syarat": "Modification of Terms",
        "Perubahan syarat dapat dilakukan sewaktu-waktu.": "Terms may be updated or modified at any time.",
        "Untuk informasi atau pertanyaan mengenai syarat layanan kami, silakan hubungi tim ASYIHAN melalui":
            "For inquiries or questions regarding our terms of service, please contact the ASYIHAN team via",

        // ── Footer ──
        "NAVIGATION": "NAVIGATION",
        "CONTACT US": "CONTACT US",
        "LEGAL": "LEGAL",
        "Perhitungan numerologi berfungsi sebagai penyelarasan sugesti positif & bukan kebenaran mutlak.":
            "Numerology calculations serve as positive suggestion alignment & are not absolute truth.",

        // ── Toast & Notifications ──
        "Telah ditambahkan ke Peti Persembahan Sakral.": "Has been added to the Sacred Cart.",
        "Pemberitahuan Alkimia": "Alchemy Notification",
        "Gagal menambahkan produk.": "Failed to add product.",
        "Koneksi Terputus": "Connection Lost",
        "Gagal menyelaraskan persembahan. Silakan coba kembali.":
            "Failed to sync your offering. Please try again.",
        "Lihat Peti": "View Cart",
        "Mahakarya Wewangian": "Fragrance Masterpiece",

        // ── Validation Messages (JS-generated) ──
        "Silakan masukkan nama lengkap Anda.": "Please enter your full name.",
        "Silakan masukkan alamat email Anda.": "Please enter your email address.",
        "Silakan masukkan nomor telepon / WhatsApp Anda.": "Please enter your phone / WhatsApp number.",
        "Silakan isi ketiga kolom tanggal lahir (Hari, Bulan, Tahun).":
            "Please fill in all three date of birth fields (Day, Month, Year).",
        "Format tanggal harus berupa angka.": "Date format must be numeric.",
        "Hari harus di antara angka 1 sampai 31.": "Day must be between 1 and 31.",
        "Bulan harus di antara angka 1 sampai 12.": "Month must be between 1 and 12.",
        "Kombinasi tanggal tidak valid untuk kalender (misal: 31 Februari).":
            "Invalid date combination for the calendar (e.g., February 31).",
        "Tanggal lahir tidak boleh di masa depan.": "Date of birth cannot be in the future.",
        "Terjadi kendala saat menghitung esensi jiwa. Silakan coba kembali.":
            "An error occurred while calculating your soul essence. Please try again.",

        // ── Order Page Specific ──
        "Setiap tetes wewangian direcik dengan getaran alkimia murni — dari Extrait de Parfum tubuh berfrekuensi jiwa hingga penyelarasan atmosfer ruangan dan sanggar sakral.":
            "Every drop of fragrance is blended with pure alchemical vibrations — from Extrait de Parfum tuned to soul frequency to harmonizing the atmosphere of sacred spaces.",
        "9 ESSENCE NUMEROLOGI": "9 NUMEROLOGY ESSENCES",
        "DETAIL & PEMESANAN": "DETAIL & ORDERING",
        "Tambahkan ke Peti": "Add to Cart",
        "Catatan tambahan untuk pesanan...": "Additional notes for your order...",
        "PROSES PEMESANAN SAKRAL": "PROCESS SACRED ORDER",
        "Informasi Pemesanan": "Order Information",
        "Catatan Khusus (Opsional)": "Special Notes (Optional)",
        "Alamat Pengiriman": "Shipping Address",
        "Kota / Kabupaten": "City / District",
        "Provinsi": "Province",
        "Kode Pos": "Postal Code",

        // ── Shipping & Legal Pages ──
        "Informasi Pengiriman": "Shipping Information",
        "Kebijakan Pengembalian": "Return Policy",
        "Syarat Layanan": "Terms of Service",
        "Syarat Penggunaan": "Terms of Use",

        // ── Misc UI Elements ──
        "Muat Selengkapnya": "Load More",
        "Kembali": "Back",
        "Selanjutnya": "Next",
        "Simpan": "Save",
        "Batal": "Cancel",
        "Hapus": "Delete",
        "Ubah": "Edit",
        "Tutup": "Close",
        "Cari": "Search",
        "Produk": "Product",
        "Harga": "Price",
        "Jumlah": "Quantity",
        "Total": "Total",
        "Alamat": "Address",
        "Keterangan": "Description",
        "Catatan": "Notes",
        "Pilih": "Select",
        "Selesai": "Done",
        "Proses": "Process",
        "Kirim": "Send",
        "Unduh": "Download",

        // ── Collection detail page ──
        "Ajian Pembukaan": "Opening Incantation",
        "Pilar Aroma": "Aroma Pillars",
        "Puncak (Top)": "Top Notes",
        "Hati (Heart)": "Heart Notes",
        "Dasar (Base)": "Base Notes",
        "Karakter Jiwa": "Soul Character",
        "PESAN ESSENCE INI": "ORDER THIS ESSENCE",
        "KEMBALI KE KOLEKSI": "BACK TO COLLECTION",
        "Elemen": "Element",
        "Sifat Utama": "Main Traits",

        // ── Ajian Page ──
        "AJIAN & RITUAL": "INCANTATIONS & RITUALS",
        "Ritual Pembukaan Aura": "Aura Opening Ritual",
        "Mantra Sakral": "Sacred Mantras",

        // ── Archetypes & Subtitles ──
        "SANG PENGGAGAS": "THE PIONEER",
        "Sang Penggagas": "The Pioneer",
        "Sang Penggagas & Perintis Perubahan": "The Pioneer & Catalyst of Change",
        "SANG PENGHUBUNG": "THE MEDIATOR",
        "Sang Penghubung": "The Mediator",
        "Sang Penghubung & Penjaga Harmoni": "The Mediator & Guardian of Harmony",
        "SANG KOMUNIKATOR": "THE COMMUNICATOR",
        "Sang Komunikator": "The Communicator",
        "Sang Komunikator & Seniman Jiwa": "The Communicator & Soul Artist",
        "SANG PEMBANGUN": "THE BUILDER",
        "Sang Pembangun": "The Builder",
        "Sang Pembangun & Pilar Kehidupan": "The Builder & Pillar of Life",
        "SANG PENJELAJAH": "THE ADVENTURER",
        "Sang Penjelajah": "The Adventurer",
        "Sang Penjelajah & Pembawa Perubahan": "The Adventurer & Harbinger of Change",
        "SANG PENGASUH": "THE NURTURER",
        "Sang Pengasuh": "The Nurturer",
        "Sang Pengasuh & Penyembuh Jiwa": "The Nurturer & Soul Healer",
        "SANG ANALIS": "THE MYSTIC",
        "Sang Analis": "The Mystic",
        "Sang Analis & Pencari Kebenaran Hakiki": "The Mystic & Seeker of Truth",
        "SANG STRATEGIS": "THE ACHIEVER",
        "Sang Strategis": "The Achiever",
        "Sang Strategis & Penguasa Kelimpahan": "The Achiever & Master of Abundance",
        "SANG PEMBIMBING": "THE PHILANTHROPIST",
        "Sang Pembimbing": "The Philanthropist",
        "Sang Pembimbing & Cahaya Kemanusiaan": "The Philanthropist & Light of Humanity",

        // ── Elements & Badges ──
        "Elemen: Api": "Element: Fire",
        "Elemen: Air": "Element: Water",
        "Elemen: Udara": "Element: Air",
        "Elemen: Angin": "Element: Wind",
        "Elemen: Tanah": "Element: Earth",
        "Elemen: Bumi": "Element: Earth",
        "Elemen: Ether": "Element: Ether",
        "Elemen: Eter": "Element: Ether",
        "Elemen: Logam": "Element: Metal",
        "Elemen: Cahaya": "Element: Light",

        // ── Character Traits ──
        "Berani": "Brave",
        "Mandiri": "Independent",
        "Tegas": "Decisive",
        "Inisiatif": "Initiative",
        "Pemimpin": "Leader",
        "Intuitif": "Intuitive",
        "Empatik": "Empathetic",
        "Penenang": "Calming",
        "Penghubung": "Connector",
        "Supportif": "Supportive",
        "Ekspresif": "Expressive",
        "Kreatif": "Creative",
        "Optimis": "Optimistic",
        "Karismatik": "Charismatic",
        "Stabil": "Stable",
        "Disiplin": "Disciplined",
        "Terstruktur": "Structured",
        "Bertanggung Jawab": "Responsible",
        "Dapat Diandalkan": "Reliable",
        "Bebas": "Free",
        "Adaptif": "Adaptive",
        "Petualang": "Adventurous",
        "Energik": "Energetic",
        "Rasa Ingin Tahu": "Curious",
        "Peduli": "Caring",
        "Menumbuhkan": "Nurturing",
        "Penyayang": "Loving",
        "Cerdas": "Intelligent",
        "Wawasan": "Insightful",
        "Jernih": "Clear",
        "Bijaksana": "Wise",
        "Strategis": "Strategic",
        "Visioner": "Visionary",
        "Tepat": "Precise",
        "Terarah": "Focused",
        "Penuntun": "Guiding",
        "Bermakna": "Meaningful",

        // ── Quotes & Mantras ──
        "\"Aku Tidak Menunggu. Aku Memulai.\"": "\"I Do Not Wait. I Begin.\"",
        "\"Aku Memahami Tanpa Harus Dijelaskan.\"": "\"I Understand Without Explanation.\"",
        "\"Energi Aku Berbicara Sebelum Aku Berbicara.\"": "\"My Energy Speaks Before I Speak.\"",
        "\"Aku Membangun Sesuatu yang Bertahan.\"": "\"I Build Something That Endures.\"",
        "\"Aku Diciptakan untuk Bergerak.\"": "\"I Was Created to Move.\"",
        "\"Aku Merawat dengan Kasih, Aku Tumbuh Bersama Kehidupan.\"": "\"I Nurture With Love, I Grow Alongside Life.\"",
        "\"Aku Menganalisis dengan Jernih, Aku Memahami dengan Dalam, Aku Melangkah dengan Tepat.\"": "\"I Analyze With Clarity, I Understand Deeply, I Step With Precision.\"",
        "\"Aku Menyusun Langkah dengan Visi, Aku Mewujudkan dengan Aksi.\"": "\"I Plan My Steps With Vision, I Manifest With Action.\"",
        "\"Aku Membimbing Langkah Anda Menuju Tujuan.\"": "\"I Guide Your Steps Toward The Destination.\"",

        // ── Notes Descriptions ──
        "Menenangkan pikiran dan membuka intuisi batin": "Calms the mind and awakens inner intuition",
        "Memberi ketenangan dan rasa grounding spiritual": "Brings serenity and a spiritual grounding feeling",
        "Kesan pertama yang segar, tajam, dan penuh energi": "A fresh, sharp, and energy-filled first impression",
        "Memberi fondasi yang kuat, hangat, dan tahan lama": "Provides a strong, warm, and enduring foundation",
        "Kesan pertama yang segar, lembut, dan menenangkan": "A fresh, gentle, and calming first impression",
        "Memberi fondasi yang nyaman, lembut, dan menenangkan sepanjang hari": "Provides a comfortable, gentle, and soothing all-day foundation",
        "Kesan pertama yang segar, ceria, dan membangkitkan semangat": "A fresh, vibrant, and uplifting first impression",
        "Fondasi hangat, lembut, dan meninggalkan kesan yang menyenangkan": "A warm, soft foundation leaving a delightful impression",
        "Kesan pertama yang segar, hijau, dan membawa energi fokus": "A fresh, crisp green first impression bringing focused energy",
        "Memberi fondasi yang kokoh, membumi, dan tahan lama": "Provides a solid, grounded, and enduring foundation",

        // ── Detail & Product Specs ──
        "Catatan Aroma": "Fragrance Notes",
        "Komposisi": "Composition",
        "Waktu Terbaik": "Best Time",
        "Mantra Alkimia": "Alchemy Mantra",
        "Spesifikasi": "Specifications",
        "Konsentrasi": "Concentration",
        "Volume": "Volume",
        "Daya Tahan": "Longevity",
        "Jangkauan Aroma": "Sillage",
        "Ekstrak Wewangian": "Extrait de Parfum",
        "Pilih minimal satu item untuk dihapus.": "Please select at least one item to delete.",
        "Terjadi kendala jaringan saat mengarsipkan pesan.": "Network error while saving message.",
        "Buka WhatsApp": "Open WhatsApp",
        "Lahir:": "Born:",
        "Asal:": "Origin:",

        // ── Calculator Result Headings & Actions ──
        "ANALISIS ARKETIPE JIWA": "SOUL ARCHETYPE ANALYSIS",
        "REKOMENDASI WEWANGIAN TAKDIR": "DESTINY FRAGRANCE RECOMMENDATION",
        "PIRAMIDA AROMA": "FRAGRANCE PYRAMID",
        "Afirmasi Ajian": "Incantation Affirmation",
        "Cara Pemakaian & Sugesti": "Usage & Positive Suggestion",
        "Konsultasi Personal": "Personal Consultation",
        "Konsultasikan arketipe jiwa dan wewangian takdir Anda bersama kurator ASYIHAN":
            "Consult your soul archetype and destiny fragrance with an ASYIHAN curator",
        "SALIN TAUTAN HASIL": "COPY RESULT LINK",
        "BAGIKAN KE WHATSAPP": "SHARE TO WHATSAPP",
        "Tautan hasil berhasil disalin!": "Result link successfully copied!",
        "Bagian 1: Analisis Numerologi & Karakter": "Part 1: Numerology & Character Analysis",
        "Bagian 2: Rekomendasi Parfum": "Part 2: Perfume Recommendation",
        "PUNCAK": "TOP",
        "HATI": "HEART",
        "DASAR": "BASE",
        "Catatan Atas (Top)": "Top Notes",
        "Catatan Tengah (Middle)": "Middle Notes",
        "Catatan Dasar (Base)": "Base Notes",
        "INVESTASI": "INVESTMENT",
        "Hubungkan Jiwa": "Connect Soul",

        // ── 9 Archetypes Full Character Descriptions ──
        "Anda adalah pemimpin alami. Berpikir cepat, bertindak lebih cepat. Anda tidak takut mengambil risiko dan selalu mencari cara untuk menciptakan sesuatu yang baru. Ketegasan dan kemandirian Anda menginspirasi orang lain untuk bergerak maju.":
            "You are a natural leader. Quick to think, quicker to act. You are not afraid to take risks and always seek ways to create something new. Your decisiveness and independence inspire others to move forward.",
        "Anda peka terhadap perasaan orang lain. Anda menghubungkan hati, bukan sekadar kata. Kehadiran Anda menghadirkan rasa aman, dimana pun Anda berada. Anda memiliki kepekaan yang tinggi, intuitif, lembut, dan mampu membuat orang lain merasa dipahami dan aman.":
            "You are sensitive to the feelings of others. You connect hearts, not merely words. Your presence brings a sense of security wherever you are. You possess profound sensitivity, intuition, gentleness, and the ability to make others feel understood and safe.",
        "Anda membawa ide, cerita, dan inspirasi. Kata-kata Anda mampu menggerakkan, menghibur, dan mengangkat energi orang lain. Di mana pun Anda berada, Anda membuat suasana menjadi hidup. Anda ekspresif, kreatif, optimis, dan tidak takut mengekspresikan diri.":
            "You bring ideas, stories, and inspiration. Your words have the power to move, entertain, and uplift the energy of others. Wherever you go, you bring atmosphere to life. You are expressive, creative, optimistic, and fearless in expressing yourself.",
        "Anda adalah fondasi yang membuat segalanya berdiri. Praktis, disiplin, dan dapat diandalkan. Anda mengubah kekacauan menjadi keteraturan, ide menjadi kenyataan, dan mimpi menjadi struktur. Anda stabil, bertanggung jawab, dan terstruktur.":
            "You are the foundation that makes everything stand. Practical, disciplined, and reliable. You transform chaos into order, ideas into reality, and dreams into structure. You are stable, responsible, and structured.",
        "Anda bebas, adaptif, dan penuh rasa ingin tahu. Anda tidak takut perubahan. Anda mencari pengalaman, menjelajah tempat baru, dan menikmati setiap kemungkinan yang datang. Dunia adalah ruang Anda untuk belajar, berkembang, dan menemukan diri.":
            "You are free, adaptable, and full of curiosity. You fear no change. You seek experiences, explore new realms, and embrace every possibility that unfolds. The world is your canvas to learn, grow, and discover yourself.",
        "Anda adalah pelindung alami yang penuh kasih. Anda intuitif, sabar, dan selalu hadir untuk orang lain. Anda menciptakan ruang aman, mendukung pertumbuhan, dan menumbuhkan kebaikan di setiap lingkungan yang Anda sentuh. Kehadiran Anda membawa rasa tenang, nyaman, dan penuh kehangatan.":
            "You are a naturally caring protector. You are intuitive, patient, and always present for others. You create safe spaces, support growth, and nurture goodness in every environment you touch. Your presence radiates tranquility, comfort, and warmth.",
        "Anda adalah pengamat yang tajam dan pemikir yang mendalam. Anda mampu melihat pola, memahami sebab-akibat, dan menemukan solusi dari setiap tantangan. Anda tidak terburu-buru dalam mengambil keputusan, karena Anda tahu bahwa kebenaran lahir dari pemahaman yang utuh. Kehadiran Anda membawa kejelasan, kearifan, dan arah yang pasti.":
            "You are an astute observer and deep thinker. You see patterns, understand cause and effect, and uncover solutions to every challenge. You never rush decisions, knowing truth is born from complete understanding. Your presence brings clarity, wisdom, and definite direction.",
        "Anda adalah perencana yang visioner dan penuh pertimbangan. Anda mampu melihat peluang, menyusun strategi, dan mengambil keputusan yang tepat waktu. Anda tidak terburu-buru, namun selalu selangkah di depan. Kehadiran Anda membawa arah, ketenangan, dan hasil yang nyata.":
            "You are a visionary and calculated strategist. You spot opportunities, craft master strategies, and make timely decisions. You never rush, yet you are always one step ahead. Your presence brings direction, composure, and tangible results.",
        "Anda adalah cahaya bagi orang lain di tengah kegelapan. Anda mampu memberikan arah, inspirasi, dan bimbingan yang tulus. Anda melihat potensi dalam diri dan orang lain, lalu mendorongnya untuk menjadi lebih baik. Kehadiran Anda menjadi penuntun yang bijak. Anda membawa visi, nilai, dan kebijaksanaan yang menginspirasi banyak jiwa.":
            "You are a guiding light in the dark. You offer genuine direction, inspiration, and sincere mentorship. You perceive the potential within yourself and others, inspiring everyone to elevate. Your presence is a wise guide, carrying vision, values, and wisdom that illuminate souls.",

        // ── 9 Archetypes Full Fragrance Descriptions ──
        "Aroma yang diawali dengan kesan pertama yang segar, tajam dan penuh energi dari Bergamot, Grapefruit, dan Pink Pepper, dibalut kehangatan Ginger, Cardamom, dan Geranium yang membangun keberanian dari dalam, serta bertumpu pada fondasi Cedarwood, Amber, Vetiver, dan Musk yang kuat, hangat, dan tahan lama.":
            "A scent opening with a fresh, sharp, and energizing first impression of Bergamot, Grapefruit, and Pink Pepper, enveloped by the warmth of Ginger, Cardamom, and Geranium that builds inner courage, resting on a strong, warm, and enduring foundation of Cedarwood, Amber, Vetiver, and Musk.",
        "Kesan pertama yang segar, lembut, dan menenangkan dari Pear dan Mandarin, bertransisi ke nuansa floral lembut Peony dan Jasmine yang intim dan elegan, lalu ditutup dengan fondasi White Musk dan Sandalwood yang nyaman sepanjang hari.":
            "A fresh, soft, and soothing first impression of Pear and Mandarin, transitioning into delicate floral nuances of Peony and Jasmine that are intimate and elegant, completed by an all-day comfortable foundation of White Musk and Sandalwood.",
        "Aroma segar dan ceria dari trio Citrus yang membangkitkan semangat, diperkaya keanggunan Neroli dan Orange Blossom yang memikat, serta disempurnakan kehangatan Vanilla dan Tonka Bean yang manis dan menyenangkan.":
            "A fresh and cheerful scent from a spirit-uplifting Citrus trio, enriched by the captivating elegance of Neroli and Orange Blossom, perfected by the sweet and delightful warmth of Vanilla and Tonka Bean.",
        "Aroma segar dan fokus dari Bergamot dan Cypress, dipadukan nuansa herbal Lavender yang menenangkan dan terarah, berakar pada keteguhan Cedarwood, Vetiver, dan Oakmoss yang kokoh membumi.":
            "A fresh, focused aroma of Bergamot and Cypress, blended with calming, purposeful herbal Lavender nuances, rooted in the solid, grounding steadfastness of Cedarwood, Vetiver, and Oakmoss.",
        "Percikan kesegaran Citrus dan Pink Pepper yang membangkitkan gairah petualangan, diembus kesegaran Marine Accord dan Violet Leaf bagai angin laut bebas, lalu mendarat pada kehangatan Ambergris dan Vetiver yang menenangkan.":
            "A burst of Citrus and Pink Pepper freshness awakening adventurous passion, swept by the crisp breeze of Marine Accord and Violet Leaf like open ocean winds, settling upon the soothing warmth of Ambergris and Vetiver.",
        "Aroma yang diawali dengan kesegaran manis dan lembut dari Bergamot dan Orange Blossom seperti pelukan hangat di pagi hari, disusul nuansa floral Jasmine dan Neroli yang penuh kasih dan intim, serta ditopang fondasi Sandalwood, Vanilla, dan Musk yang menghadirkan rasa aman dan kedamaian jiwa.":
            "A scent opening with sweet, gentle freshness of Bergamot and Orange Blossom like a warm morning embrace, followed by affectionate and intimate floral nuances of Jasmine and Neroli, sustained by a foundation of Sandalwood, Vanilla, and Musk bringing security and soul peace.",
        "Kesegaran jernih dari Bergamot, Lemon, dan Green Tea yang merangsang fokus pikiran, berpadu lembut dengan nuansa floral Jasmine dan Clary Sage yang membuka intuisi, di atas fondasi Sandalwood, Cedarwood, dan Amber yang kokoh, stabil, dan membumi.":
            "Luminous freshness of Bergamot, Lemon, and Green Tea stimulating mental focus, blending softly with floral nuances of Jasmine and Clary Sage that unlock intuition, atop a solid, stable, grounding foundation of Sandalwood, Cedarwood, and Amber.",
        "Aroma berwibawa diawali perpaduan segar dan rempah tegas dari Bergamot, Black Pepper, dan Cardamom yang memicu konsentrasi puncak, bertransisi ke keanggunan Iris dan Jasmine, lalu berlabuh pada fondasi Sandalwood, Cedarwood, dan Amber yang kokoh, berwibawa, dan tahan lama.":
            "An authoritative aroma opening with a fresh and assertive spice blend of Bergamot, Black Pepper, and Cardamom triggering peak focus, transitioning into the elegance of Iris and Jasmine, anchoring upon a solid, distinguished, enduring foundation of Sandalwood, Cedarwood, and Amber.",
        "Aroma spiritual yang anggun, dibuka oleh kesegaran Bergamot, Lemon, dan Green Tea yang membawa kedamaian, diperkaya kehangatan floral Rose, Jasmine, dan Clary Sage yang membangkitkan empati, serta disempurnakan kekokohan Sandalwood, Cedarwood, dan Amber yang tenang dan membumi.":
            "An elegant spiritual fragrance opened by the peace-bringing freshness of Bergamot, Lemon, and Green Tea, enriched by the empathy-awakening floral warmth of Rose, Jasmine, and Clary Sage, perfected by the serene, grounding strength of Sandalwood, Cedarwood, and Amber.",

        // ── 9 Archetypes Usage Suggestions (Sugesti) ──
        "Semprotkan pada titik nadi Anda. Tarik napas dalam. Fokus pada tujuanmu. Ingat siapa dirimu.":
            "Spray onto your pulse points. Inhale deeply. Focus on your purpose. Remember who you are.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam. Rasakan kehadiran Anda. Hubungkan hati, bukan sekadar kata.":
            "Spray onto your pulse points. Inhale deeply. Feel your presence. Connect hearts, not merely words.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam. Tampilkan suara dan ide Anda. Biarkan energi baik menginspirasi orang lain.":
            "Spray onto your pulse points. Inhale deeply. Voice your ideas. Let good energy inspire others.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam. Fokus pada tujuan yang ingin Anda capai. Ingat, setiap langkah Anda membangun masa depan Anda.":
            "Spray onto your pulse points. Inhale deeply. Focus on the goals you wish to achieve. Remember, each step builds your future.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam. Ingat arah tujuan dan nikmati prosesnya. Bergeraklah. Dunia menanti Anda.":
            "Spray onto your pulse points. Inhale deeply. Remember your destination and savor the journey. Move forward. The world awaits you.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Rasakan kasih dan kehangatan yang hadir. Rawat diri dan orang di sekitar Anda dengan penuh cinta.":
            "Spray onto your pulse points. Inhale deeply. Feel the love and warmth present. Care for yourself and those around you with profound love.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Fokus pada analisis dan pemahaman. Terima wawasan dan ambil keputusan dengan bijaksana.":
            "Spray onto your pulse points. Inhale deeply. Focus on analysis and understanding. Receive insight and make wise decisions.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Fokus pada tujuan dan langkah Anda. Jalani hari dengan strategi dan keyakinan.":
            "Spray onto your pulse points. Inhale deeply. Focus on your objectives and steps. Live each day with strategy and confidence.",
        "Semprotkan pada titik nadi Anda. Tarik napas dalam-dalam. Niatkan tujuan dan langkah terbaik Anda. Jalani hari dengan inspirasi dan kebijaksanaan.":
            "Spray onto your pulse points. Inhale deeply. Intend your highest purpose and finest steps. Live each day with inspiration and wisdom.",
    };

    // Build reverse dictionary (EN → ID) for restoring
    const reverseDictionary = {};
    for (const [id, en] of Object.entries(dictionary)) {
        reverseDictionary[en] = id;
    }

    // Pre-sort dictionary keys once for optimal performance
    const dictKeys = Object.keys(dictionary).sort((a, b) => b.length - a.length);
    const reverseKeys = Object.keys(reverseDictionary).sort((a, b) => b.length - a.length);

    // ────────────────────────────────────────────────────────
    // Protected patterns — never translate these
    // ────────────────────────────────────────────────────────
    const PROTECTED_PATTERNS = [
        /^Rp\s?[\d.,]+/,           // Indonesian Rupiah prices e.g. Rp 350.000
        /^\d+[\.,]\d+/,            // Numbers with decimal
        /^[A-Z0-9]{6,}$/,          // Product codes / tokens
        /^#[A-Z0-9-]+$/,           // Order numbers like #ORD-XXXX
        /^ASYIHAN$/i,              // Brand name
        /^ESSENCE\s[IVXLCDM0-9]+/i,// Product designations like ESSENCE I, ESSENCE 1
        /^SB-Mid-/,                // Midtrans keys
        /^[a-zA-Z0-9._%+-]+@/,    // Email addresses
        /^\+?\d{8,}/,             // Phone numbers
        /^0\d{9,}/,               // Indonesian phone
        /^https?:\/\//,           // URLs
    ];

    // ────────────────────────────────────────────────────────
    // State & Cache
    // ────────────────────────────────────────────────────────
    const STORAGE_KEY = "asyihan-lang";
    const ORIGINAL_PLACEHOLDER_ATTR = "data-orig-placeholder";
    const NO_TRANSLATE_ATTR = "data-no-translate";

    // WeakMap to store original Indonesian text per Text node safely
    const origTextMap = new WeakMap();

    let currentLang = "id";
    let isTranslating = false;

    /**
     * Check if text should be protected from translation
     */
    function isProtected(text) {
        const trimmed = text.trim();
        if (!trimmed || trimmed.length === 0) return true;
        if (/^\d+$/.test(trimmed)) return true; // Pure numbers
        if (PROTECTED_PATTERNS.some(p => p.test(trimmed))) return true;
        return false;
    }

    /**
     * Translate a single text string
     */
    function translateText(text, fromLang, toLang) {
        if (!text || typeof text !== "string") return text;
        const trimmed = text.trim();
        if (!trimmed) return text;
        if (isProtected(trimmed)) return text;

        const dict = toLang === "en" ? dictionary : reverseDictionary;
        const keys = toLang === "en" ? dictKeys : reverseKeys;

        // Exact match first
        if (dict[trimmed]) {
            const leadingSpace = text.match(/^\s*/)[0];
            const trailingSpace = text.match(/\s*$/)[0];
            return leadingSpace + dict[trimmed] + trailingSpace;
        }

        // Partial match: longest keys first
        let result = text;
        for (const key of keys) {
            if (key.length < 4) continue;
            if (result.includes(key)) {
                result = result.split(key).join(dict[key]);
            }
        }

        return result;
    }

    /**
     * Translate or restore a specific element subtree
     */
    function translateElement(rootElement, targetLang) {
        if (!rootElement || rootElement.nodeType !== Node.ELEMENT_NODE) return;

        const walker = document.createTreeWalker(
            rootElement,
            NodeFilter.SHOW_TEXT,
            {
                acceptNode(node) {
                    const parent = node.parentElement;
                    if (!parent) return NodeFilter.FILTER_REJECT;

                    const tag = parent.tagName?.toUpperCase();
                    if (["SCRIPT", "STYLE", "TEXTAREA", "NOSCRIPT", "CODE", "PRE"].includes(tag)) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    if (parent.closest(`[${NO_TRANSLATE_ATTR}]`)) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    if (parent.closest("#admin-panel, .admin-layout")) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    const text = node.textContent?.trim();
                    if (!text) return NodeFilter.FILTER_REJECT;

                    return NodeFilter.FILTER_ACCEPT;
                }
            }
        );

        const textNodes = [];
        while (walker.nextNode()) {
            textNodes.push(walker.currentNode);
        }

        for (const node of textNodes) {
            if (targetLang === "en") {
                // Store original ID text if not already cached
                if (!origTextMap.has(node)) {
                    origTextMap.set(node, node.textContent);
                    node._origText = node.textContent;
                }
                const original = origTextMap.get(node) || node._origText || node.textContent;
                const translated = translateText(original, "id", "en");
                if (translated !== node.textContent) {
                    node.textContent = translated;
                }
            } else {
                // Restore original ID text
                const original = origTextMap.get(node) || node._origText;
                if (typeof original !== "undefined" && original !== null) {
                    node.textContent = original;
                }
            }
        }

        // Handle placeholders
        const inputs = rootElement.matches?.("input[placeholder], textarea[placeholder]")
            ? [rootElement]
            : Array.from(rootElement.querySelectorAll("input[placeholder], textarea[placeholder]"));

        inputs.forEach(el => {
            if (el.closest(`[${NO_TRANSLATE_ATTR}]`)) return;
            if (el.closest("#admin-panel, .admin-layout")) return;

            if (targetLang === "en") {
                if (!el.hasAttribute(ORIGINAL_PLACEHOLDER_ATTR)) {
                    el.setAttribute(ORIGINAL_PLACEHOLDER_ATTR, el.placeholder);
                }
                const orig = el.getAttribute(ORIGINAL_PLACEHOLDER_ATTR);
                el.placeholder = translateText(orig, "id", "en");
            } else {
                const orig = el.getAttribute(ORIGINAL_PLACEHOLDER_ATTR);
                if (orig !== null) {
                    el.placeholder = orig;
                }
            }
        });
    }

    /**
     * Walk the entire DOM and translate/restore text nodes
     */
    function translateDOM(targetLang) {
        if (isTranslating) return;
        isTranslating = true;

        translateElement(document.body, targetLang);

        // Update HTML lang attribute
        document.documentElement.lang = targetLang;

        isTranslating = false;
    }

    /**
     * Trigger Google Translate cookie / combo if available
     */
    function triggerGoogleTranslate(lang) {
        try {
            const cookieVal = lang === "en" ? "/id/en" : "/id/id";
            document.cookie = "googtrans=" + cookieVal + "; path=/;";
            if (window.location.hostname && window.location.hostname !== "localhost") {
                document.cookie = "googtrans=" + cookieVal + "; path=/; domain=" + window.location.hostname + ";";
            }
            const combo = document.querySelector(".goog-te-combo");
            if (combo) {
                combo.value = lang;
                combo.dispatchEvent(new Event("change"));
            }
        } catch (e) {
            // Non-blocking fallback
        }
    }

    /**
     * Set language and translate the page
     */
    function setLanguage(lang) {
        if (lang === currentLang) return;

        if (lang === "id" && currentLang === "en") {
            translateDOM("id");
            triggerGoogleTranslate("id");
        } else if (lang === "en") {
            translateDOM("en");
            triggerGoogleTranslate("en");
        }

        currentLang = lang;
        localStorage.setItem(STORAGE_KEY, lang);

        updateSwitcherUI(lang);
    }

    /**
     * Update the language switcher UI state
     */
    function updateSwitcherUI(lang) {
        // Desktop switcher
        const desktopLabel = document.getElementById("lang-switcher-label");
        const desktopIdBtn = document.getElementById("lang-btn-id");
        const desktopEnBtn = document.getElementById("lang-btn-en");

        if (desktopLabel) {
            desktopLabel.textContent = lang === "en" ? "EN" : "ID";
        }

        [desktopIdBtn, desktopEnBtn].forEach(btn => {
            if (!btn) return;
            const isActive = btn.dataset.lang === lang;
            btn.classList.toggle("bg-gold-400", isActive);
            btn.classList.toggle("text-black", isActive);
            btn.classList.toggle("font-semibold", isActive);
            btn.classList.toggle("text-slate-300", !isActive);
            btn.classList.toggle("hover:text-gold-300", !isActive);
        });

        // Mobile switcher
        const mobileIdBtn = document.getElementById("lang-btn-id-mobile");
        const mobileEnBtn = document.getElementById("lang-btn-en-mobile");

        [mobileIdBtn, mobileEnBtn].forEach(btn => {
            if (!btn) return;
            const isActive = btn.dataset.lang === lang;
            btn.classList.toggle("bg-gold-400", isActive);
            btn.classList.toggle("text-black", isActive);
            btn.classList.toggle("font-semibold", isActive);
            btn.classList.toggle("border-gold-400", isActive);
            btn.classList.toggle("text-gold-300", !isActive);
            btn.classList.toggle("border-gold-400/30", !isActive);
        });
    }

    /**
     * Initialize — call on DOMContentLoaded
     */
    function init() {
        const savedLang = localStorage.getItem(STORAGE_KEY) || "id";
        currentLang = "id"; // Always start from ID base

        // Toggle desktop switcher dropdown on click
        const toggleBtn = document.getElementById("lang-switcher-btn");
        const menu = document.getElementById("lang-switcher-menu");
        if (toggleBtn && menu) {
            toggleBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                menu.classList.toggle("!opacity-100");
                menu.classList.toggle("!visible");
            });

            document.addEventListener("click", (e) => {
                if (!toggleBtn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.remove("!opacity-100", "!visible");
                }
            });
        }

        // Bind switcher buttons
        document.querySelectorAll("[data-lang-switch]").forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                const lang = btn.dataset.lang;
                if (lang) {
                    setLanguage(lang);
                    if (menu) menu.classList.remove("!opacity-100", "!visible");
                }
            });
        });

        // Apply saved language if EN
        if (savedLang === "en") {
            triggerGoogleTranslate("en");
            requestAnimationFrame(() => {
                setLanguage("en");
            });
        } else {
            triggerGoogleTranslate("id");
            updateSwitcherUI("id");
        }
    }

    /**
     * Observe dynamic content changes and re-translate if needed
     */
    function observeDynamicContent() {
        const observer = new MutationObserver((mutations) => {
            if (currentLang !== "en" || isTranslating) return;

            let hasNewTextNodes = false;
            for (const mutation of mutations) {
                if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
                    for (const node of mutation.addedNodes) {
                        if (node.nodeType === Node.ELEMENT_NODE &&
                            !node.closest(`[${NO_TRANSLATE_ATTR}]`) &&
                            !node.closest("script, style")) {
                            hasNewTextNodes = true;
                            break;
                        }
                    }
                }
                if (hasNewTextNodes) break;
            }

            if (hasNewTextNodes) {
                clearTimeout(observer._debounceTimer);
                observer._debounceTimer = setTimeout(() => {
                    translateDOM("en");
                }, 150);
            }
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true,
        });
    }

    // ────────────────────────────────────────────────────────
    // Public API
    // ────────────────────────────────────────────────────────
    return {
        init,
        setLanguage,
        getCurrentLang: () => currentLang,
        translateText,
        translateElement,
        translateDOM,
        observeDynamicContent,
    };
})();

// Initialize on DOM ready
document.addEventListener("DOMContentLoaded", () => {
    AsyihanTranslator.init();
    AsyihanTranslator.observeDynamicContent();
});

// Expose for global access (e.g., from inline scripts)
window.AsyihanTranslator = AsyihanTranslator;

