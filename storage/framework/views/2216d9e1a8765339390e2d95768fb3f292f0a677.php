
<?php $__env->startSection('content'); ?>
<!-- Start filter -->
<div class="filter searchForm card">
    <div class="card-body">
        <h3 class="card-title m-0">Benpos Dump Data </h3>
        <hr>

        <div class="form-container">
            <form autocomplete="on" method="GET" action="<?php echo e(route('admin.benpos-dump.index')); ?>" id="target" onsubmit="return validateSearch()">
                <div class="form-control-wrapper">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="" for="product">Product</label>
                                <select class="form-control" id="product" name="product">
                                    <option value="" selected>Select</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($product->product)): ?>
                                    <option value="<?php echo e($product->product); ?>" <?php echo e(request('product') == $product->product ? 'selected' : ''); ?>><?php echo e($product->product); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="" for="investorName">Investor Name</label>
                                <input class="form-control" id="investorName" type="text" name="investorName" placeholder="Investor Name" value="<?php echo e(request('investorName')); ?>">

                                <div id="investorNameSuggestions"></div>
                            </div>
                            <div class="col-sm-4">
                                <label class="" for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="" selected>Select</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($category->category)): ?>
                                    <option value="<?php echo e($category->category); ?>" <?php echo e(request('category') == $category->category ? 'selected' : ''); ?>><?php echo e($category->category); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="" for="startRecordDate">From Record Date</label>
                            <input class="form-control readonly" type="text" id="startRecordDate" value="<?php echo e(request('startRecordDate')); ?>" name="startRecordDate" placeholder="From Record Date" onblur="checkDateFormat(this);" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label class="" for="endRecordDate">To Record Date</label>
                            <input class="form-control readonly" type="text" id="endRecordDate" value="<?php echo e(request('endRecordDate')); ?>" name="endRecordDate" placeholder="To Record Date" onblur="checkDateFormat(this);" readonly>
                        </div>
                        <div class="col-sm-4">
                            <!-- <label class="" for="amount">Amount (In Cr)</label>
                            <input class="form-control" id="amount" type="number" placeholder="Amount (In Cr)" value="<?php echo e(request('amount')); ?>" name="amount" min="0" step="0.00000000001" oninput="validateAmount(this)" pattern="\d+(\.\d{1,6})?"> -->
                            <label class="" for="entity">Entity</label>
                            <select class="form-control" id="entity" name="entity">
                                <option value="" selected>Select</option>
                                <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($entity->finalentity)): ?>
                                <option value="<?php echo e($entity->finalentity); ?>" <?php echo e(request('entity') == $entity->finalentity ? 'selected' : ''); ?>><?php echo e($entity->finalentity); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <?php if($totalCount >= 0): ?>
                    <div id="countAlert" class="alert alert-success text-center" >Total <?php echo e($totalCount); ?> records found</div>
                    <?php elseif(!empty($input)): ?>
                    <div style="background-color:#d1e6e3;margin:auto;padding:10px" class="card text-center col-12">
                        <b>No Records Found</b>
                    </div>
                    <?php endif; ?>
                </div>
                <div id="error_alert" class="alert alert-danger text-center" style="display:none;"></div>
                
                <div style="text-align:center">
                    <!-- <a style="color:white" class="btn btn-success" onclick="">Get All Records  <i class="fas fa-download"></i></a> -->
                    <input type="submit" class="btn btn-primary" value="Get Records" id="search">
                    <a class="btn btn-secondary cancleSearch" onclick="return ClearForm()" href="<?php echo e(route('admin.benpos-dump.index')); ?>">CANCEL</a>
                    <?php if($totalCount >= 0): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('benpos_download')): ?>
                    <a style="color:white" class="btn btn-success" onclick="benposDownload();">DOWNLOAD <i class="fas fa-download"></i></a>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </form>
        </div> <!-- Form control wrapper end -->

        <span class="atn-item mr-1" style="display:none">
            <form id="download" method="post" action="<?php echo e(route('admin.benpos-dump-data-export')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('get'); ?>
                <button id="benposDownload" class="btn btn-success">DOWNLOAD <i class="fas fa-download"></i></button>
            </form>
        </span>
    </div>
</div>

<!-- End filter -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>
    input.form-control.readonly {
        background-color: #fff;
    }

    .dropdown-right {
        right: auto !important;
        left: 0px !important;
        /* Add any other necessary styles */
    }

    /* CSS */
    input[type="number"] {
        -moz-appearance: textfield;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    #investorNameSuggestions {
        position: absolute;
        z-index: 9999;
        background-color: #ffffff;
        border-radius: 4px;
        padding: 5px;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        border: none;
        /* Remove the border */
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.01);
        /* Optional: Add a box shadow for a subtle effect */
    }

    #investorNameSuggestions ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #investorNameSuggestions li {
        padding: 5px;
    }

    #investorNameSuggestions li:hover {
        background-color: #f2f2f2;
        cursor: pointer;
    }

    /* CSS to change the text color of autofill list items */
    /* CSS to change the line color on mouse hover and active */
    #investorNameSuggestions ul li a {
        color: black;
        text-decoration: none;
    }

    /* select#investorName option { */
    /* Change the color of the options */
    /* color: grey; */
    /* You can set your desired color here */
    /* } */

    .investorNameOpt {
        color: #808080;
    }

    .select2-results__option {
        color: #808080;
    }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        var product = $("#product").val();
        var category = $("#category").val();
        var investorName = $("#investorName").val();
        var recordDate = $("#recordDate").val();
        var entity = $("#entity").val();
        let startRecordDate = '<?php echo e(request("startRecordDate")); ?>';
        let endRecordDate = '<?php echo e(request("endRecordDate")); ?>';
        var recordCount = 0;

        if (startRecordDate) {
            $("#startRecordDate").val(startRecordDate);
            $("#endRecordDate").val(endRecordDate);
        }

        if (product || category || investorName || startRecordDate || entity || endRecordDate) {
            if (recordCount > 0) {
                $("#countAlert").html("Total " + recordCount + " records found").show();
            }
        }

    });



    $('.searchButton').click(function() {
        $('.searchForm').slideToggle(function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    });

    $('.cancleButton').click(function() {
        $('.searchForm').slideUp();
    });

    function validateSearch() {
        $("#error_alert").html("");
        var product = $("#product").val();
        var category = $("#category").val();
        var investorName = $("#investorName").val();
        var startRecordDate = $("#startRecordDate").val();
        var endRecordDate = $("#endRecordDate").val();
        var entity = $("#entity").val();


        // if (product === "" && category === "" && investorName === "" && startRecordDate === "" && endRecordDate === "" && amount === "") {
        //     $("#error_alert").html("At least one field is required to search").show();
        //     $("#error_alert").fadeOut(4000);
        //     return false;
        // } else 
        if ((startRecordDate !== "" && endRecordDate === "") || (startRecordDate === "" && endRecordDate !== "")) {
            $("#error_alert").html("Please select a date range").show();
            if (startRecordDate === "") {
                $("#startRecordDate").focus();
            } else {
                $("#endRecordDate").focus();
            }
            $("#error_alert").fadeOut(4000);
            return false;
        } else if (startRecordDate !== "" && endRecordDate !== "") {
            var startDateParts = startRecordDate.split("-");
            var endDateParts = endRecordDate.split("-");

            // Extract day, month, and year values
            var startDay = parseInt(startDateParts[0]);
            var startMonth = parseInt(startDateParts[1]) - 1; // Months are zero-based in JavaScript
            var startYear = parseInt(startDateParts[2]);

            var endDay = parseInt(endDateParts[0]);
            var endMonth = parseInt(endDateParts[1]) - 1; // Months are zero-based in JavaScript
            var endYear = parseInt(endDateParts[2]);

            // Create Date objects
            var startDate = new Date(startYear, startMonth, startDay);
            var endDate = new Date(endYear, endMonth, endDay);

            if (startDate > endDate) {
                $("#error_alert").html("Start date should be prior to the end date").show();
                $("#error_alert").fadeOut(4000);
                return false;

            }

        }

        return true;
    }


    function ClearForm() {
        document.getElementById('product').value = '';
        document.getElementById('investorName').value = '';
        document.getElementById('category').value = '';
        document.getElementById('recordDate').value = '';
        document.getElementById('entity').value = '';

    }

    function checkDateFormat(input) {
        var regex = /^\d{2}-\d{2}-\d{4}$/;
        if (!regex.test(input.value)) {
            input.value = '';
            // alert('Please enter a date in the format dd-mm-yyyy.');
        }
    }


    $('#startRecordDate').datetimepicker({
        format: 'DD-MM-YYYY',
        locale: 'en',
        ignoreReadonly: true,
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        },
      }).on('dp.update', function(e) {
        console.log(`${e.viewDate}`);
        console.log('on update event');
        let date = new Date((e.viewDate).toString());
        let bDate = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        let businessDate = moment(bDate).format('DD-MM-YYYY');
        console.log(businessDate);
        $("#startRecordDate").val(`${businessDate}`)
    });

    $('#endRecordDate').datetimepicker({
        format: 'DD-MM-YYYY',
        locale: 'en',
        ignoreReadonly: true,
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        },
     }).on('dp.update', function(e) {
        console.log(`${e.viewDate}`);
        console.log('on update event');
        let date = new Date((e.viewDate).toString());
        let bDate = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        let businessDate = moment(bDate).format('DD-MM-YYYY');
        console.log(businessDate);
        $("#endRecordDate").val(`${businessDate}`)
    });

    function benposDownload() {
        var product = $("#product").val();
        var category = $("#category").val();
        var investorName = $("#investorName").val();
        var startRecordDate = $("#startRecordDate").val();
        var endRecordDate = $("#endRecordDate").val();
        var entity = $("#entity").val();
        var recordCount = '<?php echo e($totalCount); ?>';

        if(recordCount > 0){
            $('#benposDownload').click();
            $("#countAlert").html("Total " + recordCount + " records found").show();
            $("#countAlert").fadeOut(4000);
          } else {
            $('#benposDownload').click();
            $("#countAlert").html("Total " + 0 + " records found").show();
            $("#countAlert").fadeOut(4000);
          }

    }

    function getName(value) {
        console.log('Selected value:', value);

        // Perform further operations with the selected value
        // You can make AJAX calls or update the UI based on this value
    }

    $(document).ready(function() {
        $('#investorName').on('keyup', function() {
            var inputValue = $(this).val();
            if (inputValue.length >= 3) {
                $.ajax({
                    url: "<?php echo e(url('admin/search-investor', 'search')); ?>",
                    type: "GET",
                    data: {
                        'search': inputValue,
                    },
                    dataType: 'json',
                    success: function(response) {
                        var suggestionsContainer = $('#investorNameSuggestions');
                        suggestionsContainer.empty();

                        if (response.length > 0) {
                            var dropdown = $('<ul aria-labelledby="investorName"></ul>');

                            response.forEach(function(item) {
                                var investorName = item.investor;
                                var itemElement = $('<li  role="presentation"><a role="menuitem" tabindex="-1" href="#">' + investorName + '</a></li>');
                                itemElement.on('click', function() {
                                    $('#investorName').val(investorName);
                                    suggestionsContainer.empty();
                                });
                                dropdown.append(itemElement);
                            });

                            suggestionsContainer.html(dropdown);

                            // Show the suggestions container
                            suggestionsContainer.show();
                        } else {
                            suggestionsContainer.empty();
                            suggestionsContainer.hide();
                        }
                    }
                });
            } else {
                $('#investorNameSuggestions').empty().hide();
            }
        });


    });

    function validateAmount(input) {
        const regex = /^\d+(\.\d{1,9})?$/;
        console.log(!regex.test(input.value));
        if (!regex.test(input.value)) {
            input.setCustomValidity('Please enter a valid number with up to 8 decimal places.');
            console.log('e');
        } else {
            input.setCustomValidity('');
        }
    }

    // $(document).ready(function() {
    //     // Initialize the select2 dropdown
    //     $('#investorName').select2();

    //     // Make an AJAX request to fetch the first 10 records
    //     $.ajax({
    //         url:" <?php echo e(url('admin/search-investor', 'search')); ?>",
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data[0]);
    //             // Populate the select2 dropdown with the fetched data
    //             data.forEach(function(item) {
    //                 $('#investorName').append(new Option(item.name1, item.name1));
    //             });
    //         }
    //     });
    // });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/admin/benposDump/index.blade.php ENDPATH**/ ?>