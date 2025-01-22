<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>WellType</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Library html2pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<style>
    .table {
    margin: 0;
    padding: 0;
    width: 100%;
    }
    .col-12 {
    padding-left: 0;
    padding-right: 0;
    }
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
    <div class="input-group-append">
        <button class="btn btn-navbar" type="submit"></button>
    </div>
    </form>

    <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 style="font-weight: bold;">Cetak Laporan</h1>
            </div>
        </div>
        </div>
    </section>
    <section class="content">

        <!-- Tabel Laporan -->
        <div class="card">
            <div class="card-header bg-info text-white">Tampilan Laporan</div>
            <div class="text-right mt-3">    
            <a href="<?php echo base_url('Analysis_admin'); ?>" class="btn btn-primary">Back</a>
            <button id="cetak-pdf" class="btn btn-success">Generate PDF</button>
            </div>
            <div class="card-body">
                <div id="laporan-pdf">
                    <!-- Header Laporan -->
                    <div class="text-center mb-4">
                        <h3>Laporan WellType</h3>
                        <hr>
                    </div>
                    <!-- Tabel Laporan -->
                    <table border="1" cellpadding="5" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Konten</th>
                                <th>Deskripsi Konten</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($konten as $index => $item): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $item->judul_konten; ?></td>
                                    <td><?php echo $item->konten; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
    </div>
    <!-- Script -->
    <script>
        // Cetak PDF
        document.getElementById('cetak-pdf').addEventListener('click', function () {
            const element = document.getElementById('laporan-pdf');
            const opsi = {
                margin: 10,
                filename: 'laporan_konten.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opsi).from(element).save();
        });
    </script>
</body>
</html>