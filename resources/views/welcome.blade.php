<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Barbershop - Your Style, Our Passion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            border: 2px solid #667eea;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-cut text-3xl text-purple-600"></i>
                    <span class="text-2xl font-bold text-gray-800">Sky Barbershop</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-purple-600 transition">Home</a>
                    <a href="#services" class="text-gray-700 hover:text-purple-600 transition">Layanan</a>
                    <a href="#about" class="text-gray-700 hover:text-purple-600 transition">Tentang</a>
                    <a href="#contact" class="text-gray-700 hover:text-purple-600 transition">Kontak</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/admin/login" class="btn-secondary px-6 py-2 rounded-full font-semibold text-purple-600">Login</a>
                    <a href="/admin/register" class="btn-primary px-6 py-2 rounded-full font-semibold text-white">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient pt-32 pb-20 text-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0 fade-in">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Gaya Anda, <br>Passion Kami
                    </h1>
                    <p class="text-xl mb-8 text-purple-100">
                        Temukan pengalaman barbershop terbaik dengan layanan profesional dan gaya modern yang sesuai dengan kepribadian Anda.
                    </p>
                    <div class="flex space-x-4">
                        <a href="/admin/register" class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition text-lg">
                            Booking Sekarang
                        </a>
                        <a href="#services" class="border-2 border-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition text-lg">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <div class="animate-float">
                        <i class="fas fa-cut text-9xl text-white opacity-20"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card-hover bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="bg-purple-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Booking Mudah</h3>
                    <p class="text-gray-600">Sistem booking online yang praktis dan cepat. Pilih jadwal sesuai keinginan Anda.</p>
                </div>
                <div class="card-hover bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="bg-purple-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Barber Profesional</h3>
                    <p class="text-gray-600">Tim barber berpengalaman dan terlatih untuk memberikan hasil terbaik.</p>
                </div>
                <div class="card-hover bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="bg-purple-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Kualitas Premium</h3>
                    <p class="text-gray-600">Menggunakan produk berkualitas tinggi untuk hasil yang maksimal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
                <p class="text-xl text-gray-600">Berbagai pilihan layanan untuk penampilan sempurna Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <i class="fas fa-cut text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">Haircut</h3>
                        <p class="text-gray-600 mb-4">Potongan rambut profesional sesuai dengan gaya dan bentuk wajah Anda.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">Rp 50K</span>
                            <a href="/admin/register" class="text-purple-600 font-semibold hover:text-purple-700">Book Now →</a>
                        </div>
                    </div>
                </div>
                <!-- Service Card 2 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="fas fa-spray-can text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">Hair Coloring</h3>
                        <p class="text-gray-600 mb-4">Pewarnaan rambut dengan produk berkualitas untuk tampil lebih stylish.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">Rp 150K</span>
                            <a href="/admin/register" class="text-purple-600 font-semibold hover:text-purple-700">Book Now →</a>
                        </div>
                    </div>
                </div>
                <!-- Service Card 3 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <i class="fas fa-shaving text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">Shaving</h3>
                        <p class="text-gray-600 mb-4">Layanan cukur kumis dan jenggot untuk penampilan lebih rapi.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">Rp 30K</span>
                            <a href="/admin/register" class="text-purple-600 font-semibold hover:text-purple-700">Book Now →</a>
                        </div>
                    </div>
                </div>
                <!-- Service Card 4 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                        <i class="fas fa-spa text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">Hair Spa</h3>
                        <p class="text-gray-600 mb-4">Perawatan rambut untuk kesehatan dan kelembutan rambut Anda.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">Rp 100K</span>
                            <a href="/admin/register" class="text-purple-600 font-semibold hover:text-purple-700">Book Now →</a>
                        </div>
                    </div>
                </div>
                <!-- Service Card 5 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                        <i class="fas fa-face-smile text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">Facial Treatment</h3>
                        <p class="text-gray-600 mb-4">Perawatan wajah untuk kulit yang lebih bersih dan sehat.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">Rp 80K</span>
                            <a href="/admin/register" class="text-purple-600 font-semibold hover:text-purple-700">Book Now →</a>
                        </div>
                    </div>
                </div>
                <!-- Service Card 6 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <i class="fas fa-gift text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">Paket Lengkap</h3>
                        <p class="text-gray-600 mb-4">Kombinasi semua layanan untuk pengalaman grooming terbaik.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">Rp 300K</span>
                            <a href="/admin/register" class="text-purple-600 font-semibold hover:text-purple-700">Book Now →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <div class="bg-gradient-to-br from-purple-100 to-purple-200 rounded-3xl p-12 text-center">
                      <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Logo SkyBarbershop">
                      <i class="fas fa-scissors text-9xl text-purple-600 mb-6"></i>
                        <h3 class="text-3xl font-bold text-gray-800">10+ Tahun</h3>
                        <p class="text-xl text-gray-600">Pengalaman Melayani</p>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Tentang Sky Barbershop</h2>
                    <p class="text-lg text-gray-600 mb-4">
                        Sky Barbershop adalah destinasi grooming premium yang menghadirkan pengalaman barbershop modern dengan sentuhan profesional. Kami berkomitmen untuk memberikan layanan terbaik dengan barber-barber terlatih dan berpengalaman.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Dengan menggunakan produk berkualitas tinggi dan teknik terkini, kami memastikan setiap pelanggan mendapatkan hasil yang memuaskan dan pengalaman yang tak terlupakan.
                    </p>
                    <div class="flex space-x-8">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-2">5000+</div>
                            <div class="text-gray-600">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-2">15+</div>
                            <div class="text-gray-600">Expert Barbers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-purple-600 mb-2">4.9</div>
                            <div class="text-gray-600">Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Testimoni Pelanggan</h2>
                <p class="text-xl text-gray-600">Apa kata mereka tentang Sky Barbershop</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card-hover bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">A</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Ahmad Fauzi</h4>
                            <div class="text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Pelayanan sangat memuaskan! Barbernya profesional dan ramah. Tempat nya juga bersih dan nyaman. Highly recommended!"</p>
                </div>
                <div class="card-hover bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">B</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Budi Santoso</h4>
                            <div class="text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Sistem booking online nya sangat memudahkan. Tidak perlu antri lama. Hasil potong rambut juga selalu rapi dan sesuai keinginan."</p>
                </div>
                <div class="card-hover bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">D</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Dani Kurniawan</h4>
                            <div class="text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Best barbershop in town! Harga terjangkau dengan kualitas premium. Pasti balik lagi kesini!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-600">Kami siap melayani Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Lokasi</h3>
                    <p class="text-gray-600">Jl. Contoh No. 123<br>Jakarta Selatan, Indonesia</p>
                </div>
                <div class="text-center p-8">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Telepon</h3>
                    <p class="text-gray-600">+62 812-3456-7890<br>+62 821-9876-5432</p>
                </div>
                <div class="text-center p-8">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Jam Operasional</h3>
                    <p class="text-gray-600">Senin - Sabtu: 09.00 - 21.00<br>Minggu: 10.00 - 18.00</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="hero-gradient py-20 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Untuk Tampil Lebih Percaya Diri?</h2>
            <p class="text-xl mb-8 text-purple-100">Daftar sekarang dan dapatkan pengalaman barbershop terbaik</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/admin/register" class="bg-white text-purple-600 px-10 py-4 rounded-full font-semibold hover:bg-gray-100 transition text-lg">
                    <i class="fas fa-user-plus mr-2"></i>Register Sekarang
                </a>
                <a href="/admin/login" class="border-2 border-white px-10 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition text-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-cut text-2xl text-purple-400"></i>
                        <span class="text-xl font-bold">Sky Barbershop</span>
                    </div>
                    <p class="text-gray-400">Your Style, Our Passion. Barbershop premium untuk penampilan terbaik Anda.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-purple-400 transition">Home</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-purple-400 transition">Layanan</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-purple-400 transition">Tentang</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-purple-400 transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400">Haircut</li>
                        <li class="text-gray-400">Hair Coloring</li>
                        <li class="text-gray-400">Shaving</li>
                        <li class="text-gray-400">Hair Spa</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Sky Barbershop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-xl');
            } else {
                nav.classList.remove('shadow-xl');
            }
        });
    </script>
</body>
</html>
