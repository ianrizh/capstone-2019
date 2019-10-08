<div class="modal fade" id="service">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="pay_date"></span>
                <span class="pull-right">TRANSACTION NO: <span id="transid1"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  <th>SERVICE NAME</th>
                  <th>QUANTITY OF PRODUCTS USED</th>
                  <th>TOTAL OF PRODUCTS USED</th>
                  <th>SUBTOTAL</th>
                </thead>
                <tbody id="detail1">
                  <tr>
                    <td colspan="3" align="right"><b>TOTAL</b></td>
                    <td><span id="total1"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>