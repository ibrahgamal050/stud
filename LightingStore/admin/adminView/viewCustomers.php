
<div >
  
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from about";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  

  <!-- Modal -->
  <div >
    <div >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New about</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">titel:</label>
              <input type="text" class="form-control" id="titel" required>
            </div>
            
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="dece" required>
            </div>
            
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file" name="file[]" multiple>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">save</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   