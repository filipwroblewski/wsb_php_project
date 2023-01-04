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
                <th></th>
                <th></th>
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
                        <td><a href="../scripts/delete_user.php?userid=$user[id]">Usuń</a></td>
                        <td><a href="./logged.php?updateuserid=$user[id]">Aktualizuj</a></td>
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
        <a href="./logged.php?adduser=1" class="btn btn-sm btn-info float-left">Dodaj nowego użytkownika</a>
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

    <div class="col-md-6">

    <div class="card card-primary">
        <?php
            if(isset($_GET['adduser'])){
                echo "<div class=\"card-header\"><h3 class=\"card-title\">Dodanie nowego użytkownika</h3></div>";
                echo <<< ADDUSER
                <div class="card-body">
                    <form action="../scripts/add_user.php" method="post">
                        <div class="form-group">
                            <label for="name1">Podaj imię</label>
                            <input type="text" id="name1" name="name" class="form-control" placeholder="Imię">
                        </div>

                        <div class="form-group">
                            <label for="email1">Podaj email</label>
                            <input type="email" id="email1" name="email" class="form-control" placeholder="Wprowadź email">
                        </div>
                    
                        <div class="form-group">
                            <label>Rola</label>
                            <select class="form-control" name="role">
                ADDUSER;
                
                    // $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'oto_sadzonki' AND TABLE_NAME = 'users' AND COLUMN_NAME = 'role';";
                    $sql="SELECT DISTINCT role FROM `users`;";
                    $result=$mysqli->query($sql);
                    while ($role=$result->fetch_assoc()){
                        if ($role['role'] == "user"){
                            echo "<option value=\"$role[role]\" selected>$role[role]</option>";
                        }else{
                            echo "<option value=\"$role[role]\">$role[role]</option>";
                        }
                    }
                echo <<< ADDUSER
                            </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
                        </div>
                    </form>
                </div>
                ADDUSER;
            }
            if (isset($_GET['updateuserid'])){
                echo "<div class=\"card-header\"><h3 class=\"card-title\">Aktualizacja użytkownika o id=$_GET[updateuserid]</h3></div>";
                $sql="SELECT * FROM `users` WHERE `id`=$_GET[updateuserid]";
                $result = $mysqli->query($sql);
                $user = $result->fetch_assoc();
                // echo "$user[city_id]";

                echo <<< UPDATEUSER
                <div class="card-body">
                    <form action="../scripts/add_user.php" method="post">
                        <div class="form-group">
                            <label for="name1">Podaj imię</label>
                            <input type="text" id="name1" name="name" class="form-control" placeholder="Podaj imie" value="$user[name]">
                        </div>

                        <div class="form-group">
                            <label for="email1">Podaj email</label>
                            <input type="email" id="email1" name="email" class="form-control" placeholder="Wprowadź email" value="$user[email]">
                        </div>
                    
                        <div class="form-group">
                            <label>Rola</label>
                            <select class="form-control" name="role">
                UPDATEUSER;
                    
                    // $sql="SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'oto_sadzonki' AND TABLE_NAME = 'users' AND COLUMN_NAME = 'role';";
                    $sql="SELECT DISTINCT role FROM `users`;";
                    $result=$mysqli->query($sql);
                    while ($role=$result->fetch_assoc()){
                        if ($role['role'] == $user['role']){
                            echo "<option value=\"$role[role]\" selected>$role[role]</option>";
                        }else{
                            echo "<option value=\"$role[role]\">$role[role]</option>";
                        }
                    }
                    
                echo <<< UPDATEUSER
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Aktualizuj dane</button>
                        </div>
                    </form>
                </div>
                UPDATEUSER;

                $_SESSION['updateuserid'] = $user['id'];
            }
        ?>
      </div>

</div>
<!-- /.col -->