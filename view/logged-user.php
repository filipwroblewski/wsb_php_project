<?php
    if(isset($_SESSION['payment'])){
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
                $_SESSION[payment]
            </div>
          </div>
        </div>
      INFO;

      unset($_SESSION['payment']);
    }
    
    if(isset($_SESSION['orderInfo'])){
        echo <<< INFO
        <div class="col-md-3">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Odebrano zamówienie.</h3>
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
            <form action="../scripts/order_seedling.php" method="POST">
                <div class="table-responsive">
                    <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th>Wybór</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            require_once("../scripts/connect.php");

                            // display seedlings data
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
            </div>
            <!-- /.card-footer -->

        </form>
    </div>
    <!-- /.card -->

    

<?php
    // if exists $_SESSION['order'] display order.php
    if(isset($_SESSION['order'])){
        include("./order.php");
    }

    // if exists $_SESSION['cart'] display cart.php
    if(isset($_SESSION['cart'])){
        include("./cart.php");
    }
?>

<div class="col-md-12">
    <!-- TABLE: Złożone zamówienia -->
    <div class="card">
            <div class="card-header border-transparent">
            <h3 class="card-title">Złożone zamówienia</h3>

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
                        <th>Data zamówienia</th>    
                        <th>Nazwa sadzonki</th>
                        <th>Liczba szt.</th>
                        <th>Cena sadzonki</th>
                        <th>Opis sadzonki</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $user = $_SESSION['userData'][2];
                            // load data about order from db
                            $sql = "SELECT `orders`.`order_quantity`, `orders`.`created_at`, `seedlings`.`name`, `seedlings`.`price`, `seedlings`.`description` FROM `payment` JOIN `orders` ON `payment`.`created_at` = `orders`.`created_at` JOIN `seedlings` ON `seedlings`.`id` = `orders`.`seedling_id` WHERE `orders`.`status` = 'placed' AND `payment`.`user` = '$user';";
                            $result = $mysqli->query($sql);
                            while ($order = $result->fetch_assoc()) {
                                echo <<< E
                                <tr>
                                    <td>$order[created_at]</td>
                                    <td>$order[name]</td>
                                    <td>$order[order_quantity]</td>
                                    <td>$order[price]</td>
                                    <td>$order[description]</td>
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


<div class="col-md-12">
    <!-- TABLE: Zamówienia gotowe do odbioru -->
    <div class="card">
            <div class="card-header border-transparent">
            <h3 class="card-title">Zamówienia gotowe do odbioru</h3>

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
                        <th>Nazwa sadzonki</th>
                        <th>Liczba szt.</th>
                        <th>Opis sadzonki</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $user = $_SESSION['userData'][2];

                            // load data with order status sent
                            $sql = "SELECT `orders`.`id`, `orders`.`order_quantity`, `seedlings`.`name`, `seedlings`.`description` FROM `payment` JOIN `orders` ON `payment`.`created_at` = `orders`.`created_at` JOIN `seedlings` ON `seedlings`.`id` = `orders`.`seedling_id` WHERE `orders`.`status` = 'sent' AND `payment`.`user` = '$user';";
                            $result = $mysqli->query($sql);
                            while ($order = $result->fetch_assoc()) {
                                echo <<< E
                                <tr>
                                    <td>$order[name]</td>
                                    <td>$order[order_quantity]</td>
                                    <td>$order[description]</td>
                                    <td><a href="../scripts/collected_order.php?orderid=$order[id]">Oznacz jako odebrane</a></td>
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