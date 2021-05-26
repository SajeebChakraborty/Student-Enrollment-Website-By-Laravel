<style>

table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #D5F5E3;
}
#t01 tr:nth-child(odd) {
 background-color: #AEB6BF;
}
#t01 th {
  background-color: black;
  color: white;
}
.watermark {
  opacity: 0.2;
  font-size: 52px;
  color: 'black';
  background: '#ccc';
  position: absolute;
  cursor: default;
  user-select: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  right: 5px;
  bottom: 5px;
}
</style>

        @foreach($query5 as $row)
   <center><h1><b> <font color="Red"> Payment Copy </font> </b> </h1></center>
   <div class="watermark">
                    
    </div>

    <?php




    ?>
    
    @foreach($res as $row2)
    
    <img src="data:image/png;base64, {!! $qrcode !!}" align="right">
    <br><br>
    <font size="3">
    <b>Name : </b> {{  $row2->name }} <br> 
    <b>Class : </b> {{  $row2->class }} <br> 
    <b>Roll : </b> {{  $row2->roll }} <br> 
    <b>Contact : </b> {{  $row2->phone }} <br> 
    <b>Email : </b> {{  $row2->email }} <br> <br> <br>

    </font>

    @endforeach
   <table id="t01">
    <tr>
    <td> Invoice Number :</td>
    <td> {{ $row->invoice_number }} </td>
    </tr>

    <tr>
    <td> Amount :</td>
    <td> {{ $row->invoice_money }} </td>
    </tr>

    <tr>
    <td> Invoice Month :</td>
    <td> {{ $row->invoice_month }} </td>
    </tr>

    <tr>
    <td> Paid Status :</td>
    <td> {{ $row->paid_status }} </td>
    </tr>
    
    <tr>
    <td> Tnx Number :</td>
    <td> {{ $row->tnx_number }} </td>
    </tr>
    
    
   </table>
    <br><br><br> <br><br><br>
   <h3>Authority</h3>

  <i> <h4>Sajeeb Chakraborty</h4> </i>
   @endforeach