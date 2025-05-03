    <header class="bg-white shadow-sm w-full">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <h1 class="text-xl font-bold text-blue-700">Cadastrar Hospital</h1>
            <a href="<?= site_url('hospital') ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Voltar</a>
        </div>
    </header>

    <main class="max-w-5xl mx-auto mt-10 p-4">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <form action="<?= site_url('hospital/salvar') ?>" method="post" class="space-y-4">
                <input type="text" name="nome" placeholder="Nome do Hospital" required class="w-full p-3 border rounded-lg">
                <textarea name="endereco" placeholder="Endereço" required class="w-full p-3 border rounded-lg"></textarea>
                <input type="text" name="telefone" placeholder="Telefone" class="w-full p-3 border rounded-lg">
                <textarea name="especialidades" placeholder="Especialidades" class="w-full p-3 border rounded-lg"></textarea>

                <!-- Vincular medicamentos -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Medicamentos disponíveis no hospital:</label>
                    <?php foreach ($this->Medicamentosusuario_model->listarRemediosPorUsuario($this->session->userdata('usuario_id')) as $remedio): ?>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="medicamentos[]" value="<?= $remedio['id'] ?>" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <label class="ml-2 text-gray-800"><?= htmlspecialchars($remedio['nome'], ENT_QUOTES, 'UTF-8') ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 font-semibold">Salvar Hospital</button>
            </form>
        </div>
    </main>