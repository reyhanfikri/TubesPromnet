<div class="container">
  <form class="" action="<?php echo site_url();?>Mekanik/tambahMekanik" method="post">
    <fieldset>
      <div class="jumbotron">
        <center><legend class="display-4">Menambahkan Mekanik</legend>
          <br>
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nama Mekanik &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nama_mekanik" type="text" class="form-control" placeholder="Nama Mekanik">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Alamat Mekanik &emsp;&emsp;&emsp;</label>
              <div class="col-sm-7">
                <textarea name="alamat_mekanik" rows="4" cols="80" class="form-control" placeholder="Alamat Mekanik"></textarea>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Telepon &emsp;&emsp;&emsp;</label>
              <div class="col-sm-6">
                <input name="nomor_telepon" type="text" class="form-control" placeholder="Nomor Telepon">
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </fieldset>
  </form>
</div>
