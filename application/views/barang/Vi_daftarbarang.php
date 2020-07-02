<!-- TABEL-->
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Barang</strong>
                    </div>

                    <div class="card-header">
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('crudbarang/add') ?>"><i class="fa fa-pencil"></i> Tambah Baru</a>
                        <div align="center">
                            <?php echo form_open('crudbarang/search') ?>
                            <input type="text" name="keyword" placeholder=" Cari Nama Barang .. ">
                            <input type="submit" name="search_submit" value="Cari">
                            <?php echo form_close() ?>
                        </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tb_barang as $br) {
                                ?>
                                    <tr>

                                        <td><?php echo $br->kode_barang ?></td>
                                        <td><?php echo $br->nama_barang ?></td>
                                        <td><?php echo $br->merk ?></td>
                                        <td><?php echo $br->no_seri ?></td>
                                        <td><?php echo $br->kondisi_barang ?></td>
                                        <td><?php echo $br->unit ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="<?php echo site_url('crudbarang/edit/' . $br->id_barang); ?>" class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>

                                            <a href="<?php echo site_url('crudbarang/hapus/' . $br->id_barang); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$br->nama_barang;?> dari Daftar?');" class="btn btn-danger btn-sm" data-popup="tooltip" data-placement="top" title="Hapus Data" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
                                    </div>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col">
                                <?php echo $pagination; ?>
                                <!-- <?php echo $this->pagination->create_links(); ?>  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticModal<?php echo $br->id_barang; ?>" onclick="confirm_modal('<?php echo site_url('crudbarang/hapus/' . $br->id_barang); ?>','Title');" class="btn btn-small"><i class="fa fa-trash-o"></i> Hapus</a> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<div class="modal fade" id="modal_delete_m_n" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Yakin ingin menghapus ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" id="delete_link_m_n">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>
<script>
    function confirm_modal(delete_url, title) {
        jQuery('#modal_delete_m_n').modal('show', {
            backdrop: 'static',
            keyboard: false
        });
        jQuery("#modal_delete_m_n .grt").text(title);
        document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
        document.getElementById('delete_link_m_n').focus();
    }
</script>