<body class="bg-light">
<input type="hidden" id="url_base" value="<?php echo $_SERVER['HTTP_HOST'];?>">
<div class="container">
    <main>
        <form action="gerador.php" method="post">
            <div class="py-5 text-center">
                <h2>Gerenciamento de BD clientes</h2>
                <p class="lead">Gerenciamento a criação de tabelas de log e arquivos para o MVC</p>
            </div>
            <div class="row g-5">
                <div>
                    <h4 class="mb-3">Schemas</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="clientes" class="form-label">Clientes</label>
                            <select class="form-select" id="clientes" required="" name="cliente">
                                <option value="">Escolher...</option>
                                <option value="psicamila">Psicamila</option>
                            </select>
                        </div>
                        <div class="col-md-4" id="tabelas">
                        </div>
                        <div class="col-md-4" style="display: none" id="arquivos">
                            <label for="clientes" class="form-label">Arquivos</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name="arquivo">
                                <label class="form-check-label" for="gridCheck">
                                    Arquivos MVC
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name="log_banco">
                                <label class="form-check-label" for="gridCheck">
                                    Log Banco
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue</button>
                </div>
            </div>
        </form>
    </main>
</div>
</body>
