<script src="../assets/js/boostrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.6.2"></script>
<script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.5"></script> 

<!-- Script Tooltip -->
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<!-- Script Toast -->
<?php if(!isset($_SESSION['toast'])) { ?>

  <?php } else if($_SESSION['toast'] == 'berhasil-tambah') { ?>
<script>
  const toastBerhasilTambah = document.getElementById('toastBerhasilTambah')
  const toastBootstrapBerhasilTambah = bootstrap.Toast.getOrCreateInstance(toastBerhasilTambah)
  toastBootstrapBerhasilTambah.show()
</script>
<?php session_destroy(); } else if($_SESSION['toast'] == 'gagal-tambah') { ?>
<script>
  const toastGagalTambah = document.getElementById('toastGagalTambah')
  const toastBootstrapGagalTambah = bootstrap.Toast.getOrCreateInstance(toastGagalTambah)
  toastBootstrapGagalTambah.show()
</script>
<?php session_destroy(); } else if($_SESSION['toast'] == 'berhasil-edit') { ?>
<script>
  const toastBerhasilEdit = document.getElementById('toastBerhasilEdit')
  const toastBootstrapBerhasilEdit = bootstrap.Toast.getOrCreateInstance(toastBerhasilEdit)
  toastBootstrapBerhasilEdit.show()
</script>
<?php session_destroy(); } else if($_SESSION['toast'] == 'gagal-edit') { ?>
<script>
  const toastGagalEdit = document.getElementById('toastGagalEdit')
  const toastBootstrapGagalEdit = bootstrap.Toast.getOrCreateInstance(toastGagalEdit)
  toastBootstrapGagalEdit.show()
</script>
<?php session_destroy(); } else if($_SESSION['toast'] == 'berhasil-hapus') { ?>
  const toastBerhasilHapus = document.getElementById('toastBerhasilHapus')
  const toastBootstrapBerhasilHapus = bootstrap.Toast.getOrCreateInstance(toastBerhasilHapus)
  toastBootstrapBerhasilHapus.show()
</script>
<?php session_destroy(); } else if($_SESSION['toast'] == 'gagal-hapus') { ?>
<script>
  const toastGagalHapus = document.getElementById('toastGagalHapus')
  const toastBootstrapGagalHapus = bootstrap.Toast.getOrCreateInstance(toastGagalHapus)
  toastBootstrapGagalHapus.show()
</script>
<?php session_destroy(); }?>

</body>
</html>