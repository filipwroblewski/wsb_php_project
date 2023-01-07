<?php
    if(isset($_SESSION['addSeedlingInfo'])){
        echo <<< INFO
        <div class="col-md-3">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Informacje związane z transakcją.</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                $_SESSION[addSeedlingInfo]
            </div>
          </div>
        </div>
      INFO;

      unset($_SESSION['addSeedlingInfo']);
    }

    if(isset($_SESSION['orderInfo'])){
        echo <<< INFO
        <div class="col-md-3">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Informacje związane z transakcją.</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                $_SESSION[orderInfo]
            </div>
          </div>
        </div>
      INFO;

      unset($_SESSION['orderInfo']);
    }
?>

<!-- Left col -->
<div class="col-md-12">
    <!-- TABLE: Sadzonki -->
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
                    <th>Id</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Cena</th>
                    <th>Ilość</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        require_once("../scripts/connect.php");

                        // select seedlings data to display on website
                        $sql = "SELECT * FROM `seedlings`;";
                        $result = $mysqli->query($sql);
                        while ($seedling = $result->fetch_assoc()) {
                            echo <<< E
                            <tr>
                                <td>$seedling[id]</td>
                                <td>$seedling[name]</td>
                                <td>$seedling[description]</td>
                                <td>$seedling[price]</td>
                                <td>$seedling[quantity]</td>
                                <td><a href="../scripts/delete_seedling.php?seedlingid=$seedling[id]">Usuń</a></td>
                                <td><a href="./logged.php?updateseedlingid=$seedling[id]">Aktualizuj</a></td>
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
            <a href="./logged.php?addseedling=1" class="btn btn-sm btn-info float-left">Dodaj nową sadzonkę</a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

    <div class="col-md-6">

    <div class="card card-primary">
        <?php
            // if $_GET['addseedling'] then display form with nessesary fields to add seedling
            if(isset($_GET['addseedling'])){
                echo "<div class=\"card-header\"><h3 class=\"card-title\">Dodanie nowej sadzonki</h3></div>";
                echo <<< ADDSEEDLING
                <div class="card-body">
                    <form action="../scripts/add_seedling.php" method="post">
                        <div class="form-group">
                            <label for="name1">Podaj nazwę</label>
                            <input type="text" id="name1" name="name" class="form-control" placeholder="Nazwa">
                        </div>

                        <div class="form-group">
                            <label>Opis</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Opis ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price1">Podaj cenę</label>
                            <input type="number" id="price1" step="0.01" min="0" name="price" class="form-control" placeholder="Cena">
                        </div>

                        <div class="form-group">
                            <label for="quantity1">Podaj ilość</label>
                            <input type="number" id="quantity1" name="quantity" class="form-control" placeholder="Ilość">
                        </div>

                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Dodaj sadzonkę</button>
                        </div>
                    </form>
                </div>
                ADDSEEDLING;
            }

             // if $_GET['updateseedlingid'] then display form with nessesary fields to update seedling data
            if (isset($_GET['updateseedlingid'])){
                echo "<div class=\"card-header\"><h3 class=\"card-title\">Aktualizacja sadzonki o id=$_GET[updateseedlingid]</h3></div>";
                
                // load all data about seedling with given id
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
                            <input type="number" id="price1" min="0" step="0.01" name="price" value="$seedling[price]" class="form-control" placeholder="Cena">
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


<div class="col-md-12">
    <!-- TABLE: Zamówienia -->
    <div class="card">
            <div class="card-header border-transparent">
            <h3 class="card-title">Zamówienia</h3>

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
                        <th>Id</th>
                        <th>Liczba szt.</th>
                        <th>Data zamówienia</th>
                        <th>Status</th>
                        <th>Nazwa sadzonki</th>
                        <th>Cena sadzonki</th>
                        <th>Opis sadzonki</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            // display orders data
                            $sql = "SELECT `orders`.`id`, `orders`.`order_quantity`, `orders`.`created_at`,`orders`.`status`, `seedlings`.`name`, `seedlings`.`price`, `seedlings`.`description` FROM `orders` JOIN `seedlings` ON `seedlings`.`id` = `orders`.`seedling_id` WHERE `orders`.`status` = 'placed';";
                            $result = $mysqli->query($sql);
                            while ($order = $result->fetch_assoc()) {
                                echo <<< E
                                <tr>
                                    <td>$order[id]</td>
                                    <td>$order[order_quantity]</td>
                                    <td>$order[created_at]</td>
                                    <td>$order[status]</td>
                                    <td>$order[name]</td>
                                    <td>$order[price]</td>
                                    <td>$order[description]</td>
                                    <td><a href="../scripts/send_order.php?orderid=$order[id]">Oznacz jako wysłane</a></td>
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
    </div>
    <!-- /.card -->
</div>
