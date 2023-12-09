<?php include 'common/header.php'; ?>
<?php include 'common/sidebar.php'; ?>
<div class="main-content">
         <div class="page-content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="row admin-users">
                        <div class="col-md-6">
                           <h5>Book Record</h5>
                        </div>
                        <div class="col-md-6">
                           <div class="search-add-wrap">
                              <div class="search-box">
                              <form id="filter-form">
                                        <input type="text" id="keyword" name="keyword" class="form-control search"
                                            placeholder="Search">
                                        <i class="ri-search-line search-icon"></i>
                                </div>
                                <button type="submit" class="btn btn-primary yellow-prim">Filter</button>
                                </form>
                              <button type="button" id="refreshbtn"
                                    class="btn btn-primary yellow-prim">Refresh</button>
                              <button type="button" onclick="addnew()" class="btn btn-primary yellow-prim add-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add New</button>
                           </div>                        
                        </div>
                     </div>
                     <div class="card designation">
                        <div class="card-body">

                           <div class="row user-list" id="peopledata">
                          


                     
                           </div>
                           
                           <div class="d-flex justify-content-end">
                              <div class="pagination-wrap hstack gap-2">
                              <ul id="pagination" class="pagination listjs-pagination mb-0" style="padding-top: 30px;">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--end col-->
               </div>
               <!--end row-->
            </div>
         </div>
      </div>
<?php include 'common/footer.php'; ?>
<script>
   function addnew()
   {
      window.location.href="<?php echo base_url()?>Book/create";
   }
   function open_edit_modal(id) 
        {
         winodw.location.replace="<?php echo base_url()?>Book/edit_book/id="+id;
        }
        $("#refreshbtn").click(function(event) {
            event.preventDefault();
            $("#keyword").val("");
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
                var msg = "Please Enter Any Keyword";
                            var title = "Keyword Missing";
                toastr.warning(msg, title);
            }
        });
        function createPagination(pageNum = 0, formData = {}) {
            $.ajax({
                url: '<?= base_url() ?>Book/get_books/' + pageNum,
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
                  var photo = '<?php echo base_url()?>uploads/book.PNG';
                $("#peopledata").append(
                  '<div class="col-md-3"><div class="user-box"><img src="' + photo +
                    '" style="width:50px"><h4 class="mb-1">' + data[emp].book_title +'</h4><button type="button" class="btn rounded-pill">' + data[emp].book_author +'</button><div class="dashed-line"></div><p><a href="">' + data[emp].name +'</a></p><a href="<?php echo base_url()?>Book/detail/' + data[emp].book_id +'" class="yellow-prim view-btn">View</a></div></div>');
                i++;
            }
        }
</script>