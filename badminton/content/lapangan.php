<section class="lapangan" id="lapangan">
    <div class="container">
      <main class="contain" data-aos="fade-right" data-aos-duration="1000">
        <h2 class="text-head">Lapangan di <span>Sport</span> Center </h2>
        <div class="row row-cols-1 row-cols-md-4">
          <?php foreach ($lapangan as $row) : ?>
            <div class="col">
              <div class="card">
                <img src="../img/<?= $row["foto"]; ?>" alt="gambar lapangan" class="card-img-top">
                <div class="card-body text-center">
                  <h5 class="card-title"><?= $row["nm"]; ?></h5>
                  <p class="card-text"><?= $row["ket"]; ?></p>
                  <p class="card-price"><?= $row["harga"]; ?></p>
                  <a href="jadwal.php?id=<?= $row["idlap"]; ?>" type="button" class="btn btn-secondary">Jadwal</a>
                  <button type="button" class="btn btn-inti" data-bs-toggle="modal" data-bs-target="#pesanModal<?= $row["idlap"]; ?>">Pesan</button>
                </div>
              </div>
            </div>

            <!-- Modal Pesan -->
            <div class="modal fade" id="pesanModal<?= $row["idlap"]; ?>" tabindex="-1" aria-labelledby="pesanModalLabel<?= $row["idlap"]; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="pesanModalLabel<?= $row["idlap"]; ?>">Pesan Lapangan <?= $row["nm"]; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post">
                    <div class="modal-body">
                      <!-- konten form modal -->
                      <div class="row justify-content-center align-items-center">
                        <div class="mb-3">
                          <img src="../img/<?= $row["foto"]; ?>" alt="gambar lapangan" class="img-fluid">
                        </div>
                        <div class="text-center">
                          <h6 name="harga">Harga : <?= $row["harga"]; ?></h6>
                        </div>
                        <div class="col">
                          <input type="hidden" name="id_lpg" class="form-control" id="exampleInputPassword1" value="<?= $row["idlap"]; ?>">
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Main</label>
                            <input type="datetime-local" name="tgl_main" class="form-control" id="exampleInputPassword1">
                          </div>
                        </div>
                        <div class="col">
                          <input type="hidden" name="harga" class="form-control" id="exampleInputPassword1" value="<?= $row["harga"]; ?>">
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lama Main</label>
                            <input type="time" name="jam_mulai" class="form-control" id="exampleInputPassword1">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-inti" name="pesan" id="pesan">Pesan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Modal Pesan -->
          <?php endforeach; ?>
        </div>
      </main>
    </div>
  </section>