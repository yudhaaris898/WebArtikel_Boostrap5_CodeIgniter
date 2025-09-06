<?php $this->load->view('partials/header'); ?>

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/assets/img/home-bg.jpg')">
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
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <?php echo $this->session->flashdata('message'); ?>

                    <!-- Post preview-->
                    <form class="form-inline d-flex" style="flex-wrap: nowrap;">
                        <input class="form-control mr-2" type="search" placeholder="Cari judul artikel.." aria-label="Search" name="find">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                                    
                            <?php foreach ($blogs as $key => $blog): ?>
                            <div class="post-preview">
                            <a href="<?php echo site_url('blog/detail/'.$blog['url']); ?>">
                            <h2 class="post-title"><?php echo $blog['title'];?></h2>
                        </a>
                        <p class="post-meta">
                            Posted on <?php echo $blog['date'];?>
                            <?php if(isset($_SESSION['username'])): ?> -
                            <a href="<?php echo site_url('blog/edit_data/'.$blog['id']);?>"> Edit</a> |
                            <a href="<?php echo site_url('blog/delete_data/'.$blog['id']);?>" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"> Delete</a>
                            <?php endif; ?>
                        </p>
                        
                        <?php echo $blog['content'];?>
                    </div>
                    <!-- Divider-->
            <?php endforeach; ?>  
            
        <div class="d-flex justify-content-center my-4">
            <?php echo $this->pagination->create_links(); ?>
        </div>

            </div>
        </div>

<?php $this->load->view('partials/footer'); ?>
