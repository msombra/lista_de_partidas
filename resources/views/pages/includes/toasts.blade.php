@if(session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: "#32CD32",
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif
