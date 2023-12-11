<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">PERIODE LAPORAN BARANG</h1>
                                    </div>
                                    <form action="laporan/laporanbarang.php" method="POST" target="_blank">
                                        <div class="form-group">
                                            <label for="">Dari Tanggal :</label>
                                        <input type="date" class="form-control" name="tanggal_awal" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                        <div class="form-group">
                                            <label for="">Sampai Tanggal :</label>
                                        <input type="date" class="form-control" name="tanggal_akhir" require="Harap Diisi">
                                        </div>
                                                                                
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="pencarian">Cetak Laporan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
  