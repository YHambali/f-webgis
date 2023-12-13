<div class="modal fade" id="form-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Bencana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="row" >
                    <div class="col-lg-12" id="prev_detail">
                        
                    </div>                                                   
                </div>

                <div class="row">
                    <div class="col-lg-12" id="accordion" class="custom-accordion">
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse"
                                            aria-expanded="false"
                                            aria-controls="collapseTwo">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="m-0">
                                        Detail Rekam Bencana
                                        <!-- <i class="mdi mdi-plus float-right accor-minus-icon"></i> -->
                                    </h6>
                                </div>
                            </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div style="max-width: auto; overflow-x: auto;">
                                                <table id="datatable1" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tanggal Bencana</th>
                                                            <th>Nama Bencana</th>
                                                            <th>Keterangan Bencana</th>
                                                            <th>File Dokumentasi</th>                                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody id="prev_detail_rekam_bencana">                                                                               
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
            </div>
        
        </div>
    </div>
</div>
