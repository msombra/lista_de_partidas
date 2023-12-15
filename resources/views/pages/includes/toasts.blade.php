@if(session('toast_insert'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Partida incluída com sucesso!",
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
            title: "Partida atualizada com sucesso!",
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
            title: "Partida deletada com sucesso!",
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
