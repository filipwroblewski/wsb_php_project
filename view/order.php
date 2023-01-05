<div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Zamówienie</h3>

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
            <form action="./cart.php" method="POST">
                <div class="table-responsive">
                    <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th>Ile szt.</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        foreach ($_SESSION['order'] as $value) {
                            echo <<< E
                            <tr>
                                <td>$value[name]</td>
                                <td>$value[description]</td>
                                <td>$value[price]</td>
                                <td>$value[quantity]</td>
                                <td><input type="number" min="0" max="$value[quantity]" name="orderQuantity[]"></td>
                            </tr>
                            E;
                        }

                        // unset($_SESSION['order']);
                        ?>
                        
                    </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                <input type="submit" value="Płacę" class="btn btn-sm btn-info float-left">
            </div>
            <!-- /.card-footer -->

        </form>
    </div>
    <!-- /.card -->
</div>