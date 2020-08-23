<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Form Peminjaman</strong>
        </div>
        <div class="card-body card-block">
            <div class="bootstrap-iso">
                <form action="<?php echo site_url('crudpinjamruangan/aksi_pinjamruangan'); ?>" enctype="multipart/form-data" class="form-horizontal">
                    

                    <?php foreach ($detail as $d) { ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Peminjaman</label></div>
                            <div class="col-12 col-md-9"><input type="text" placeholder="<?php echo $d->id_pr; ?>" readonly class="form-control" required></div>

                            <div class="col-12 col-md-9"><input type="hidden" id="id_pr" name="id_pr" value="<?php echo $d->id_pr; ?>" class="form-control"></div>

                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" value="<?php echo $d->no_spt; ?>" readonly class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal" value="<?php echo $d->tanggal; ?>" class="tanggal form-control    " required readonly></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal_kembali" placeholder="yyyy-mm-dd" class="tanggal_kembali form-control" value="<?= $d->tanggal_kembali; ?>" required readonly></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama 1</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" value="<?php echo $d->nama1; ?>" readonly class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama 2</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama2" name="nama2" value="<?php echo $d->nama2; ?>" readonly class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Telepon</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="notel" name="notel" value= "<?php echo $d->notel; ?>" readonly class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tujuan" name="tujuan" value="<?php echo $d->tujuan; ?>" readonly class="form-control" required></div>
                        </div>

                        <div class="animated fadeIn">
                            <div class="content mt-3">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Ruangan Pilihan</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Ruangan</th>
                                                            <th>Nama Ruangan</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                            <td><?php echo $d->kode_ruangan ?></td>
                                                            <td><?php echo $d->nama_ruangan ?></td>
                                                            <td><?php echo $d->keterangan ?></td>
                                                        </tr>



                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                
<!--
                <div class="card-footer">
                                    <input type="hidden" name="id_pr" value="<?= $detail[0]->id_pr ?>">
                                    
                                     <?php if($detail[0]->status==="Diterima"): ?>
                                     <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#staticModal2" onclick="$('#act_value').val('Dikembalikan');" title="Kembali">Dikembalikan</button>
                                     <?php endif; ?>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade" id="staticModal2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url('crudpinjamruangan/update/'); ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Konfirmasi Pengembalian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Yakin Ingin Mengembalikan Peminjaman Ini?
        </p>
      </div>
      <input type="hidden" name="action" id="act_value">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="btn btn-primary" href="<?php echo site_url("laporanruangan/kelaporan_user/".$detail[0]->id_pr."/Dikembalikan"); ?>">Ya, Kembalikan</a>
      </div>
    </div>
</form>
  </div>
</div> -->