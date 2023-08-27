<?php
include('../../config.php');
$random = rand(1, 10) . date("Y-m-d");
?>

<style>
    datalist {
        position: absolute;
        max-height: 20em;
        border: 0 none;
        overflow-x: hidden;
        overflow-y: auto;
    }

    datalist option {
        font-size: 0.8em;
        padding: 0.3em 1em;
        background-color: #ccc;
        cursor: pointer;
    }

    datalist option:hover,
    datalist option:focus {
        color: #fff;
        background-color: #036;
        outline: 0 none;
    }
</style>


<p class="card-text font-small mb-2">
    Add Product
</p>
<hr />
<section class="horizontal-wizard" id="error_loc">
    <div class="bs-stepper horizontal-wizard-example">
        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#product-details" role="tab" id="product-details-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Product Details</span>
                        <span class="bs-stepper-subtitle">Add Product Details</span>
                    </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#summary-step" role="tab" id="summary-step-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Summary</span>
                        <span class="bs-stepper-subtitle">Review Product</span>
                    </span>
                </button>
            </div>

        </div>
        <div class="bs-stepper-content">
            <div id="product-details" class="content" role="tabpanel" aria-labelledby="product-details-trigger">
                <div class="content-header">
                    <h5 class="mb-0">Product Information</h5>
                    <small class="text-muted">Enter Your Product Details</small>
                </div>
                <form autocomplete="off">

                    <div class="row">
                        <div class="mb-1 col-md-4">
                            <label class="form-label">Product Sale Type</label> <br />
                            <div>
                                <span>
                                    <input class="form-check-input" type="radio" name="saletype" id="wholesale" value="wholesale" checked>
                                    <label class="form-check-label" for="wholesale">Wholesale</label>
                                </span>
                                <span style="margin-left: 20px;">
                                    <input class="form-check-input ml-4" type="radio" name="saletype" id="retail" value="retail">
                                    <label class="form-check-label" for="retail">Retail</label>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="productname">Product Name</label>
                            <input type="text" id="productname" class="form-control" placeholder="Product Name" />
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="quantitysale">Quantity</label>
                            <input type="text" id="quantity" class="form-control" onkeypress="return isNumber(event)" placeholder="Quantity" />
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="stockthreshold">Low stock threshold</label>
                            <input type="text" id="stockthreshold" onkeypress="return isNumber(event)" class="form-control" placeholder="Low stock threshold" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="supplier">Supplier</label>

                            <input list="suppliers" id="supplier" class="form-control" placeholder="Enter or select a supplier" />
                            <datalist id="suppliers">
                                <?php
                                $getsupplier = $mysqli->query("select * from supplier where status IS NULL");
                                while ($ressupplier = $getsupplier->fetch_assoc()) { ?>
                                    <option>
                                        <?php echo $ressupplier['fullname'] . ' - ' . $ressupplier['companyname']; ?>
                                    </option>
                                <?php } ?>
                            </datalist>

                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="expirydate">Expiry Date</label>
                            <input type="text" id="expirydate" class="form-control" placeholder="Expiry Date" />
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="variations">Variations</label>
                            <input type="text" id="variations" class="form-control" placeholder="Specify Variations" />
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="costprice">Cost Price</label>
                            <input type="text" id="costprice" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Cost Price" />
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="sellingprice">Selling Price </label>
                            <input type="text" id="sellingprice" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Selling Price" />
                        </div>


                    </div>

                </form>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-secondary btn-prev" disabled>
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>

            <div id="summary-step" class="content" role="tabpanel" aria-labelledby="summary-step-trigger">
                <div class="content-header">
                    <h5 class="mb-0">Summary</h5>
                    <small>Review details</small>
                </div>
                <form autocomplete="off">
                    <div class="row">
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="costprice">Cost Price</label>
                            <input type="text" id="costprice" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Cost Price" />
                        </div>

                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="sellingpricewhole">Selling Price </label>
                            <input type="text" id="sellingpricewhole" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Selling Price (Wholesale)" />
                        </div>

                    </div>

                </form>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
            </div>

        </div>
    </div>
</section>


<script>
    // Page jquery scripts
    $("#expirydate").flatpickr();

    $("#variations").select2({
        placeholder: "Select Variations",
        allowClear: true
    });

    // Add action on form submit
    $(function() {
        "use strict";
        var e = document.querySelectorAll(".bs-stepper"),
            n = $(".select2"),
            i = document.querySelector(".horizontal-wizard-example"),
            r = document.querySelector(".vertical-wizard-example"),
            t = document.querySelector(".modern-wizard-example"),
            o = document.querySelector(".modern-vertical-wizard-example");
        if (void 0 !== typeof e && null !== e)
            for (var l = 0; l < e.length; ++l)
                e[l].addEventListener("show.bs-stepper", function(e) {
                    for (var n = e.detail.indexStep, i = $(e.target).find(".step").length - 1, r = $(e.target).find(".step"), t = 0; t < n; t++) {
                        r[t].classList.add("crossed");
                        for (var o = n; o < i; o++) r[o].classList.remove("crossed");
                    }
                    if (0 == e.detail.to) {
                        for (var l = n; l < i; l++) r[l].classList.remove("crossed");
                        r[0].classList.remove("crossed");
                    }
                });
        if (
            (n.each(function() {
                    var e = $(this);
                    e.wrap('<div class="position-relative"></div>');
                }),
                void 0 !== typeof i && null !== i)
        ) {
            var d = new Stepper(i);
            $(i)
                .find("form")
                .each(function() {
                    $(this).validate({
                        rules: {
                            /*  barcode: {
                               required: !0
                             }, */
                            productname: {
                                required: !0
                            },
                            quantitysale: {
                                required: !0
                            },
                            quantitystock: {
                                required: !0
                            },
                            stockthreshold: {
                                required: !0
                            },
                            supplier: {
                                required: !0
                            },
                            category: {
                                required: !0
                            },
                            subcategory: {
                                required: !0
                            },
                            variation1: {
                                required: !0
                            },
                            variation1spec: {
                                required: !0
                            },
                            costprice: {
                                required: !0
                            },
                            sellingpricewhole: {
                                required: !0
                            },


                        },
                    });
                }),
                $(i)
                .find(".btn-next")
                .each(function() {
                    $(this).on("click", function(e) {
                        //alert('test')
                        $(this).parent().siblings("form").valid() ? d.next() : e.preventDefault();
                    });
                }),
                $(i)
                .find(".btn-prev")
                .on("click", function() {
                    d.previous();
                }),
                $(i)
                .find(".btn-submit")
                .on("click", function() {

                    var barcode = $("#barcode").val();
                    var productname = $("#productname").val();
                    var quantitysale = $("#quantitysale").val();
                    var quantitystock = $("#quantitystock").val();
                    var stockthreshold = $("#stockthreshold").val();
                    var sku = $("#sku").val();
                    var supplier = $("#supplier").val();
                    var expirydate = $("#expirydate").val();
                    var isbn = $("#isbn").val();
                    var category = $("#category").val();
                    var subcategory = $("#subcategory").val();
                    var variation1 = $("#variation1").val();
                    var variation1spec = $("#variation1spec").val();
                    var variation2 = $("#variation2").val();
                    var variation2spec = $("#variation2spec").val();
                    var variation3 = $("#variation3").val();
                    var variation3spec = $("#variation3spec").val();
                    var costprice = $("#costprice").val();
                    var sellingpricewhole = $("#sellingpricewhole").val();
                    var saletype = $('input[name=saletype]:checked').val();
                    var random = '<?php echo $random; ?>';

                    var error = '';
                    if (costprice == "") {
                        error += 'Please enter costprice \n';
                        $("#costprice").focus();
                    }
                    if (sellingpricewhole == "") {
                        error += 'Please enter sellingprice \n';
                        $("#sellingpricewhole").focus();
                    }
                    /* if (costprice < sellingpricewhole) {
                      error += 'Please enter a valid selling price \n';
                      $("#sellingpricewhole").focus();
                    } */
                    if (variation1 == variation2) {
                        error += 'Please select different variations \n';
                    }
                    if (variation1 == variation3) {
                        error += 'Please select different variations \n';
                    }
                    if (variation2 != "" && (variation2 == variation3)) {
                        error += 'Please select different variations \n';
                    }
                    if (variation2 != "" && variation2spec == "") {
                        error += 'Please specify second variation \n';
                        $("#variation2spec").focus();
                    }
                    if (variation2spec != "" && variation2 == "") {
                        error += 'Please select second variation \n';
                    }
                    if (variation3 != "" && variation3spec == "") {
                        error += 'Please specify third variation \n';
                        $("#variation3spec").focus();
                    }
                    if (variation3spec != "" && variation3 == "") {
                        error += 'Please select third variation \n';
                    }


                    if (error == "") {
                        $(this).parent().siblings("form").valid() && $.notify("Submitted..!!", "success");
                        $.ajax({
                            type: "POST",
                            url: "ajaxscripts/queries/save/product.php",
                            beforeSend: function() {
                                $.blockUI({
                                    message: '<h3 style="margin-top:6px"><img src="https://jquery.malsup.com/block/busy.gif" /> Just a moment...</h3>'
                                });
                            },
                            data: {
                                barcode: barcode,
                                productname: productname,
                                quantitysale: quantitysale,
                                quantitystock: quantitystock,
                                stockthreshold: stockthreshold,
                                sku: sku,
                                supplier: supplier,
                                expirydate: expirydate,
                                isbn: isbn,
                                category: category,
                                subcategory: subcategory,
                                variation1: variation1,
                                variation1spec: variation1spec,
                                variation2: variation2,
                                variation2spec: variation2spec,
                                variation3: variation3,
                                variation3spec: variation3spec,
                                costprice: costprice,
                                /*  sellingprice: sellingprice, */
                                sellingpricewhole: sellingpricewhole,
                                saletype: saletype
                            },
                            success: function(text) {
                                //alert(text);

                                if (text == 1) {
                                    //Load user form
                                    $.ajax({
                                        url: "ajaxscripts/forms/addproduct.php",
                                        beforeSend: function() {
                                            $.blockUI({
                                                message: '<h3 style="margin-top:6px"><img src="https://jquery.malsup.com/block/busy.gif" /> Just a moment...</h3>'
                                            });
                                        },
                                        success: function(text) {
                                            $('#pageform_div').html(text);
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                            alert(xhr.status + " " + thrownError);
                                        },
                                        complete: function() {
                                            $.unblockUI();
                                        },
                                    });

                                    window.location.href = "/viewproducts";

                                } else {
                                    $.notify("Barcode already exists");
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },
                            complete: function() {
                                $.unblockUI();
                            },
                        });
                    } else {
                        $.notify(error);
                    }
                    return false;



                });
        }


    });
</script>