@extends('layouts.app')


@push('head')
    <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
@endpush

@section('title', 'Contact Us')

@section('content')

    <div class="banner-faq">
        <div class="banner">
            <img src="image/banner.png" alt="" class="full-img">
            <div class="text1">
                <h1>Help Center</h1>
            </div>
        </div>
        <div class="faq">
            <div class="faq-box">
                <h2>Frequently Asked</h2>

                <div class="question">
                    <h3><b>Bagaimana cara mengajukan <br>pengembalian?</b></h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="plus"
                        viewBox="0 0 16 16" onclick="drop(0)">
                        <path fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                    </svg>
                </div>

                <div class="answer">
                    <p class="paragraph">
                        Untuk mengembalikan barang belanjaan Anda, pergilah ke bagian "Order Detail" dan Anda dapat
                        mengajukan permohonan pengembalian. Harap berikan alasan yang valid dengan informasi terperinci
                        untuk pengembalian tersebut. Pastikan untuk melampirkan bukti pendukung, seperti foto barang yang
                        rusak atau tangkapan layar produk yang salah diterima. Setelah melampirkan semua informasi dan bukti
                        yang diperlukan, klik tombol "Kirim Pengembalian". Tim layanan pelanggan kami akan meninjau
                        permintaan Anda dan memberikan instruksi lebih lanjut. Jika disetujui, pengembalian dana Anda akan
                        diproses sesuai dengan kebijakan pengembalian kami.
                    </p>
                </div>
                <hr>

                <div class="question">
                    <h3><b>Bagaimana cara mengganti <br>foto profil?</b></h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="plus"
                        viewBox="0 0 16 16" onclick="drop(1)">
                        <path fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                    </svg>
                </div>

                <div class="answer">
                    <p class="paragraph">
                        Untuk mengubah foto profil Anda, pertama-tama pergilah ke halaman "Your Profile". Di halaman ini,
                        Anda akan melihat foto profil Anda saat ini. Klik pada foto profil tersebut untuk membuka opsi
                        penggantian gambar. Setelah itu, Anda dapat mengunggah gambar yang diinginkan dari perangkat Anda.
                        Pastikan gambar yang diunggah sesuai dengan ketentuan yang ditetapkan oleh platform untuk
                        mendapatkan hasil yang optimal. Selain mengganti foto profil, di halaman "Your Profile" ini Anda
                        juga bisa mengubah data diri Anda. Pastikan untuk menyimpan setiap perubahan yang dilakukan agar
                        informasi terbaru Anda tersimpan dengan baik.
                    </p>
                </div>
                <hr>

                <div class="question">
                    <h3><b>Bagaimana cara melihat <br>status pesanan?</b></h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="plus"
                        viewBox="0 0 16 16" onclick="drop(2)">
                        <path fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                    </svg>
                </div>

                <div class="answer">
                    <p class="paragraph">
                        Untuk melihat status pesanan Anda, pergilah ke bagian "Order Detail" di situs web atau aplikasi
                        tempat Anda melakukan pembelian. Di sana, Anda akan menemukan daftar semua pesanan terbaru Anda.
                        Temukan pesanan yang ingin Anda cek dan klik untuk melihat detailnya. Status pesanan akan
                        ditampilkan, menunjukkan apakah pesanan Anda sedang diproses, dikirim, atau sudah diterima. Jika
                        Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang status pesanan, Anda juga
                        dapat menghubungi layanan pelanggan.
                    </p>
                </div>
                <hr>

                <div class="question">
                    <h3><b>Bagaimana cara mengubah <br>alamat utama?</b></h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="plus"
                        viewBox="0 0 16 16" onclick="drop(3)">
                        <path fill-rule="evenodd"
                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                    </svg>
                </div>

                <div class="answer">
                    <p class="paragraph">
                        Untuk mengubah alamat utama Anda, pergilah ke halaman "Your Profile". Di halaman ini, Anda akan
                        menemukan berbagai informasi pribadi Anda. Cari bagian yang menampilkan alamat Anda saat ini. Klik
                        opsi untuk mengedit alamat dan masukkan alamat baru yang ingin Anda gunakan sebagai alamat utama.
                        Pastikan semua informasi yang Anda masukkan sudah benar sebelum menyimpan perubahan. Setelah Anda
                        menyimpan, alamat utama Anda akan diperbarui secara otomatis. Jika ada masalah atau pertanyaan, Anda
                        bisa menghubungi layanan pelanggan untuk bantuan lebih lanjut.
                    </p>
                </div>
                <hr>

                <button id = "show-more" onclick="showMore()"> Show More </button>
            </div>
            <div class="subtitle1">
                <h1>
                    Find for questions you may need
                </h1>
            </div>
        </div>
    </div>
    <div class="send-email">
        <div class="subtitle2">
            <h1>
                Let us know your criticism, suggestion, or complaints
            </h1>
        </div>
        <div class="message">
            <form class="feedback-form" action="https://formsubmit.co/jackyzhng2004@gmail.com" method="POST">
                <div class="field1">
                    <input type="email" style="padding: 15px;" name = "email" class="email" placeholder="Your Email"
                        required>
                </div>
                <div class="separator"></div>
                <div class="field2">
                    <input type="message" style="padding: 15px;" name="message" class="send-message" placeholder="Message"
                        required>
                </div>
                <div class="separator"></div>
                <input type="hidden" name="_captcha" value="false">
                {{-- <input type="hidden" name="_cc" value="jackyzhng2004@gmail.com"> --}}
                <input type="hidden" name="_next" value="http://127.0.0.1:8000/contactUs_r">
                <input type="hidden" name="_template" value="table">
                <div class="button">
                    <button id = "message-btn" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>




@endsection

@section('script')
    <script src="{{ asset('js/contactUs.js') }}"></script>
@endsection
