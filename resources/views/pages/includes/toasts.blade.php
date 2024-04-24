{{-- Função para criar um Toast --}}
<script>
    function createToast(title, backgroundColor) {
        Swal.fire({
            icon: "success",
            title: title,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            background: backgroundColor,
            color: '#fff',
            iconColor: '#fff',
        });
    }
</script>

{{-- TOASTS PARTIDAS --}}
@if(session('toast_insert'))
    <script>
        createToast("{{ session('toast_insert') }}", "#32CD32");
    </script>
@endif

@if(session('toast_update'))
    <script>
        createToast("{{ session('toast_update') }}", "#007BFF");
    </script>
@endif

@if(session('toast_delete'))
    <script>
        createToast("{{ session('toast_delete') }}", "#FF0000");
    </script>
@endif

{{-- TOASTS TIMES --}}
@if(session('toast_time_insert'))
    <script>
        createToast("{{ session('toast_time_insert') }}", "#32CD32");
    </script>
@endif

@if(session('toast_time_update'))
    <script>
        createToast("{{ session('toast_time_update') }}", "#007BFF");
    </script>
@endif

@if(session('toast_time_delete'))
    <script>
        createToast("{{ session('toast_time_delete') }}", "#FF0000");
    </script>
@endif
