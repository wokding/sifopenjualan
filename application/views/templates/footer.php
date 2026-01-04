<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; <?= date('Y'); ?> Dibuat oleh : Ade Naufal Rianto</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>daterange/daterange.js"></script>

<script src="<?= base_url('assets/'); ?>bootstrap-datepicker-1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<!-- SweetAlert2 for modern notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Toast Notifications - Replace old alert fade
<?php 
$flash_message = $this->session->flashdata('message');
if($flash_message) : 
    $message_hash = md5($flash_message);
    $shown_key = 'msg_shown_' . $message_hash;
    
    // Check if this message was already shown in this session
    if(!$this->session->userdata($shown_key)) :
        // Mark as shown
        $this->session->set_userdata($shown_key, true);
?>
    const flashMessage = `<?= $flash_message; ?>`;
    const isSuccess = flashMessage.includes('alert-success');
    const isDanger = flashMessage.includes('alert-danger');
    const isWarning = flashMessage.includes('alert-warning');
    
    // Extract text from HTML
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = flashMessage;
    const messageText = tempDiv.textContent || tempDiv.innerText;
    
    // Show toast
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    
    Toast.fire({
        icon: isSuccess ? 'success' : (isDanger ? 'error' : (isWarning ? 'warning' : 'info')),
        title: messageText.trim()
    });
<?php 
    endif;
endif; 
?>
</script>

<script>
$(document).ready(function() {
    // Datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    
    // Image Preview on Upload
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(fileName);
        
        // Preview image if it's an image file
        if(this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('.img-thumbnail').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Form Submit Loading Indicator
    $('form').on('submit', function() {
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Processing...').prop('disabled', true);
    });
    
    // Delete Confirmation with SweetAlert2
    $('.delete-confirm').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        const itemName = $(this).data('item') || 'this item';
        const action = $(this).data('action') || 'delete';
        
        let title = 'Are you sure?';
        let text = '';
        let confirmText = '';
        let actionText = '';
        
        if (action === 'delete') {
            actionText = 'delete';
            text = `You are about to delete ${itemName}. This action cannot be undone!`;
            confirmText = 'Yes, delete it!';
        } else if (action === 'deactivate') {
            actionText = 'deactivate';
            text = `You are about to deactivate ${itemName}. They will not be able to login!`;
            confirmText = 'Yes, deactivate!';
        } else if (action === 'activate') {
            actionText = 'activate';
            text = `You are about to activate ${itemName}. They will be able to login!`;
            confirmText = 'Yes, activate!';
        }
        
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: confirmText,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: actionText.charAt(0).toUpperCase() + actionText.slice(1) + 'ing...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                window.location.href = href;
            }
        });
    });
    
    // Role Access Change with feedback
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        const checkbox = $(this);
        
        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Access changed successfully!'
                });
            },
            error: function() {
                checkbox.prop('checked', !checkbox.prop('checked'));
                Swal.fire('Error!', 'Failed to change access', 'error');
            }
        });
    });
});
</script>

</body>

</html>