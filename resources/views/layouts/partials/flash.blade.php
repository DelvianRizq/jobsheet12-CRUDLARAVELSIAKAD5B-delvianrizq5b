@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });

        const pesanSuccess = @json(session('success'));
        const pesanError = @json(session('error'));

        if (pesanSuccess) {
            Toast.fire({
                icon: 'success',
                title: pesanSuccess
            });
        }

        if (pesanError) {
            Toast.fire({
                icon: 'error',
                title: pesanError
            });
        }
    });
</script>
@endpush