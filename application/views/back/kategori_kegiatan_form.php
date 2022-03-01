<div class="modal fade" id="form-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kategori Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="form-data"  method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row" >
                    <div hidden="">                        
                        <input type="text" id="id_kat_kegiatan" name="id_kat_kegiatan" value="">
                        <input type="text" id="stat" name="stat" value="">
                    </div>
                    <div id="form-reset" class="row col-md-12">
                                                
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Kegiatan</label>
                                <input type="text" autocomplete="off" maxlength="150" class="form-control" id="nm_kat_kegiatan"  placeholder="Kategori Kegiatan" name="nm_kat_kegiatan" required="">
                            </div>
                        </div>                                              
                                            
                    </div>                                                         
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="close_form();" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
