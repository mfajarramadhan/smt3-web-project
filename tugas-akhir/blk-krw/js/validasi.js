// Validasi data NIK
function validasi() {
    var nik = document.getElementById('nik').value;
    if (nik == "") {
        alert('NIK harus di isi!');
        document.getElementById('nik').focus();
        return false;
    } else if (nik.length != 16) {
        alert('NIK harus 16 digit');
        document.getElementById('nik').focus();
        return false;
    }
}