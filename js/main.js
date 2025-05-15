document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get("status");


  if (status === "hapus-sukses") {
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "Data berhasil dihapus",
      timer: 1500,
      showConfirmButton: false,
    });
  } else if (status === "gagal") {
    Swal.fire({
      icon: "error",
      title: "Gagal",
      text: "Terjadi kesalahan",
      timer: 1500,
      showConfirmButton: false,
    });
  }
});


// Konfirmasi Hapus Data
document.querySelectorAll(".btn-hapus").forEach((button) => {
  button.addEventListener("click", function (e) {
    e.preventDefault();

    const href = this.getAttribute("href");
    Swal.fire({
      title: "Apakah kamu yakin ingin menghapus data ini?",
      text: "Data yang sudah dihapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#389644",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = href;
      }
    });
  });
});

// Konfirmasi Tambah Data
// document.querySelectorAll(".btn-tambah").forEach((button) => {
//   button.addEventListener("click", function (e) {
//     e.preventDefault();

//     const href = this.getAttribute("href");
//     Swal.fire({
//       title: "Apakah kamu yakin ingin tambah data ini?",
//       text: "Cek kembali apakah data sudah sesuai",
//       icon: "warning",
//       showCancelButton: true,
//       confirmButtonColor: "#389644",
//       cancelButtonColor: "#d33",
//       confirmButtonText: "Ya, Tambah",
//     }).then((result) => {
//       if (result.isConfirmed) {
//         window.location.href = href;
//       }
//     });
//   });
// });
