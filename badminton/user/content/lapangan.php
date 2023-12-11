<section class="lapangan" id="lapangan">
    <div class="container">
    <h2 class="text-head">Lapangan di <span>Sport</span> Center </h2>
    <div class="row" id="load_data">
      <?php
        
        $query = "SELECT * FROM lapangan ORDER BY id_lap ASC";
        $dewan1 = $koneksi->prepare($query);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        while ($row = $res1->fetch_assoc()) {
          $id = $row["id_lap"];
          $foto = $row["foto"];
          // $tgl_input = $row["tgl_input"];
          $judul = $row["no_lap"];
          if (strlen($judul) > 60) {
            $judul = substr($judul, 0, 60) . "...";
          }
          $deskripsi = $row["deskripsi"];
          if (strlen($deskripsi) > 100) {
            $deskripsi = substr($deskripsi, 0, 100) . "...";
          }
      ?>
        <div class="col-sm-3 mb-3">
          <div class="card">
            <img src="../admin/img/<?php echo $foto; ?>" class="card-img-top" alt="gambar">
            <div class="card-body">
              <h5 class="card-title"><?php echo $judul; ?></h5>
              <p class="card-text"><?php echo $deskripsi; ?></p>
            </div>
            <div class="card-footer">
            <a href="?pg=jadwal&&id_lap=<?= $row["id_lap"]; ?>" class="btn btn-inti">Jadwal Boking</a> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Harga
            </button>
              </div>
          </div>
        </div>
        <?php } ?>
        <!-- Modal +++ -->           
    </div>
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">List Harga</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Jam</th>
              <th scope="col">Waktu</th>
              <th scope="col">Harga</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $query =mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga");
            $no=1;
            while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
              <th scope="row"><?php echo $no; ?></th>
              <td><?php echo $data['jam']?></td>
              <td><?php echo $data['waktu']?></td>
              <td><?php echo $data['harga']?></td>
            </tr>
            <?php
                                                $no++;
                                            }	
                                                ?>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>
    
  </section>