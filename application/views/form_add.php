<?php $this->load->view('partials/header'); ?>

 <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Selamat Datang di Ruang Artikel</h1>
                            <span class="subheading">Kumpulan Artikel untuk Menemani Harimu</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1>Tambah Artikel Baru</h1>
                    
                    <?php if (validation_errors()): ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php echo form_open_multipart(); ?> 
                    <!-- bedanya form_open dengan form_open_multipart adalah kalau multipart untuk tambahan enctype (syarat uploading file) sedangkan form_open biasa tanpa file tambahan -->
                        <div class="mb-3">    
                            <label>Judul</label>
                            <?php echo form_input('title', set_value('title'), 'class="form-control", placeholder="Masukkan judul artikel..."'); ?>
                        </div>
                        
                        <div class="mb-3">    
                            <label>URL</label>
                            <?php echo form_input('url', set_value('url'), 'class="form-control", placeholder="Masukkan url artikel..."'); ?>
                        </div>
                        
                        <div class="mb-3">
                            <label>Konten</label>
                            <?php echo form_textarea('content', set_value('content'), 'class="form-control", placeholder="Masukkan konten artikel..."'); ?>
                        </div>

                        <div class="mb-3">
                            <label>Cover</label>
                            <?php echo form_upload('cover', set_value('cover'), 'class="form-control"'); ?>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Simpan Artikel</button>
                        </div>
                    </form>
</div>
</div>
</div>
    
    <?php $this->load->view('partials/footer'); ?>
    