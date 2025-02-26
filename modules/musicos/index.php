<html>
    <head>
        <title>Manancial - Músicos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <?php include '../../includes/header.php'; ?>
        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col text-center">
                    <a href="cadastrar.php"><img src="../../assets/css/img/inserir.png" alt="Inserir Músico" width="100" height="100"></a>
                    <p>Cadastrar Músico</p>
                </div>
                <div class="col text-center">
                    <a href="gerenciar.php"><img src="../../assets/css/img/gerenciar.png" alt="Gerenciar Músicos" width="100" height="100"></a>
                    <p>Gerenciar Músicos</p>
                </div>
            </div>
        </div>
        <?php include '../../includes/footer.php'; ?>
    </body>
</html>