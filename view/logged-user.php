<!-- Left col -->
<div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <form action="../scripts/order.php" method="POST">
        <div class="card">
            <div class="card-header border-transparent">
            <h3 class="card-title">Sadzonki</h3>

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
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th>Opis</th>
                    <th>Ilość</th>
                    <th>Wybór</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        require_once("../scripts/connect.php");
                        $sql = "SELECT * FROM `seedlings`;";
                        $result = $mysqli->query($sql);
                        while ($seedling = $result->fetch_assoc()) {
                        echo <<< E
                        <tr>
                            <td>$seedling[name]</td>
                            <td>$seedling[price] zł</td>
                            <td>$seedling[description]</td>
                            <td>$seedling[quantity]</td>
                            <td><input type="number" name="$seedling[id]" min="0" max="$seedling[quantity]"></td>
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
                <input type="submit" class="btn btn-sm btn-info float-left" value="Zamów sadzonki">
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </form>
</div>
<!-- /.col -->