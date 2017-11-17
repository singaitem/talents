@if (isset($claim)) 
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>  
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <label class="col-sm-6" style="font-weight: normal;">Total Claim</label>
                    <label class="col-sm-6 text-right">Rp.{{$claim->total_value}}</label>
                    <div class="col-sm-12 box box-primary"></div>
                    <label class="col-sm-6">Total Current Claim</label>
                    <label class="col-sm-6 text-right">Rp.{{$claim->total_value}}</label>
                    <div class="col-sm-12 box box-primary"></div>
                    <div class="col-md-12">
                        Attach Supporting Document
                        <div class="form-group">
                          <input type="file" id="exampleInputFile">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->
</div>
@endif