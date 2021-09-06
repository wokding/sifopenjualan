<style>
    * {
        font-size: 13px;
        color: #000;
    }


    .table {
        border-collapse: collapse;
        margin-top: 5px;
        width: 100%;
    }

    .table td {
        border-collapse: collapse;
        border: 1px solid #666666;
        font-size: 13px;
        padding-left: 6px;
        padding-right: 6px;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .table th {
        font-weight: bolder;
        border-collapse: collapse;
        border: 1px solid #666666;
        font-size: 13px;
        padding-left: 6px;
        padding-right: 6px;
        padding-top: 2px;
        padding-bottom: 2px;

    }

    .grey {
        background-color: #ccc;
        border: 1px solid #666666;
        font-size: 13px;
        padding-left: 6px;
        padding-right: 6px;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    h3 {
        font-size: 15px;
        font-weight: bolder;
    }

    h1 {
        font-size: 20px;
        font-weight: bolder;
    }

    h2 {
        font-size: 18px;
        font-weight: bolder;
    }

    .hr {
        border-collapse: collapse;
        border-bottom: 1px solid #000;
        margin-bottom: 30px;
    }
</style>

<div style="text-align:center;">
    <div style="margin-top:-25px; margin-bottom:-25px">
        <img src="<?= base_url('assets/img/logo.png'); ?>" class="rounded" width="300px>
    </div>
    <br>
    <center>
        <h1>SISTEM INFORMASI PENJUALAN</h1>
    </center>
</div>
<div style="margin-top:-30px; text-align:center;">
    <center>
        <h2>LAPORAN PENJUALAN</h2>
    </center>
</div>

<div class="hr"></div>
<br>
<table class="table" style="width:100%">

    <tr class="grey">
        <th align="center">No.</th>
        <th align="center">Kode Penjualan</th>
        <th align="center">Tanggal Penjualan</th>
        <th align="center">Kode Pelanggan</th>
        <th align="center">Nama Pelanggan</th>
        <th align="center">Kode Barang</th>
        <th align="center">Nama Barang</th>
        <th align="center">Harga</th>
        <th align="center">QTY</th>
        <th align="center">Jumlah</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($transaksiPenjualan as $tp) : ?>
        <tr>
            <td scope="row" align="center"><?= $i ?></td>
            <td align="center"><?= $tp['kd_penjualan']; ?></td>
            <td align="center"><?= $tp['tgl_penjualan']; ?></td>
            <td align="center"><?= $tp['kd_pelanggan']; ?></td>
            <td><?= $tp['nama_pelanggan']; ?></td>
            <td align="center"><?= $tp['kd_barang']; ?></td>
            <td><?= $tp['nama_barang']; ?></td>
            <td align="right">
                <?= rupiah($tp['harga']); ?>
            </td>
            <td align="center"><?= $tp['qty']; ?></td>
            <td align="right">
                <?= rupiah($tp['harga'] * $tp['qty']); ?>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>