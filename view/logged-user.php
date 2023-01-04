<!-- Left col -->
<div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
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
            <form action="../scripts/order_seedling.php" method="POST">
                <div class="table-responsive">
                    <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th></th>
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
                                    <td>$seedling[description]</td>
                                    <td>$seedling[price]</td>
                                    <td>$seedling[quantity]</td>
                                    <td><input type="checkbox" name="selectedid[]" value="$seedling[id]"></td>
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
                <input type="submit" value="Złóż zamówienie" class="btn btn-sm btn-info float-left">
                <!-- <a href="./logged.php?addseedling=1" class="btn btn-sm btn-info float-left">Dodaj nową sadzonkę</a> -->
            </div>
            <!-- /.card-footer -->

        </form>
    </div>
    <!-- /.card -->

    <div class="col-md-6">

    <div class="card card-primary">
        <?php
            if (isset($_GET['updateseedlingid'])){
                echo "<div class=\"card-header\"><h3 class=\"card-title\">Aktualizacja sadzonki o id=$_GET[updateseedlingid]</h3></div>";
                $sql="SELECT * FROM `seedlings` WHERE `id`=$_GET[updateseedlingid]";
                $result = $mysqli->query($sql);
                $seedling = $result->fetch_assoc();

                echo <<< UPDATESEEDLING
                <div class="card-body">
                    <form action="../scripts/update_seedling.php" method="post">
                        <div class="form-group">
                            <label for="name1">Podaj nazwę</label>
                            <input type="text" id="name1" name="name" value="$seedling[name]" class="form-control" placeholder="Nazwa">
                        </div>

                        <div class="form-group">
                            <label>Opis</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Opis ...">$seedling[description]</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price1">Podaj cenę</label>
                            <input type="number" id="price1" min="0" name="price" value="$seedling[price]" class="form-control" placeholder="Cena">
                        </div>

                        <div class="form-group">
                            <label for="quantity1">Podaj ilość</label>
                            <input type="number" id="quantity1" name="quantity" value="$seedling[quantity]" class="form-control" placeholder="Ilość">
                        </div>

                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Dodaj sadzonkę</button>
                        </div>
                    </form>
                </div>
                UPDATESEEDLING;

                $_SESSION['updateseedlingid'] = $seedling['id'];
            }
        ?>
      </div>

</div>
<!-- /.col -->

<?php
    if(isset($_SESSION['order'])){
        include("order.php");
    }
?>
