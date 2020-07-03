<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
            <a href="https://www.shoprite.com.ng/.ng"></a>. All rights reserved.</span>
        <!--             <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                      <i class="mdi mdi-heart text-danger"></i>
                    </span> -->
    </div>
</footer>

<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


<script src="js/jquery-3.2.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!--<script src="../cdn/buttons.flash.min.js"></script>-->
<!--<script src="../cdn/jszip.min.js"></script>-->
<!--<script src="../cdn/vfs_fonts.js"></script>-->
<!--<script src="../cdn/jquery.dataTables.min.js"></script>-->
<!--<script src="../cdn/dataTables.buttons.min.js"></script>-->
<!--<script src="../cdn/buttons.html5.min.js"></script>-->
<!--<script src="../cdn/jquery-3.3.1.js"></script>-->
<!--<script src="../cdn/pdfmake.min.js"></script>-->
<!--<script src="../cdn/buttons.print.min.js"></script>-->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script>



$(document).ready(function() {

  function exportTableToExcel(tableID, filename = ''){
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tableID);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

      // Specify file name
      filename = filename?filename+'.xls':'excel_data.xls';

      // Create download link element
      downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if(navigator.msSaveOrOpenBlob){
          var blob = new Blob(['\ufeff', tableHTML], {
              type: dataType
          });
          navigator.msSaveOrOpenBlob( blob, filename);
      }else{
          // Create a link to the file
          downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

          // Setting the file name
          downloadLink.download = filename;

          //triggering the function
          downloadLink.click();

          location.reload();
      }
  }

  $('#export_category_button').click(function() {
    $(".remove").remove();
    exportTableToExcel('table', 'Shoprite Inventory System - Product Categories');
        window. location. reload();
  });


  $('#export_product_button').click(function() {
    $(".remove").remove();
    exportTableToExcel('products_table', 'Shoprite Inventory System - Products');
        window. location. reload();
  });

    $(document).on("click", ".btn_increase", function() {
        var data_to_use = $(this).attr("data_to_use");
        increase(data_to_use);
    });

    $(document).on("click", ".btn_decrease", function() {
        var data_to_use = $(this).attr("data_to_use");
        decrease(data_to_use);
    });

    $(document).on("click", ".btn_to_calc", function() {
        set_all_total();
    });

    //        var d_trash_created = $(".trash_created").length;
    //        if(d_trash_created <= 0){
    //            $(".d_table_holder").css("display","none");
    //        }else{
    //            $(".d_table_holder").css("display","block");
    //        }

    function set_all_total() {
        var total_p = $(".total_per_product"),
            sum_total = 0;
        $.each(total_p, function() {
            sum_total += Number($(this).text());
        });
        $(".cart_full_amount").text(sum_total);
    }

    $("#print_fn_slip").click(function() {
        //          $("#slip_modal_to_print").print();
        var all_trs = $("#receipt_table").find("tbody").find("tr");
        var data = [];
        $.each(all_trs, function() {
            var name = $(this).find(".td_name_to_send"),
                quantity = $(this).find(".td_quantity_to_send"),
                td_total = $(this).find(".td_total_send");
            //              console.log(name, quantity, td_total);
            if (name.length > 0 && quantity.length > 0 && td_total.length > 0) {
                var obj_to_add = {
                    name: name.text(),
                    quantity: quantity.text(),
                    price: td_total.text()
                };

                data.push(obj_to_add);

            }
        });

        console.log(data);

        var today = new Date();
        var date_to_send = today.getFullYear() + "-" + today.getMonth() + "-" + today.getDay(),
            payment_method = 1;
        var randStr = randomString();
        console.log(randStr);

        $.ajax({
            url: "inc/functions.php",
            type: "post",
            data: {
                values: JSON.stringify(data),
                date_to_send: date_to_send,
                payment_method: payment_method,
                randStr: randStr
            },
            success: function(data) {
                console.log(data);
                var json_data = JSON.parse(data);
                if (json_data.status == 1) {
                    var alert_message = $(
                        "<div class='success alert-success'>Transaction Completed Successfully, Redirecting you very soon</div>"
                        );
                } else if (json_data.status == -1) {
                    var alert_message = $(
                        "<div class='success alert-warning'>Transaction Partially Successfully, Redirecting you very soon</div>"
                        );
                } else {
                    var alert_message = $(
                        "<div class='success alert-danger'>Transaction Completed Successfully, Redirecting you very soon</div>"
                        );
                }
                $(".modal").hide();
                $(".trash_created").remove();
                $(".message_ctn").html(alert_message);
                $(".btn-to-hide").remove();
                $(".transaction_id_holder").text("Transaction - ID: " + randStr);
                printData("slip_modal_to_print");

                setTimeout(function() {
                    window.location.assign("dashboard.php");
                }, 2000);
            },
            error: function() {
                alert("Error Processing receipt");
            }
        });

    });

    $("#print_slip_btn").click(function() {
        var all_trashes = $(".trash_created"),
            new_tbody = $("<tbody></tbody>");
        if ($("#receipt_table").length > 0) {
            $("#receipt_table").find("tbody").empty();
        }

        var total_price_holder = $("#total_price_holder").text().toString().split(" "),
            customer_change = $("#customer_change").text().toString().split(" ");

        var $tp_td = "<td>Total Price: </td>",
            tp_val = "<td>" + total_price_holder[total_price_holder.length - 1] + "</td>";
        var cc_td = "<td>Change: </td>",
            cc_val = "<td>" + customer_change[customer_change.length - 1] + "</td>";

        var amp_td = $("<td>Amount Paid: </td>"),
            amp_val = $("<td>" + $('#amount_collected').val() + "</td>");

        console.log(customer_change);

        var last_tr = $("<tr></tr>").append(amp_td).append(amp_val).append($tp_td).append(tp_val);
        var d_last_tr = $("<tr></tr>").append("<td></td>").append(cc_td).append(cc_val).append(
            "<td></td>");

        $.each(all_trashes, function() {
            var pro_name = $(this).find(".pro_name"),
                serial_number = $(this).find('.serial_number'),
                pro_quantity = $(this).find(".pro_quantity").find("input"),
                pro_total = $(this).find(".pro_total");

            var new_tr = $("<tr></tr>");
            var name_td = $("<td class='td_name_to_send'>" + pro_name.text() + "</td>"),
                quantity_td = $("<td class='td_quantity_to_send'>" + pro_quantity.val() +
                    "</td>"),
                total_td = $("<td class='td_total_send'>" + pro_total.text() + "</td>"),
                sn_td = $("<td>" + serial_number.text() + "</td>");

            new_tr.append(sn_td).append(name_td).append(quantity_td).append(total_td);
            $("#receipt_table").find("tbody").append(new_tr);
        });

        $("#receipt_table").find("tbody").append(last_tr).append(d_last_tr);

    });

    function printData(id) {
        var id_html = $("#" + id).html(),
            body_html = $("body").html();
        $("body").html(id_html);
        window.print();
        $("body").html(body_html);
    }

    $(document).on("keypress", function(e) {
        if (e.keyCode == 13) {
            var div_text = $("#customer_change").text(),
                str_to_check = "Customer";
            console.log(div_text, str_to_check);
            if (div_text.indexOf(str_to_check) != -1) {
                $("#print_slip_btn").trigger("click");
                setTimeout(function() {
                    $("#print_fn_slip").trigger("click");
                }, 2000);
            } else {

            }
        }
    })

    $("#print_slip_btn").css("pointer-events", "none");
    //        console.log($("#print_slip_btn"));
    $("#amount_collected").on("keyup", function() {
        var amount_collected = $("#amount_collected").val();

        var total_goods_text = $("#total_price_holder").text(),
            total_goods_amount = total_goods_text.split(":"),
            tot_goods_amt = Number(total_goods_amount[1]);

        if (isNaN(amount_collected)) {
            $("#error_text").css({
                "color": "red",
                "transition": "1s ease-in-out"
            }).text("Please, type a number");
            $("#customer_change").text("").css("transition", "1s ease-in-out");
            $("#print_slip_btn").css("pointer-events", "none");
        } else {
            if (amount_collected >= tot_goods_amt) {
                var customer_change = amount_collected - tot_goods_amt;
                $("#customer_change").html(
                    "Customer's change is: <span style='font-weight: bold;font-size: 20px;'>" +
                    customer_change + "</span>").css("transition", "1s ease-in-out");
                $("#error_text").text("");
                $("#print_slip_btn").css("pointer-events", "all");
            } else {
                $("#error_text").css({
                    "color": "red",
                    "transition": "1s ease-in-out"
                }).text("Sorry, amount collected can't be lesser than total amount of goods sold");
                $("#customer_change").text("");
                $("#print_slip_btn").css("pointer-events", "none");
            }
        }
    });

    $(".close_modal").click(function() {
        $("#print_slip_btn").css("pointer-events", "none");
        $("total_price_holder").html("");
        $("#customer_change").text("");
    });

    $(document).on("click", ".delete_row", function() {
        var row_to_delete = $(this).attr("item_to_delete");

        // alert(row_to_delete);
        $.each($(".trash_created"), function(key, tr) {
            var this_id = $(this).find("input").attr("id");
            var tr_to_delete = $(this).attr("row_to_delete");
            if (tr_to_delete == row_to_delete) {
                $(this).remove();
            }
        });

    });

    $("#do_not_submit").submit(function(e) {
        e.preventDefault();
    });

    $(document).on("keyup", function(e) {
        if (e.keyCode == 32) {
            $("#checkout_btn").trigger("click");
        }
    });



    $("#checkout_btn").on("click", function() {

        var all_trash_created = $(".trash_created").length;
        if (all_trash_created <= 0) {
            $("#print_slip_btn").css("pointer-events", "none");
            return false;
        } else {
            //              $("#print_slip_btn").css("pointer-events","all");
        }

        set_all_total();
        $("#customer_change").text("").css("transition", "1s ease-in-out");
        $("#amount_collected").val("");

        var outer_div_render = $("<div></div>");
        $.each($(".trash_created"), function(key, tr) {
            var inner_div_render = $("<div></div>");
            var pro_name = $(this).find(".pro_name").text(),
                pro_total = $(this).find(".pro_total").text(),
                quan_td = $(this).find(".pro_quantity");

            var quan_val = $(quan_td).find("input").val();

            inner_div_render.append("<p><label>Product Name: " + pro_name + "</label></p>");
            inner_div_render.append("<p>Price: #" + pro_total + "</p>");
            inner_div_render.append("<p>Quantity: " + quan_val + " units</p>");

            outer_div_render.prepend(inner_div_render);
        });
        //          $("#all_items_to_checkout").html(outer_div_render);
        set_modal_cart_amount();
    });

    $("#select_id").on("change", function() {
        var $product_name = $(this).val();
        //            $(".j_populate").html("");

        //            var sel_trash_created = $(".trash_created").length;
        //            if(sel_trash_created <= 0){
        //                $(".d_table_holder").css("display","none");
        //            }else{
        //                $(".d_table_holder").css("display","block");
        //            }

        $.ajax({
            type: "post",
            url: "inc/functions.php",
            data: {
                product_name: $product_name
            },
            success: function(data) {
                var json_str = JSON.parse(data),
                    len = json_str.length;
                if (len > 0) {
                    for (json_key in json_str) {
                        if (json_str[json_key].stock_count < 1) {
                            console.log($(".message_ctn"));
                            $(".message_ctn").text("Sorry, " + $product_name +
                                " is no longer in stock").css({
                                'color': 'red'
                            });
                            //                                return false;
                        } else {
                            $(".message_ctn").text("");
                            var tr_pop = $("<tr class='trash_created' row_to_delete='" +
                                    Number($(".trash_created").length) + "'></tr>"),
                                td_array = [];

                            td_array.push($("<td class='serial_number'>" + (Number($(
                                ".trash_created").length) + 1) + "</td>"));
                            td_array.push($("<td class='pro_name'>" + json_str[json_key]
                                .name + "</td>"));
                            var btns = generate_btns("qty" + Number($(".trash_created")
                                .length) + 1, json_str[json_key].stock_count);
                            td_array.push($("<td class='pro_quantity'>" + btns + "</td>"));
                            td_array.push($("<td class='pro_price price_" + "qty" + Number(
                                    $(".trash_created").length) + 1 + "'>" +
                                json_str[json_key].price + "</td>"));
                            td_array.push($(
                                "<td class='pro_total total_per_product total_" +
                                "qty" + Number($(".trash_created").length) + 1 +
                                "'>" + json_str[json_key].price + "</td>"));
                            td_array.push($("<td class='delete_row' item_to_delete='" +
                                Number($(".trash_created").length) +
                                "'><button type='button' data-tooltip='Remove' class='btn btn-icons btn-rounded btn-danger'><i class='mdi mdi-delete'></i></button></td>"
                                ));

                            $(tr_pop).html(td_array);
                            $(".j_populate").append(tr_pop);
                        }

                    }
                }
                //                    console.log(json_str[0].name);

            },
            error: function() {
                console.log("Couldn't send");
            }
        });
    });


    $(".frequently_bought").click(function() {
        var json_str = $(this).attr("data_to_use").split('-');
        var tr_pop = $("<tr class='trash_created' row_to_delete='" + Number($(".trash_created")
                .length) + "'></tr>"),
            td_array = [];

        td_array.push($("<td class='serial_number'>" + (Number($(".trash_created").length) + 1) +
            "</td>"));
        td_array.push($("<td class='pro_name'>" + json_str[0] + "</td>"));
        var btns = generate_btns("qty" + Number($(".trash_created").length) + 1, json_str[1]);
        td_array.push($("<td class='pro_quantity'>" + btns + "</td>"));
        td_array.push($("<td class='pro_price price_" + "qty" + Number($(".trash_created").length) + 1 +
            "'>" + json_str[2] + "</td>"));
        td_array.push($("<td class='pro_total total_per_product total_" + "qty" + Number($(
            ".trash_created").length) + 1 + "'>" + json_str[2] + "</td>"));
        td_array.push($("<td class='delete_row' item_to_delete='" + Number($(".trash_created").length) +
            "'><button type='button' data-tooltip='Remove' class='btn btn-icons btn-rounded btn-danger'><i class='mdi mdi-delete'></i></button></td>"
            ));

        $(tr_pop).html(td_array);
        $(".j_populate").append(tr_pop);
    });
});


function increase(id) {
    var $input_val = Number($("#" + id).val()),
        value_to_set = 0,
        stock_count = $("#" + id).attr("stock_count");
    // alert($input_val);
    if ($input_val == 0) {
        value_to_set = 1;
    } else if ($input_val > 0) {
        if ($input_val < stock_count) {
            value_to_set = $input_val + 1;
        } else {
            value_to_set = $input_val;
        }
    }
    $("#" + id).val(value_to_set);
    //        set_modal_cart_amount();
    set_price(".price_" + id, value_to_set, ".total_" + id);
}

function set_modal_cart_amount() {
    var total_cart_amount = $(".cart_full_amount").text();
    $("#total_price_holder").text("Total amount of product bought: " + total_cart_amount);
}

function set_price(price_class, quantity, total_class) {
    var price = Number($(price_class).text());
    var total_price = quantity * price;
    $(total_class).text(total_price);
}

function decrease(id) {
    var $input_val = Number($("#" + id).val()),
        value_to_set = 0;

    if ($input_val <= 1) {
        value_to_set = 1;
    } else if ($input_val > 1) {
        value_to_set = $input_val - 1;
    }
    $("#" + id).val(value_to_set);
    //        set_modal_cart_amount();
    set_price(".price_" + id, value_to_set, ".total_" + id);
}

function generate_btns(id, stock_count) {
    var btn = '<button class="btn btn-danger btn-sm btn-rounded btn_to_calc btn_decrease" type="button" data_to_use="' +
        id + '">-</button> ' +
        '<input size="1" type="text" stock_count="' + stock_count + '" value="1" id="' + id +
        '" name="item_quantity" readonly="readonly">' +
        '<button class="btn btn-success btn-sm btn-rounded btn_to_calc btn_increase" type="button" data_to_use="' + id +
        '">' +
        '+</button>';

    return btn;
}

function randomString() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 20;
    var randomstring = '';
    for (var i = 0; i < string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum, rnum + 1);
    }
    return randomstring;
}



</script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
</body>

</html>
