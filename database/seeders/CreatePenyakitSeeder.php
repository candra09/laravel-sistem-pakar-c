<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class CreatePenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'GERD',
                'kode' => 'P1',
                'penyebab' => 'Berbagai faktor dapat menyebabkan gangguan kesehatan, antara lain kelebihan berat badan, pola makan dan minuman yang tidak sehat, kebiasaan merokok, kondisi kehamilan, hernia hiatus, serta konsumsi obat-obatan tertentu.',
                'solusi' => 'Solusi untuk GERD melibatkan beberapa pendekatan, dimulai dengan perubahan gaya hidup. Ini termasuk menurunkan berat badan jika kelebihan berat badan, menghindari makanan dan minuman yang memicu gejala, tidak berbaring segera setelah makan, serta makan dalam porsi kecil namun sering. Selain itu, obat-obatan juga dapat digunakan untuk mengatasi GERD. Antasida dapat membantu menetralisir asam lambung, sementara penghambat reseptor H2 dan penghambat pompa proton (PPI) berfungsi untuk mengurangi produksi asam lambung, dengan PPI menawarkan pengurangan yang lebih efektif. Dalam kasus yang lebih serius, tindakan medis seperti fundoplikasi Nissen, yaitu prosedur bedah untuk memperkuat katup antara perut dan esofagus, serta penggunaan perangkat LINX, yaitu cincin magnetik kecil yang ditempatkan di sekitar bagian bawah esofagus untuk mencegah refluks, dapat dipertimbangkan.',
                'pencegahan' => 'Untuk mencegah GERD, beberapa langkah yang dapat diambil meliputi menjaga berat badan ideal, menghindari makanan dan minuman pemicu seperti alkohol dan minuman berkarbonasi, serta tidak merokok. Selain itu, penting untuk menghindari makan besar sebelum tidur dan mengangkat kepala tempat tidur untuk mengurangi refluks. Memakai pakaian longgar juga dapat membantu mencegah timbulnya gejala GERD.',
            ],
            [
                'nama' => 'Dispepsia',
                'kode' => 'P2',
                'penyebab' => 'Penyebab dispepsia dapat beragam, mulai dari pola makan yang tidak sehat, stres, dan kecemasan, hingga konsumsi alkohol dan merokok. Penggunaan obat-obatan tertentu juga dapat memicu gejala dispepsia, dan infeksi oleh Helicobacter pylori adalah faktor penyebab lain yang perlu diperhatikan.',
                'solusi' => 'Solusi untuk dispepsia melibatkan beberapa pendekatan yang berbeda. Pertama, perubahan gaya hidup dapat membantu mengurangi gejala. Ini termasuk menghindari makanan dan minuman yang memicu gejala, makan dalam porsi kecil namun sering, dan tidak berbaring segera setelah makan. Selain itu, obat-obatan dapat digunakan untuk mengatasi dispepsia. Terapi psikologis seperti terapi relaksasi atau konseling juga penting untuk mengatasi stres dan kecemasan yang mungkin terkait dengan dispepsia. Terakhir, tindakan medis seperti endoskopi dapat dilakukan untuk memeriksa kondisi lambung dan mengidentifikasi penyebab dispepsia jika gejala berlanjut atau parah.',
                'pencegahan' => 'Untuk mencegah dispepsia, ada beberapa langkah yang bisa diambil. Pertama, penting untuk menghindari makanan yang dapat memicu gejala dispepsia. Makan dengan porsi kecil namun sering juga dapat membantu, karena hal ini mengurangi beban pada lambung. Selain itu, menghindari makan terlalu cepat dapat mengurangi risiko terjadinya dispepsia. Konsumsi alkohol dan merokok harus dihindari karena keduanya dapat memperburuk kondisi. Mengelola stres dengan baik juga merupakan langkah penting, karena stres dapat mempengaruhi sistem pencernaan. Penggunaan berlebihan obat-obatan tertentu harus dihindari, karena dapat menyebabkan iritasi pada lambung. Menjaga berat badan ideal juga penting untuk mencegah dispepsia, dan mengangkat kepala tempat tidur saat tidur dapat membantu mengurangi gejala refluks asam.',
            ],
            [
                'nama' => 'Tukak lambung',
                'kode' => 'P3',
                'penyebab' => 'Tukak lambung dapat disebabkan oleh beberapa faktor, termasuk infeksi bakteri seperti Helicobacter pylori, penggunaan obat anti-inflamasi nonsteroid (NSAID), dan kelebihan asam lambung. Kebiasaan merokok, konsumsi alkohol berlebihan, serta stres dan pola makan yang buruk juga dapat meningkatkan risiko terjadinya tukak lambung.',
                'solusi' => 'Solusi untuk tukak lambung meliputi pengobatan medis dengan antibiotik, penghambat pompa proton (PPI), penghambat reseptor H2, antasida, dan obat pelindung mukosa seperti sucralfate. Perubahan gaya hidup seperti menghindari makanan yang mengiritasi lambung, alkohol, dan merokok, serta makan dalam porsi kecil sering kali diperlukan. Manajemen stres melalui meditasi, yoga, atau konseling juga dapat membantu mengurangi gejala.',
                'pencegahan' => '
                Untuk mencegah tukak lambung, hindari penggunaan berlebihan NSAID, konsumsi alkohol, dan merokok. Kelola stres, jaga pola makan sehat, atasi infeksi H. pylori, dan rutin pantau kesehatan.',
            ],
            [
                'nama' => 'Gastritis',
                'kode' => 'P4',
                'penyebab' => 'Gastritis dapat disebabkan oleh infeksi bakteri Helicobacter pylori, penggunaan jangka panjang obat antiinflamasi nonsteroid (NSAID), alkohol berlebihan, stres, kondisi autoimun, dan refluks empedu.',
                'solusi' => 'Solusi untuk gastritis meliputi perubahan gaya hidup seperti menghindari makanan pedas, berlemak, serta alkohol dan merokok, serta makan dalam porsi kecil dan sering. Obat-obatan seperti antasida, penghambat asam, dan antibiotik untuk infeksi H. pylori dapat membantu, bersama dengan obat anti-mual. Mengelola stres melalui teknik relaksasi juga penting, dan jika gejala berlanjut, endoskopi mungkin diperlukan untuk pemeriksaan lebih lanjut.',
                'pencegahan' => 'Untuk mencegah gastritis, hindari penggunaan berlebihan NSAID, kurangi alkohol dan merokok, serta kelola stres dengan teknik relaksasi. Jaga pola makan dengan menghindari makanan pedas dan berlemak, serta hindari pemicu gejala. Jika terinfeksi H. pylori, dapatkan perawatan yang tepat dan konsumsi probiotik untuk mendukung kesehatan pencernaan.',
            ],


        ];

        Penyakit::insert($data);
    }
}
