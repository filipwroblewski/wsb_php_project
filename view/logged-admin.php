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

    <?php
        if(isset($_GET['adduser'])){
            echo "<h4>Dodanie nowego użytkownika</h4>";
            echo <<< ADDUSER
            <form action="../scripts/add_user.php" method="post">
                <select name="role">
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
                </select><br><br>
                <input type="text" name="name" placeholder="Podaj imie"><br><br>
                <input type="text" name="email" placeholder="Podaj email"><br><br>
                <input type="submit" value="Dodaj użytkownika">
            </form>
            ADDUSER;
        }
        if (isset($_GET['updateuserid'])){
            echo "<h4>Aktualizacja użytkownika o id=$_GET[updateuserid]</h4>";
            $sql="SELECT * FROM `users` WHERE `id`=$_GET[updateuserid]";
            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();
            // echo "$user[city_id]";

            echo <<< UPDATEUSER
            <form action="../scripts/update_user.php" method="post">
                <select name="role">
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
              </select><br><br>
              <input type="text" name="name" placeholder="Podaj imie" value="$user[name]"><br><br>
              <input type="text" name="email" placeholder="Podaj email" value="$user[email]"><br><br>
              <input type="submit" value="Aktualizuj dane">
            </form>
            UPDATEUSER;

            $_SESSION['updateuserid'] = $user['id'];
          }
      ?>

</div>
<!-- /.col -->