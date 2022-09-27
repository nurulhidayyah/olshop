<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-lg-12">
                <?php echo form_open('belanja/update'); ?>
                <div class="card-body">
                    <table class="table" cellpadding="6" cellspacing="1" style="width:100%" id="example1">
                        <thead class="text-center">
                            <tr>
                                <th width="100px">QTY</th>
                                <th>Nama Barang</th>
                                <th style="text-align:right">Harga</th>
                                <th style="text-align:right">Sub-Total</th>
                                <th style="text-align:center">Berat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php
                            $tot_berat = 0;
                            foreach ($this->cart->contents() as $items) {
                                $barang = $this->m_home->detail_barang($items['id']);
                                $berat = $items['qty'] * $barang->berat;
                                $tot_berat += $berat;
                            ?>
                                <tr>
                                    <!-- <td><?= $no++; ?></td> -->
                                    <td class="form-row align-items-center">
                                        <?php
                                        echo form_input(array(
                                            'name' => $i . '[qty]',
                                            'value' => $items['qty'],
                                            'maxlength' => '3',
                                            'min' => '0',
                                            'size' => '1',
                                            'type' => 'number',
                                            'class' => 'form-control'
                                        ));
                                        ?>
                                    </td>
                                    <td><?php echo $items['name']; ?></td>
                                    <td style="text-align:right">Rp. <?php echo number_format($items['price'], 0); ?></td>
                                    <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                                    <td class="text-center"><?= $berat; ?> Gr</td>
                                    <td class="text-center">
                                        <a href="<?= base_url('belanja/delete/' . $items['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <?php $i++; ?>

                            <?php } ?>

                        </tbody>
                        <tr>
                            <th class="text-right" colspan="6">
                                Total Berat : <?= $tot_berat; ?>Gr
                            </th>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="6">
                                <h3>Total : Rp. <?php echo number_format($this->cart->total(), 0); ?></h3>
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-save"></i> Update Cart</button>
                <a href="<?= base_url('belanja/clear'); ?>" class="btn btn-danger text-white mb-3"><i class="fa fa-recycle"></i> Clear Cart</a>
                <a href="<?= base_url('belanja/checkout'); ?>" class="btn btn-success text-white mb-3"><i class="fa fa-check-square"></i> Checkout</a>

                <?php form_close(); ?>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 1000);
</script>