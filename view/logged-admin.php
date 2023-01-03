<!-- Left col -->
<div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card">
        <div class="card-header border-transparent">
        <h3 class="card-title">Użytkownicy</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Rola</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    require_once("../scripts/connect.php");
                    $sql = "SELECT * FROM `users`;";
                    $result = $mysqli->query($sql);
                    while ($user = $result->fetch_assoc()) {
                    echo <<< E
                    <tr>
                        <td>$user[id]</td>
                        <td>$user[name]</td>
                        <td>$user[role]</td>
                        <td>$user[email]</td>
                    </tr>
            
                    E;
                    }
                ?>
            </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->