
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Form Peminjaman</strong>
            </div>
            <div class="card-body card-block">
                <div class="bootstrap-iso">
                    <!-- <form action="<?php echo site_url('crudpinjambarang/aksi_pinjambarang'); ?>" enctype="multipart/form-data" class="form-horizontal"> -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Peminjaman</label></div>
                        <div class="col-12 col-md-9"><input type="text" placeholder="<?php echo $detail[0]->id_pb; ?>" readonly class="form-control" required></div>

                        <div class="col-12 col-md-9"><input type="hidden" id="idpb" name="idpb" value="<?php echo $detail[0]->id_pb; ?>" class="form-control"></div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" value="<?php echo $detail[0]->no_spt; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal Pinjam</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal" value="<?php echo $detail[0]->tanggal; ?>" class="tanggal form-control" required readonly></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal_kembali" class="tanggal_kembali form-control" value="<?php echo $detail[0]->tanggal_kembali; ?>" required readonly></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Pertama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" value="<?php echo $detail[0]->nama1; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Kedua</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama2" name="nama2" value="<?php echo $detail[0]->nama2; ?>" readonly class="form-control" required></div>
                    </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Telepon</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="notel" name="notel" value= "<?php echo $detail[0]->notel; ?>" readonly class="form-control" required></div>
                     </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama3" name="nama3" value="<?php echo $detail[0]->tujuan; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Surat</label></div>
                        <div class="col-12 col-md-9"><a href="<?php echo site_url('file/download/'.$detail[0]->file_name); ?>" target="_blank"><button class="btn btn-info">Download Surat</button></a></div>
                    </div>
                    <!-- </form> -->
                    <div class="animated fadeIn">
                        <div class="content mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Barang Pilihan</strong>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Merk/Type</th>
                                                        <th>No Seri</th>
                                                        <th>Kondisi Barang</th>
                                                        <th>Unit</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detail as $d) { ?>
                                                        <tr>

                                                            <td><?php echo $d->kode_barang ?></td>
                                                            <td><?php echo $d->nama_barang ?></td>
                                                            <td><?php echo $d->merk ?></td>
                                                            <td><?php echo $d->no_seri ?></td>
                                                            <td><?php echo $d->kondisi_barang ?></td>
                                                            <td><?php echo $d->unitb ?></td>
                                                            <td><?php echo $d->keterangan ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                                <input type="hidden" name="id_pb" value="<?= $detail[0]->id_pb ?>">
                                                
                                                <?php if ($detail[0]->status === 'Pending')  : ?>
                                                    <button type="submit" class="btn btn-success" onclick="" data-toggle="modal"data-target="#staticModal3" data-popup="tooltip" data-placement="top" title="Terima">Terima</button>
                                                    &emsp; &emsp;
                                                    <button type="submit" class="btn btn-danger" onclick="" data-toggle="modal"data-target="#staticModal4" data-popup="tooltip" data-placement="top" title="Tolak">Tolak</button>

                                                

                                                <?php elseif($detail[0]->status==="Diterima"): ?>
                                                    <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#staticModal2" onclick="$('#act_value').val('Dikembalikan');" title="Kembali">Dikembalikan</button>
                                                    &emsp; &emsp;
                                                    <button type="submit" class="btn btn-dark" data-toggle="modal" data-target="#staticModal5" onclick="$('#act_value').val('Terlambat');" title="Kembali">Terlambat</button>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>                                
   
<div class="modal fade" id="staticModal2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url("laporanbarang/updatelaporan/".$detail[0]->id_pb."/Dikembalikan"); ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Konfirmasi Pengembalian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Yakin Barang Sudah Dikembalikan ??
        </p>
        <input type="hidden" name="keterangan" id=keterangan value="Terimakasih Sudah Mengembalikan" />
      </div>
      <input type="hidden" name="action" id="act_value">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Ya, Sudah Kembali</button> 
      </div>
    </div>
</form>
  </div>
</div>

<div class="modal fade" id="staticModal3" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url("laporanbarang/updatelaporan/".$detail[0]->id_pb."/Diterima"); ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Konfirmasi Penerimaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Yakin Ingin Menerima Peminjaman Ini ??
        </p>
        <input type="hidden" name="keterangan" id=keterangan value="Barang Sudah Bisa Dipinjam" />
      </div>
      <input type="hidden" name="action" id="act_value">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Ya, Terima</button> 
      </div>
    </div>
</form>
  </div>
</div>

<div class="modal fade" id="staticModal4" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url("laporanbarang/updatelaporan/".$detail[0]->id_pb."/Ditolak"); ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Konfirmasi Penolakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Yakin Menolak Peminjaman Ini ??
        </p>
            <label for="exampleInputEmail1">Alasan : </label>
            <input type="text" name="keterangan" id=keterangan value="" />
          </div>
          <input type="hidden" name="action" id="act_value">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Ya, Tolak</button> 
      </div>
    </div>
  </form>
  </div>
</div>

<div class="modal fade" id="staticModal5" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url("laporanbarang/updatelaporan/".$detail[0]->id_pb."/Terlambat"); ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Pernyataan Keterlambatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Hubungi Nomor Telepon Peminjam.
        </p>
            <label for="exampleInputEmail1">Segera Kembalikan Peminjaman</label>
            <input type="hidden" name="keterangan" id=keterangan value="Segera Kembalikan Peminjaman dan Bayar Denda ke Admin" />
          </div>
          <input type="hidden" name="action" id="act_value">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-dark">Sampaikan</button> 
      </div>
    </div>
  </form>
  </div>
</div>
