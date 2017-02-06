
<?php $this->load->view('components/user_header'); ?>

 <div id="wrapper">
<?php $this->load->view('components/user_nav'); ?>



        <div id="page-wrapper">

            <div class="container-fluid">
			
            
              <?php $this->load->view('pages/'.$page_name); ?>

            </div>
            <!-- /.container-fluid -->
 
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php $this->load->view('components/user_footer'); ?>

