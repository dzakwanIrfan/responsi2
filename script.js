function konfirmasiHapus(event) {
    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus karakter ini?");
    if (!konfirmasi) {
        event.preventDefault(); 
        return false;
    } else {
        alert("Data berhasil dihapus!");
        return true;
    }
}

// Untuk form karakter
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('karakter');
    var namaInput = document.getElementById('nama');
    var deskripsiInput = document.getElementById('deskripsi');
    var jediInput = document.getElementById('jedi');
    var sithInput = document.getElementById('sith');
    var uploadInput = document.getElementById('uploadInput');
    form.addEventListener('submit', function (event) {
        // Validasi nama karakter
        if (namaInput.value.trim() == '' || deskripsiInput.value.trim() == '' || !jediInput.checked && !sithInput.checked){
            alert('Mohon isi semua form karakter!');
            event.preventDefault();
            return false;
        }

        if (deskripsiInput.value.trim() == '<p></p>'){
            alert('Mohon isi deskripsi dengan benar');
            event.preventDefault();
            return false;
        }
    });
});

//Untuk login
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('login');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    form.addEventListener('submit', function (event) {
        if (username.value.trim() == '' || password.value.trim() == ''){
            alert('Mohon isi semua form login!');
            event.preventDefault();
            return false;
        }
    });
});

//Untuk register
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('register');
    var nama = document.getElementById('nama');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var konfirmasi = document.getElementById('konfirmasi');
    form.addEventListener('submit', function (event) {
        if (username.value.trim() == '' || password.value.trim() == '' || nama.value.trim() == '' || konfirmasi.value.trim() == ''){
            alert('Mohon isi semua form!');
            event.preventDefault();
            return false;
        }
    });
});

//Untuk profil
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('profil');
    var nama = document.getElementById('nama');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var bio = document.getElementById('bio');
    form.addEventListener('submit', function (event) {
        if (username.value.trim() == '' || password.value.trim() == '' || nama.value.trim() == '' || bio.value.trim() == ''){
            alert('Mohon isi semua form!');
            event.preventDefault();
            return false;
        }
    });
});