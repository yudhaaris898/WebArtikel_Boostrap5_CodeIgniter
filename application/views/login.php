<?php $this->load->view('partials/header'); ?>

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Selamat Datang di Ruang Artikel</h1>
                            <span class="subheading">Untuk menambahkan artikel, Anda perlu login terlebih dahulu</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-6 col-lg-8 col-xl-7">
                <h1>FORM LOGIN</h1>
                <?php echo $this->session->flashdata('message'); ?>    
                <?php echo form_open(); ?>
                <div class="mb-3">
                    <label for="username">USERNAME</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">PASSWORD</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary">LOGIN</button>
                </div>
                </div>
            </div>
        </div>

<?php $this->load->view('partials/footer'); ?>
