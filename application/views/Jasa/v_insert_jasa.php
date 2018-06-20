<div class="container">
  <form class="" action="<?php echo site_url();?>Jasa/tambahJasa" method="post">
    <fieldset>
      <div class="jumbotron">
        <center><legend class="display-4">Menambahkan Jasa</legend>
          <br>
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Id Jasa &emsp;&emsp;&emsp;&emsp;</label>
              <div class="col-sm-6">
                <input name="no_jasa" type="text" class="form-control" placeholder="Id Jasa">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Harga Jasa &emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="harga_jasa" type="text" class="form-control" placeholder="Harga Jasa">
              </div>
            </div>
          </div>

          <div class="col-lg-6">

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nama Jasa &emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nama_jasa" type="text" class="form-control" placeholder="Nama Jasa">
              </div>
            </div>

          </div>
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </fieldset>
  </form>
</div>
