@if(session('sucesso'))
    <script>
        console.log('inclusão presente');
        Swal.fire({
            icon: "success",
            title: "Partida incluída com sucesso!",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            background: '#32CD32',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif

@if(session('atualizado'))
    <script>
        console.log('atualizado presente');
        Swal.fire({
            icon: "success",
            title: "Partida atualizada com sucesso!",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            background: '#007BFF',
            color: '#fff',
            iconColor: '#fff',
        });
    </script>
@endif
