<div class="container">
   <?php if (empty($this->editPage($_GET))): ?>
       <?php if (empty($this->index())): ?>
           <div class="jumbotron">
            <p>Data user kosong <?=var_dump($this)?></p>
           </div>
       <?php else: ?>
        <div class="row">
         <div class="col-sm-2">
          <?php require_once "vertical-nav.php"; ?>
         </div>

         <div class="col-sm-10">
             <table class="table table-striped table-hover">
              <thead>
               <th>Nama</th>
               <th>Email</th>
               <th>Foto</th>
              </thead>

               <tbody>
                <?php
                foreach ($this->index() as $key => $val): ?>
                 <tr>
                  <td><?=$val['username']?></td>
                  <td><?=$val['email']?></td>
                  <td><?=$val['photo']?></td>
                  <td><a href="index.php?page=user&&action=editpage&&username=<?=$val['username']?>"
                      class="btn btn-warning">Edit</a>
                  <a href="#" class="btn btn-danger">Hapus</a></td>
                 </tr>
                <?php endforeach; ?>
              </tbody>
             </table>
         </div>
        </div>
       <?php endif; ?>
   <?php else: ?>
     <?php
      if (isset($_POST['update'])) {
          $user = [
              'userlama' => $_POST['userlama'],
              'userbaru' => $_POST['username'],
              'email'    => $_POST['email'],
              'photo'    => $_POST['photo'],
          ];
          $this->updateUser($user);
      };
     ?>
     <?php foreach ($this->editPage($_GET) as $key => $val): ?>
      <form method="post">
       <div class="form-group">
        <label for="username">Nama</label>
        <input type="text" name="username" value="<?=$val['username']?>">
       </div>
       <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?=$val['email']?>">
       </div>
       <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" name="photo" value="<?=$val['photo']?>">
       </div>
       <input type="hidden" name="userlama" value="<?=$val['username']?>">
       <button type="submit" name="update" value="1"
       class="btn btn-primary btn-block">Simpan</button>
      </form>

     <?php endforeach; ?>
   <?php endif; ?>
</div>
