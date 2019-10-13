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
              <table class="table table-bordered" id="tblservice">
                <thead>
                  <tr>
                    <th>SERVICE NAME</th>
                    <th>SERVICE TYPE</th>
                    <th>SERVICE PRICE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td id='td_servicename'></td>
                    <td id='td_servicetype'></td>
                    <td id='td_serviceprice'></td>
                  </tr>
                </tbody>
                <!--tbody id="detail1">
                  <tr>
                    <td colspan="3" align="right"><b>TOTAL</b></td>
                    <td><span id="total1"></span></td>
                  </tr>
                </tbody-->
              </table>
              <table class="table table-bordered" id='tblservice_products'>
                <thead>
                  <tr>
                    <th>PRODUCT USED</th>
                    <th>QUANTITY</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>