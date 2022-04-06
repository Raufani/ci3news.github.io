<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<!-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li class="active"><a class="btn btn-primary" href="<?= base_url() ?>news/create">Add news/post</a></li>
            <li><a class="btn btn-success" href="<?= base_url() ?>news">News list</a></li>
        </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>


            <!-- Notification boxes -->
            <?php if($this->session->flashdata('success_msg')){ ?>
                <p class="alert alert-info">
                    <?php echo $this->session->flashdata('success_msg'); ?>
                </p>
            <?php } ?>
            <?php if ($news == FALSE) : ?>
                <p class="alert alert-danger"><a href="javascript:void(0)" class="close"></a><b>Alert!</b > no news available<p>
            <?php else : ?>
                <form method="post" action="<?= base_url() ?>news/operation/">
                    <!-- Example table -->
                    <table id="example-server-side" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="center-block">
                                <input type="checkbox" onclick="$('input[name*=\'checkAll\']').prop('checked', this.checked);">
                            </th>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>language</th>
                            <th>Created</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <!--<tbody>
                        <?php $x = 1;
                        foreach ($news as $ph) : ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="checkAll[]" value="<?= $ph['ne_id']; ?>"></td>
                                <td><?= $x; ?></td>
                                <td>
                                    <?php if ($ph['ne_img'] != "" && file_exists(PUBPATH . "global/uploads/" . $ph['ne_img'])) { ?>
                                        <img src="<?= base_url(); ?>global/uploads/<?= $ph['ne_img']; ?>" width="80" height="50" />
                                    <?php } else { ?>
                                        <img src="<?= base_url(); ?>global/admin/images/noImage.jpg" width="80" height="50" />
                                    <?php } ?>
                                </td>
                                <td><?= $ph['ne_title'] ?></td>
                                <td><?= $ph['ne_lang'] ?></td>
                                <td><?= date('d-m-Y', $ph['ne_created']); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>news/edit/<?= $ph['ne_id']; ?>"
                                       data-toggle="tooltip" class="btn btn-primary" data-original-title="edit ">
                                       edit
                                    </a>

                                    <a href="<?= base_url() ?>news/remove/<?= $ph['ne_id']; ?>"
                                       data-toggle="tooltip" title="" class="btn btn-danger"
                                       onclick="return confirm('Do you want Delete?');"
                                       data-original-title="remove">delete
                                    </a>

                                </td>

                            </tr>
                            <?php $x++; endforeach; ?>
                        </tbody>-->
                    </table>
                </form>
            <?php endif; ?>
        </div>
    </div>
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
                    {   label: function() 
                        {
                            return '<input type="checkbox" onclick="' + $('input[name*=\'checkAll\']').prop('checked', this.checked);+'">';
                             
                        },
                        data: "checkbox",
                        orderable: false 
                    },
                    { 
                        "label": "#", 
                        "data": "ne_id"
                    }, // Id News
                    { 
                        "label": "Image", 
                        "data": "ne_img" 
                    },  // TImage
                    { 
                        "label": "Title", 
                        "data": "ne_title" 
                    },  // Title
                    { 
                        "label": "Language", 
                        "data": "ne_lang" 
                    },  // Language
                    { 
                        "label": "Created", 
                        "data": "ne_created" 
                    },
                    { 
                        "data": "option",
                        "label": "Options",
                    }, 
                ],
            });
        });
    </script>    
</div>
