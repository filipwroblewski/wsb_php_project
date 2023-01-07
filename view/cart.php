<div class="col-md-12">
    <!-- TABLE: Koszyk -->
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Koszyk</h3>
            
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
            <form action="../scripts/payment.php" method="POST">
                <div class="table-responsive">
                    <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Cena</th>
                        <th>Ile szt.</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION['order'] as $value) {
                            echo <<< E
                            <tr>
                                <td>$value[name]</td>
                                <td>$value[price]</td>
                                <td>$value[orderQuantity]</td>
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
                <span class="float-left justify-content-center pt-1"><div id="paypal-payment-button"></div></span>
                <span class="float-right justify-content-center pt-2">Łącznie do zapłaty: <b><?php echo $_SESSION['cart']['fullPrice']; ?> zł</b></span>
            </div>
            <!-- /.card-footer -->

        </form>
    </div>
    <!-- /.card -->
</div>

<!-- set up paypal payment -->
<script src="https://www.paypal.com/sdk/js?client-id=AYI9DqkWF_HBhG_Yj3qsJcPxeft3wZL-sKlmO9Thdw0D65gGTYyqe3bGlxXM5rmc-akm9HBzPk1SIiu1&disable-funding=p24,card,blik&currency=PLN"></script>
<script>
    var total = '<?php echo $_SESSION['cart']['fullPrice']; ?>'
    paypal.Buttons({
        style: {
            color: 'blue'
        },

        // set up transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: parseFloat(total).toFixed(2)
                    }
                }]
            });
        },

        // finalize transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // success message
                alert('Wpłata została zrealizowana przez ' + details.payer.name.given_name + '.');
                window.location.replace("../scripts/payment.php");
            });
        },

        onCancel: function(data){
            // cancale message
            alert('Płatność nie została anulowana.');
        }

        }).render('#paypal-payment-button');
</script>