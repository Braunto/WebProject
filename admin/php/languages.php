<?php
/*
        file:   admin/php/languages.php
        Desc:   Shows the languages table. You can add/remove languages
*/
?>
<div class="row">
  <div class="col-sm-6">
      <div class="card">
          <div class="card-header bg-info"><h3>Languages available</h3></div>
          <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Language</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('../php/dbConnect.php');
                        $sql="SELECT language FROM languages ORDER BY language";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>';
                            echo $row['language'];
                            echo '</td>';
                            echo '<td><a href="php/deleteLanguage.php?language='.$row['language'];
                            echo '">Remove</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
          </div>
      </div>
  </div>
  <div class="col-sm-6">
      <div class="card">
          <div class="card-header bg-info"><h3>Add language</h3></div>
          <div class="card-body">
              <form action="php/addNewLanguage.php" method="post">
                <div class="form-group">
                    <label for="lng">New language:</label>
                    <input type="text" class="form-control" id="lng" name="lng">
                </div>
                <button type="submit" class="btn btn-primary">Insert</button>
              </form>
          </div>
      </div>
  </div>
</div>