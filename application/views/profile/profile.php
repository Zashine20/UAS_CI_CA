<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/berita');?>">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('profile/update_profile', ['class' => 'form-horizontal', 'onsubmit' => 'confirmUpdateProfile(this); return false;']); ?>
                            <div class="card-body">
                                <?php if($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo $this->session->flashdata('error'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                <?php endif; ?>
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username', $this->session->userdata('username')); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Profile Picture</label>
                                    <div class="col-sm-9">
                                        <?php
                                            $default_image_name_profile = 'user2-160x160.jpg';
                                            $current_profile_pic_session = $this->session->userdata('profile_picture');
                                            $current_profile_pic_filename = !empty($current_profile_pic_session) ? $current_profile_pic_session : $default_image_name_profile;
                                            
                                            $current_profile_pic_url = base_url('aset/adminlte/dist/img/' . $default_image_name_profile); // Fallback

                                            if ($current_profile_pic_filename !== $default_image_name_profile) {
                                                $uploaded_image_path_profile = 'aset/uploads/profile_pictures/' . $current_profile_pic_filename;
                                                if (file_exists(FCPATH . $uploaded_image_path_profile)) {
                                                    $current_profile_pic_url = base_url($uploaded_image_path_profile);
                                                }
                                            }
                                        ?>
                                        <img src="<?= $current_profile_pic_url; ?>" alt="Current Profile Picture" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; margin-bottom: 10px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profile_picture" class="col-sm-3 col-form-label">Change Profile Picture</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto. Format: JPG, PNG, GIF. Maks: 2MB.</small>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-muted">Kosongkan field password jika tidak ingin mengubah password.</p>
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_new_password" class="col-sm-3 col-form-label">Confirm New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                            <!-- /.card-footer -->
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
          </div>
    </section>
</div>