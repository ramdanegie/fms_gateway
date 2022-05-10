@if (session()->has('fms_error'))
    @push('script')
    <script>
    console.log("trigger fms_error alert");
    Swal.fire('', "{{ session('fms_error') }}", 'warning');
    </script>
    @endpush
@endif

@if (session()->has('fms_info'))
    @push('script')
    <script>
        console.log("trigger fms_info alert");
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('fms_info') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endpush
@endif
