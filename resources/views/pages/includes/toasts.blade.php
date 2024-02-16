{{-- TOASTS PARTIDAS --}}
@if(session('toast_insert'))
    <script>
        Swal.fire({
            icon: "success",
            // title: "Partida incluída com sucesso!",
            title: "{{ session('toast_insert') }}",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: '#32CD32',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif

@if(session('toast_update'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('toast_update') }}",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: '#007BFF',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif

@if(session('toast_delete'))
    <script>
        Swal.fire({
            icon: "error",
            title: "{{ session('toast_delete') }}",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: '#FF0000',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif

{{-- TOASTS TIMES --}}
@if(session('toast_time_insert'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Time cadastrado com sucesso!",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: '#32CD32',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif

@if(session('toast_time_update'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Time editado com sucesso!",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: '#007BFF',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif

@if(session('toast_time_delete'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Time deletado com sucesso!",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: '#FF0000',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif
