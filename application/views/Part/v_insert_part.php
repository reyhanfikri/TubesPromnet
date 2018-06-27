<div class="container">
  <form class="" action="<?php echo site_url();?>Part/tambahPart" method="post">
    <fieldset>
      <div class="jumbotron">
        <center><legend class="display-4">Menambahkan Part</legend>
          <br>
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nama Part &emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nama_part" type="text" class="form-control" placeholder="Nama Part">
              </div>
            </div>

            <!-- <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Id Part &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="id_part" type="text" class="form-control" placeholder="Id Part">
              </div>
            </div> -->

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Stok Part &emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="stok_part" type="text" class="form-control" placeholder="Stok Part">
              </div>
            </div>

          </div>

          <div class="col-lg-6">


            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Harga Part &emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="harga_part" type="text" class="form-control" placeholder="Harga Part">
              </div>
            </div>
          </div>
        </div>
          <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </fieldset>
  </form>
</div>
