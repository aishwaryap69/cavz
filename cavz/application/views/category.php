<?php include 'common/header.php'; ?>
<?php include 'common/sidebar.php'; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row designation">
                        <div class="col-md-6">
                            <h5>Category</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="search-add-wrap">
                                <div class="search-box">
                                    <form id="filter-form">
                                        <input type="text" id="keyword" name="keyword" class="form-control search" placeholder="Search">
                                        <i class="ri-search-line search-icon"></i>
                                </div>
                                <button type="submit" class="btn btn-primary yellow-prim">Filter</button>
                                </form>
                                <button type="button" id="refreshbtn" class="btn btn-primary yellow-prim">Refresh</button>

                                <button type="button" class="btn btn-primary yellow-prim add-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add New</button>
                            </div>
                            <div id="kt_modal_add_ec" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0">
                                        <div class="modal-header p-3 bg-info-subtle">
                                            <h5 class="modal-title" id="cat_heading">Add Category</h5>
                                            <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="cat-submit" action="#">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="boardName" class="form-label add-des">Category</label>
                                                        <input type="text" class="form-control" id="cat" name="cat" placeholder="category">
                                                        <input type="hidden" class="form-control" id="catid" name="catid" placeholder="">
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success black-btn" id="addNewBoard">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card designation">
                    <div class="card-body">
                        <div class="row">
                            <table id="example" class="table dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <th data-ordering="false">SR No.</th>
                                    <th data-ordering="false">Category Name</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="peopledata">
                                </tbody>
                            </table>
                            <ul id="pagination" class="pagination listjs-pagination mb-0" style="padding-top: 30px;">
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <?php include 'common/footer.php'; ?>
            <script type="text/javascript">
                function open_edit_modal(id) {
                    $("#cat_heading").html("Edit Category");
                    $.ajax({
                        method: "post",
                        url: '<?php echo base_url() ?>Masters/edit_category',
                        dataType: "json",
                        data: {
                            id: id
                        },
                        beforeSend: function() {},
                        success: function(d) {
                            $("#cat").val(d.cat_name);
                            $("#catid").val(d.cat_id);
                        },
                    });
                }
                $("#cat-submit").validate({
                    rules: {
                        cat: "required",
                    },
                    errorPlacement: function(error, element) {
                        if ($(element).is('select')) {
                            element.next().after(error);
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    messages: {
                        cat: "Please Enter Category",
                    },
                    submitHandler: function(form) {
                        var cat = $("#cat").val();
                        var id = $("#catid").val();
                        $.ajax({
                            method: "post",
                            url: '<?php echo base_url() ?>Masters/category_submit',
                            data: {
                                cat: cat,
                                id: id
                            },
                            beforeSend: function() {},
                            success: function(d) {
                                if (d == 'true') {
                                    var msg = "Data Added";
                                    var title = "success";
                                    toastr.success(msg, title);
                                } else {
                                    var msg = "Error Occure Please Try again";
                                    var title = "Error";
                                    toastr.error(msg, title);
                                }
                                $("#catid").val("");
                                $('#kt_modal_add_ec').modal('toggle');
                                $("#cat_heading").html("Add Category");
                                $("#cat-submit")[0].reset();
                                createPagination();
                            },
                        });
                    }
                });
                $("#refreshbtn").click(function(event) {
                    event.preventDefault();
                    createPagination();
                });
                createPagination();
                $('#pagination').on('click', 'a', function(e) {
                    e.preventDefault();
                    var formData = {
                        keyword: $("#keyword").val(),
                    };
                    var pageNum = $(this).attr('data-ci-pagination-page');
                    createPagination(pageNum, formData);
                });
                $("#filter-form").submit(function(event) {
                    event.preventDefault();
                    var keyword = $("#keyword").val();
                    if (keyword != "") {
                        var formData = {
                            keyword: $("#keyword").val(),
                        };
                        createPagination(0, formData)
                    } else {
                        alert("Please Enter Any Keyword");
                    }


                });

                function createPagination(pageNum = 0, formData = {}) {
                    $.ajax({
                        url: '<?= base_url() ?>Masters/get_category/' + pageNum,
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        success: function(responseData) {
                            if (responseData.empData.length != undefined && responseData.empData.length >
                                0) {
                                $('#pagination').html(responseData.pagination);
                                paginationData(responseData.empData);
                            } else {
                                $('#pagination').html(responseData.pagination);
                                $("#peopledata").html(

                                    '<div class="card"><div class="card-body"><div class="card-px text-center pt-15 pb-15"><p class="text-gray-400 fs-4 fw-semibold py-7">No records found</p></div></div></div></div>'
                                );
                            }
                        }
                    });
                }

                function paginationData(data) {
                    $("#peopledata").html("");
                    var i = 1;
                    for (emp in data) {
                        $("#peopledata").append(
                            '<tr><td>' + i + '</td><td>' + data[emp].cat_name +
                            '</td><td><div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" onclick="open_edit_modal(' +
                            data[emp].cat_id +
                            ')"><i class="ri-pencil-fill align-bottom me-2 text-muted" ></i> Edit</a></li><li><a class="dropdown-item remove-item-btn" onclick="delete_catnation(' +
                            data[emp].cat_id +
                            ')"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li></ul></div></td></tr>'
                        );
                        i++;
                    }
                }

                function delete_catnation(id) {
                    if (confirm("Do you want to Delete this Category?")) {
                        $.ajax({
                            method: "post",
                            url: '<?php echo base_url() ?>Masters/delete_category',
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data == true) {
                                    var msg = "Data Deleted Successfully";
                                    var title = "Success";
                                    toastr.success(msg, title);
                                } else {
                                    var msg = "Error Occure Please Try again";
                                    var title = "Error";
                                    toastr.error(msg, title);
                                }
                                createPagination();
                            },
                        });
                    }
                }
            </script>