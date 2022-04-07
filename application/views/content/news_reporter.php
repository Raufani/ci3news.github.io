<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<h2>Reporter Table</h2>
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
        <th>ID</th>
        <th>Reporter Name</th>
        <th>ID news</th>
    </tr>
    </thead>

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
                "url": "<?= base_url('news/view_data_server_side_reporter');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                { 
                    "label": "#", 
                    "data": "id" 
                },  // Tampilkan penulis
                { 
                    "label": "Reporter Name", 
                    "data": "reporter_name" 
                },  // Tampilkan tgl posting
                { 
                    "label": "Id News", 
                    "data": "id_news" 
                },
            ],
        });
    });
</script>
</div>

