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
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "tambah-sukses") {
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "Data Berhasil Ditambahkan",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "ubah-sukses") {
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "Data Berhasil Diubah",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "login-sukses") {
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "Selamat Anda Berhasil Login",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "register-sukses") {
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "Selamat Anda Berhasil Membuat Akun",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "logout-sukses") {
    Swal.fire({
      icon: "success",
      title: "Anda Berhasil Logout",
      text: "Selamat Berjumpa Kembali 👋🏻",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "scan-sukses") {
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "Selamat Anda Berhasil Perbarui Stok",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "login-gagal") {
    Swal.fire({
      icon: "error",
      title: "Gagal",
      text: "Periksa username atau password",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "tambah-gagal") {
    Swal.fire({
      icon: "error",
      title: "Gagal",
      text: "Terjadi kesalahan pada saat menambah data!",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "ubah-gagal") {
    Swal.fire({
      icon: "error",
      title: "Gagal",
      text: "Terjadi kesalahan pada saat mengubah data!",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "tidak-ada") {
    Swal.fire({
      icon: "error",
      title: "Gagal",
      text: "Tidak ada data ditemukan",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
  } else if (status === "harus-login") {
    Swal.fire({
      icon: "error",
      title: "Terjadi Kesalahan",
      text: "Anda Harus login dulu!!",
      timer: 1500,
      showConfirmButton: false,
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.pathname);
    }
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
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("#formTambah").forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      Swal.fire({
        title: "Apakah kamu yakin ingin tambah data ini?",
        text: "Cek kembali apakah data sudah sesuai",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#389644",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Tambah",
      }).then((result) => {
        if (result.isConfirmed) {
         this.submit();
        }
      });
    });
  });
});

// Konfirmasi Ubah Data
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("#formUbah").forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      Swal.fire({
        title: "Apakah kamu yakin ingin ubah data ini?",
        text: "Cek kembali apakah data sudah sesuai",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#389644",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Ubah",
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        }
      });
    });
  });
});

// Konfirmasi Logout
document.querySelectorAll(".link-logout").forEach((button) => {
  button.addEventListener("click", function (e) {
    e.preventDefault();

    const href = this.getAttribute("href");

    Swal.fire({
      title: "Apakah kamu yakin ingin Logout?",
      text: "Kamu perlu untuk login kembali!!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#389644",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, logout!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = href;
      }
    });
  });
});
