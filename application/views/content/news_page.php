<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<h2>News Table</h2>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<div class="alert alert-info">
    <strong><?= lang('Demo') ?></strong></div>
<div class="table-responsive">
<table class="table" id="example-server-side">
    <thead>
    <tr>
        <th><?= lang('ne_title') ?></th>
        <th><?= lang('ne_desc') ?></th>
        <th><?= lang('ne_img') ?></th>
    </tr>
    </thead>
    <!--<tbody>
    <?php foreach ($news as $n) : ?>
    <tr>
        <td><a href="<?= base_url() ?>news/show_one/<?= $n['ne_id']; ?>"><?= $n['ne_title']; ?></a></td>
        <td><?= implode(' ', array_slice(explode(' ', $n['ne_desc']), 0, 15));; ?></td>
        <td><img src="<?php echo base_url(); ?>global/uploads/<?= $n['ne_img']; ?>"/>
        </td>
    </tr>
    </tbody>
    <?php endforeach ?>-->
</table>
<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#example-server-side').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?= base_url('news/view_data_server_side');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                { 
                    "label": "Title", 
                    "data": "ne_title" 
                },  // Tampilkan penulis
                { 
                    "label": "Description", 
                    "data": "ne_desc" 
                },  // Tampilkan tgl posting
                { 
                    "label": "Image", 
                    "data": "ne_img" 
                },
            ],
        });
    });
</script>
</div>

