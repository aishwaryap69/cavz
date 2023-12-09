<?php include 'common/header.php'; ?>
<?php include 'common/sidebar.php'; ?>
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-lg-12">
               <h5 class="mb-3">Create Book</h5>
               <div class="">
                  <div id="flash_div"><?php echo $this->session->flashdata('msg'); ?></div>
                  <?php if (!empty($error)) echo $error; ?>
                  <div class="tab-area">
             
                     <!-- Tab panes -->
                     <div class="tab-content text-muted">
                        <div class="tab-pane active" id="base-justified-profile" role="tabpanel">
                           <form class="user-create" action="<?php echo base_url() ?>Book/insertbook/<?php echo $mode ?>" method="post" enctype="multipart/form-data" class="form-horizontal" style="background-color:transparent;">

                              <div class="row g-3">
                                 
                                 <div class="col-8 col-xs-12">
                                    <div class="row g-3">
                                       <div class="col-12">
                                          <label class="form-label">Title</label>
                                          <input type="text" class="form-control" name="title" value="<?php if (isset($records)) echo $records[0]->book_title;
                                                                                                         else echo set_value('title') ?>" placeholder="">
                                         
                                          <?php echo form_error('title'); ?>
                                       </div>


                                    </div>
                                    <div class="row g-3">
                                       <div class="col-12">
                                          <label class="form-label">Author</label>
                                          <input type="text" class="form-control" name="author"  value="<?php if (isset($records)) echo $records[0]->book_author;
                                                                                                   else echo set_value('author') ?>" placeholder="">
                                                                                                   <?php echo form_error('author'); ?>
                                       </div>
                                    </div>
                                    <div class="row g-3">
                                       <div class="col-6">
                                          <label class="form-label">Category</label>
                                          <select class="form-select" name="catname">
                                             <option value="">Select</option>
                                             <?php foreach ($category as $value) { ?>
                                                <option value="<?php echo  $value->cat_id; ?>" <?php if (!empty($records)) {
                                                                                                      if ($records[0]->book_category == $value->cat_id) echo "SELECTED";
                                                                                                   } else echo set_select('catname', $value->cat_id) ?>><?php echo $value->cat_name; ?></option>
                                             <?php  } ?>
                                            

                                          </select>
                                          <?php echo form_error('catname'); ?>
                                       </div>
                                       <div class="col-6">
                                          <label class="form-label">Publication Date</label>
                                          <input type="date" class="form-control" name="publication_date"  value="<?php if (isset($records)) echo $records[0]->book_publication_date;
                                                                                                   else echo set_value('publication_date') ?>" placeholder="">
                                       
                                             <?php echo form_error('publication_date'); ?>

                                          
                                       </div>
                                    </div>
                                    <div class="row g-3">
                                       <div class="col-12">
                                          <label class="form-label">Description</label>
                                          <textarea class="form-control" name="descr" id=" exampleFormControlTextarea5" rows="3"><?php if (isset($records)) echo $records[0]->book_descr;
                                                                                                                     else echo set_value('descr') ?></textarea>
                           </div>
                                          <?php echo form_error('descr'); ?>
                                       </div>


                                    </div>
                                 </div>
                                 <div class="col-4 profile-pic-wrapper col-xs-12">
                                    <div class="profile-user position-relative d-inline-block mx-auto mb-2">
        <img src="<?php echo base_url() ?>uploads/book.PNG" class="rounded-circle avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
        <input type="hidden" class="form-control" name="filename" value="<?php if (isset($records)) echo $records[0]->book_pdf;
                                                                                                            else echo set_value('filename') ?>" placeholder="">
                                                                                                           
                                       <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                          <input id="profile-img-file-input" name="bookfile" type="file" class="profile-img-file-input" accept="application/pdf">
                                          
                                          <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                             <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                             </span>
                                          </label>
                                       </div>
                                    </div>
                                    <h5 class="fs-14">Add PDF</h5>
                                    <?php echo form_error('bookfile'); ?>
                                 </div>
                              </div>
                          
                              <center> <button type="submit" class="btn btn-primary yellow-prim submit mt-6">Next</button></center>
                           </form>
                             

                        </div>
                    
                     </div>
                  </div>
                  <!-- end card-body -->
               </div>
               <!-- end card -->
            </div>
         </div>
         <!-- end page title -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
</div>
<?php include 'common/footer.php'; ?>
<script>
     $("input[type='file']").on("change", function () {
     if(this.files[0].size > 1000000) {
       alert("Please upload file less than 1MB. Thanks!!");
       $(this).val('');
     }
    });
</script>