<?php include 'common/header.php'; ?>
<?php include 'common/sidebar.php'; ?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="profile-foreground position-relative mx-n4 mt-n4">

         </div>
       
         <div class="row">
            <div class="col-lg-12">
               <div>
                  <div class="tab-content pt-4 text-muted">
                     <div class="tab-pane active" id="profile-tab" role="tabpanel">
                        <div class="row">
                           <div class="col-lg-12">
                           <div class="flex-shrink-0">
                        <a style="float: right;" href="<?php echo base_url()?>Book/edit_book/<?php echo $details[0]->book_id;?>" class="btn btn-success yellow-prim"><i class="ri-edit-box-line align-bottom"></i> Edit Book Detail</a>
                     </div>
                              <div class="profile-detail-tab">
                                 <div class="card-body">
                                    <h5 class="card-title mb-3"><?php echo $details[0]->book_title;?></h5>
                                    <div class="table-responsive">
                                       <table class="table table-borderless mb-0">
                                          <tbody>
                                             <tr>
                                                <th class="ps-0" scope="row">Author :</th>
                                                <td><?php echo $details[0]->book_author;?> </td>
                                             </tr>
                                             <tr>
                                                <th class="ps-0" scope="row">Category Name:</th>
                                                <td><?php echo $details[0]->cat_name;?></td>
                                             </tr>
                                             <tr>
                                                <th class="ps-0" scope="row">Description :</th>
                                                <td><?php echo $details[0]->book_descr;?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <th class="ps-0" scope="row">Publication Date:</th>
                                                <td><?php echo date("d/m/Y",strtotime($details[0]->book_publication_date));?></td>
                                             </tr>
                                             <tr>
                                                <th class="ps-0" scope="row">File </th>
                                                <td><a style="color: aquamarine;" target="_blank" href="<?php echo base_url()?>uploads/books/<?php echo $details[0]->book_pdf;?>">View</a></td>
                                             </tr>
                                             <tr>
                                                <th class="ps-0" scope="row">Created By:</th>
                                                <td><?php echo $details[0]->name;?></td>
                                             </tr>
                                            
                                            
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- end card body -->
                              </div>
                             
                           </div>
                        </div>
                        <!--end row-->
                     </div>
                    
                     <!--end tab-pane-->
                  
                   
                     <!--end tab-pane-->
                  </div>
                  <!--end tab-content-->
               </div>
            </div>
            <!--end col-->
         </div>
         <!--end row-->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->

</div>




<?php include 'common/footer.php'; ?>