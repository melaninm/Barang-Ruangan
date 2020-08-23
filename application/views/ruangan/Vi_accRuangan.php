<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Form Peminjaman</strong>
        </div>
        <div class="card-body card-block">
            <div class="bootstrap-iso">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Peminjaman</label></div>
                    <div class="col-12 col-md-9"><input type="text" placeholder="<?php echo $detail[0]->id_pr; ?>" readonly class="form-control" required></div>

                    <div class="col-12 col-md-9"><input type="hidden" id="id_pr" name="id_pr" value="<?php echo $detail[0]->id_pr; ?>" class="form-control"></div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" value="<?php echo $detail[0]->no_spt; ?>" readonly class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal" value="<?php echo $detail[0]->tanggal; ?>" class="tanggal form-control    " required readonly></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal_kembali" placeholder="yyyy-mm-dd" class="tanggal_kembali form-control" value="<?= $detail[0]->tanggal_kembali; ?>" required readonly></div>
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
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nama3" name="nama3" value="<?php echo $detail[0]->tujuan; ?>" readonly class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Surat</label></div>
                    <div class="col-12 col-md-9"><a href="<?php echo site_url('file/download/'.$detail[0]->file_name); ?>" target="_blank"><button class="btn btn-info">Download Surat</button></a></div>
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
                                                <?php foreach ($detail as $d) { ?>
                                                    <tr>
                                                        <td><?php echo $d->kode_ruangan ?></td>
                                                        <td><?php echo $d->nama_ruangan ?></td>
                                                        <td><?php echo $d->keterangan ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        
                                            <input type="hidden" name="id_pr" value="<?= $detail[0]->id_pr ?>">
                                            
                                            <?php if ($detail[0]->status === 'Pending')  : ?>
                                                <button type="submit" class="btn btn-success" onclick="" data-toggle="modal"data-target="#staticModal3" data-popup="tooltip" data-placement="top" title="Terima">Terima</button>
                                                &emsp; &emsp;
                                                <button type="submit" class="btn btn-danger" onclick="" data-toggle="modal"data-target="#staticModal4" data-popup="tooltip" data-placement="top" title="Tolak">Tolak</button>

                                            <?php elseif($detail[0]->status==="Diterima"): ?>

                                               <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#staticModal2" onclick="$('#act_value').val('Dikembalikan');" title="Kembali">Dikembalikan</button>
                                               &emsp; &emsp;
                                                <button type="submit" class="btn btn-dark" data-toggle="modal" data-target="#staticModal5" onclick="$('#act_value').val('Terlambat');" title="Kembali">Terlambat</button>

                                            <?php elseif($detail[0]->status==="Terlambat"): ?>

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
          Yakin Ruangan Sudah Dikembalikan ??
        </p>
      </div>
      <input type="hidden" name="action" id="act_value">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="btn btn-primary" href="<?php echo site_url("laporanruangan/updatelaporan/".$detail[0]->id_pr."/Dikembalikan"); ?>">Ya, Dikembalikan</a>
      </div>
    </div>
</form>
  </div>
</div>

<div class="modal fade" id="staticModal3" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url('crudpinjamruangan/update/'); ?>" method="POST">
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
      </div>
      <input type="hidden" name="action" id="act_value">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="btn btn-primary" href="<?php echo site_url("laporanruangan/updatelaporan/".$detail[0]->id_pr."/Diterima"); ?>">Ya, Terima</a>
      </div>
    </div>
</form>
  </div>
</div>

<div class="modal fade" id="staticModal4" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" style="position:absolute;left:0%; top:60%;">
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?= base_url("laporanruangan/updatelaporan/".$detail[0]->id_pr."/Ditolak"); ?>" method="POST">
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
            <input type="text" name="alasan" id=alasan value="" />
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
    <form action="<?= base_url('crudpinjamruangan/update/'); ?>" method="POST">
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
        <a type="button" class="btn btn-dark" href="<?php echo site_url("laporanruangan/updatelaporan/".$detail[0]->id_pr."/Terlambat"); ?>">Sampaikan </a>
      </div>
    </div>
</form>
  </div>
</div>
