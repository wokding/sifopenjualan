<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- SweetAlert2 for modern notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Toast Notifications for Auth Pages
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
    
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = flashMessage;
    const messageText = tempDiv.textContent || tempDiv.innerText;
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true
    });
    
    Toast.fire({
        icon: isSuccess ? 'success' : (isDanger ? 'error' : 'info'),
        title: messageText.trim()
    });
<?php 
    endif;
endif; 
?>

// Form Submit Loading
$('form').on('submit', function() {
    const submitBtn = $(this).find('button[type="submit"]');
    submitBtn.html('<span class="spinner-border spinner-border-sm mr-2"></span>Processing...').prop('disabled', true);
});
</script>

</body>

</html>